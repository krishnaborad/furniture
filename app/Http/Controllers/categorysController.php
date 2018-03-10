<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\category;
use App\company;
class categorysController extends Controller
{
/**
 * Create a new controller instance.
 *
 * @return void
 */
        public function index()
        {

            $categorys = category::with('company')->get();
            return view('admin.categorys.index',compact('categorys'));
        }

        public function datatable()
        {
                $categorys = category::select([
                    'id',
                    'name',
                    'company',
                    'created_at',
                ]);
                return datatables()
                ->of(category::with('company')->get())

                  ->addColumn('action', function ($category) {

                         return '<a href="'.url('admin/category/edit/'. $category->id) .'"class="btn btn-success" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edit</a>

                         <a href="'.url('admin/category/delete/'. $category->id) .'"class="btn btn-danger waves-effect waves-light" ><i class="fa fa-trash-o" aria-hidden="true"></i>  Delete </a>';

                 })
                 ->rawColumns(['check','action'])
                 ->addColumn('check', function($category)
                  {
                      return  '<INPUT type="checkbox" name="chb[]"  value='.$category->id.' />';

                  })

                 ->addColumn('company', function (category $category)
                 {
                        return empty($category->company->name) ? "": $category->company->name;
                 })
                 ->make(true);
        }

        public function create()
        {
            $companys = company::all();
            return view('admin.categorys.create', compact('companys'));
        }

        public function store(Request $request)
        {
                $this->validate($request, [
                'name'=>'required',


            ]);

            $category = new category;
            $category->name = $request->input('name');

            $category->company_id = (!empty($request->input('company_id'))) ? $request->input('company_id'):"0";
            $category->save();
            \Session::flash('flash_message','successfully saved.');
            return redirect('admin/categorys');
        }

        public function show()
        {
            $category = Category::all();
            return view('categorys.show', compact('categorys'));
        }


        public function product($id)
            {

                $product = product::whereRaw("find_in_set('".$id."',categorys)")->get();
                return view('categorys.product', compact('product'));
            }



            public function edit($id)
            {
                $category = category::find($id);
                $companys = company::all();
                return view('admin.categorys.edit', compact('category','companys'));

            }

            public function update(Request $request, $id)
            {
                $this->validate($request, [
                'name'=>'required',


            ]);


            $category = category::find($id);
            $category->name = $request->input('name');
            $category->company_id = (!empty($request->input('company_id'))) ? $request->input('company_id'):"0";
            $category->save();
            \Session::flash('flash_message','successfully  Updated.');
            return redirect('admin/categorys');
        }

        public function delete($id)
        {
            $category = category::find($id);
            $category->delete();
            return redirect('admin/categorys');
        }

        public function deleteall(Request $request)
        {
            if(!$request->has('delete_id') || empty($request->input('delete_id')))
             {
                  return back()->withError("Selection required!");
              }
           category::whereIn('id', $request->input('delete_id'))->delete();
           return back()->withMessage("Deleted successfully!");


       }

}
