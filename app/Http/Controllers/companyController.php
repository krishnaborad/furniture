<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\category;
use App\company;
use DB;
class companyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


        public function index()
        {
            $companys = company::all();
            return view('admin.companys.index', compact('companys'));

        }

        public function create()
        {

            return view('admin.companys.create');
        }

        public function store(Request $request)
        {
                $this->validate($request, [
                'name'=>'required',

            ]);

            $company = new company;
            $company->name = $request->input('name');
            $company->save();
            \Session::flash('flash_message','successfully saved.');
            return redirect('admin/companys');
        }

        public function show()
        {
            $company = company::all();
            return view('companys.show', compact('companys'));
        }


        public function product($id)
        {

            $product = product::whereRaw("find_in_set('".$id."',companys)")->get();
            return view('companys.product', compact('company'));
        }



        public function edit($id)
        {

            $company = company::find($id);
            return view('admin.companys.edit' ,compact ('company'));
        }

        public function update(Request $request, $id)
        {
                $this->validate($request, [
                'name'=>'required',

            ]);


            $company = company::find($id);
            $company->name = $request->input('name');

            $company->save();
            \Session::flash('flash_message','successfully Updated.');
            return redirect('admin/companys');
        }

        public function delete($id)
        {
            $company = company::find($id);
            $company->delete();
            return redirect('admin/companys');
        }


}
