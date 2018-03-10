<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vinkla\Algolia\Facades\Algolia;
use App\product;
use App\category;
use App\image;
use App\company;
use DB;

class productsController extends Controller
{
    /**
     * Create a new controller instance.
     *

     * @return void
     */
        public function index()
        {
            $products = product::with('company','category')->get();
            $images = image::all();
            return view('admin.products.index', compact('products','image'));

        }
        public function getRowNum()
        {
            return view('datatables.eloquent.rownum');
        }
        public function datatable(Request $request)
        {
            DB::statement(DB::raw('set @rownum=0'));
            $products = product::select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'id',
                'name',
                'product_code',
                'description',
                'new_arrivals',
                'category',
                'company',
                'created_at',

            ]);
            return datatables()
            ->of(product::with('company','category')->get())
            ->addColumn('action', function ($product) {

                   return '<a href="'.url('admin/product/edit/'. $product->id) .'"class="btn btn-success" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edit</a>

                   <a href="'.url('admin/product/delete/'. $product->id) .'"class="btn btn-danger waves-effect waves-light deleteText" ><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a>';
               })
               ->addIndexColumn()
               ->rawColumns(['check','action'])
              ->addColumn('check', function($product)
               {
                   return  '<INPUT type="checkbox" name="delete_id[]"  value='.$product->id.' />';

               })

              ->addColumn('new_arrivals', function ($product)
               {
                      return ( $product->new_arrivals == 0 )? "no" : "yes" ;
               })
              ->addColumn('product_code', function ($product)
               {
                      return $product->product_code ;
               })
              ->addColumn('description', function ($product)
               {
                      return  $product->description ;
               })
               ->addColumn('category', function ($product)
               {
                      return (isset( $product->category->name ))? $product->category->name : "" ;
               })
               ->addColumn('company', function ($product)
               {
                      return (isset( $product->company->name ))? $product->company->name : "" ;
               })

         ->make(true);
        }
        public function create()
        {

            $categorys = category::all();
            $companys = company::all();
            return view('admin.products.create', compact('categorys','companys'));

        }

        public function store(Request $request)
        {

            $this->validate($request, [

           'name'=>'required',
           'product_code'=>'required|unique:product,product_code',
           'Description'=>'required',
           'category_id'=>'required',

            ]);

            $product = new product;

            $product->name = $request->input('name');
            $product->product_code = $request->input('product_code');

            $product->description = $request->input('Description');

            $product->new_arrivals = (!empty($request->input('new_arrivals'))) ? $request->input('new_arrivals'):"0";
            $product->category_id = $request->input('category_id');
            $product->company_id = (!empty($request->input('company_id'))) ? $request->input('company_id'):"0";
            $product->save();


            if(isset($request->image))
            {
                foreach($request->image as $file)
                {
                    $images = new image;
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $size = $file->getClientSize();
                    $path = "product_image/".$filename;

                    $file->move(public_path('product_image'),$filename);
                    $images->image_path = $path;
                    $images->product_id = $product->id;
                    $images->save();
                }
        }

            \Session::flash('flash_message','Product successfully saved.');
            return redirect('admin/products');
        }

            public function edit($id)
            {
                $product = product::find($id);
                $categorys = category::all();
                $companys = company::all();
                return view('admin.products.edit' ,compact ('product','categorys','image','companys'));

            }

            public function update(Request $request, $id)
            {

                $this->validate($request, [
                'name'=>'required',
                'product_code'=>'required',
                'Description'=>'required',
                'category_id'=>'required',


            ]);
            $product = product::find($id);
            $product->name = $request->input('name');
            $product->product_code = $request->input('product_code');
            $product->description = $request->input('Description');

            $product->new_arrivals = (!empty($request->input('new_arrivals'))) ? $request->input('new_arrivals'):"0";
            $product->category_id = $request->input('category_id');
            $product->company_id = (!empty($request->input('company_id'))) ? $request->input('company_id'):"0";

            if(isset($request->image))
            {
                    foreach($request->image as $file)
                    {

                        $images = new image;
                        $filename = $file->getClientOriginalName();
                        $extension = $file->getClientOriginalExtension();

                        $size = $file->getClientSize();
                        $path = "product_image/".$filename;

                        $file->move(public_path('product_image'),$filename);
                        $images->image_path = $path;
                        $images->product_id = $product->id;
                        $images->save();
                    }
            }


            $product->save();
            \Session::flash('flash_message','Product successfully Updated.');
            return redirect('admin/products');

        }
        public function delete($id)
        {
            $product = product::find($id);
            $product->delete();
            return redirect('admin/products');
        }
         public function deleteall(Request $request)
         {
             if(!$request->has('delete_id') || empty($request->input('delete_id')))
              {
                   return back()->withError("Selection required!");
               }
            product::whereIn('id', $request->input('delete_id'))->delete();
            return back()->withMessage("Deleted successfully!");


        }

        public function imagedelete($id,$product_id)
        {

            $images = image::find($id);
            unlink($images->image_path);
            $images->delete();
            return redirect('admin/product/edit/'.$product_id);
            }
}
