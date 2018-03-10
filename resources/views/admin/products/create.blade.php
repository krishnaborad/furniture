@extends('admin.layouts.adminapp')
@section('content')
<div id="page-wrapper">
           <div class="container-fluid">
               <div class="row bg-title">
                   <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                       <h4 class="page-title">Add New Product</h4> </div>
                   </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="white-box">
                    <form class="form-horizontal form-material" action="{{ url('admin/product/create') }}" method="post" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            <?php
                                $company = App\setting::where('key','company_options')->first();
                            ?>
                            <h3>
                            @if($company->value==1)
                            <div class="form-group">
                                <label for="post_body">Select Company </label>
                                    <select  class="select2 form-control"  name="company_id">
                                        @foreach($companys as $company)
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            @endif
                            </h3>
                            @if ($errors->any())
                                <div class="alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        <div class="form-group">

                            <label for="post_title">Product Name</label>
                            <input type="text" class="form-control" name="name" value=""  placeholder="Enter Product Name"> <br>
                        </div>
                         <!--  -->

                        <div class="form-group"{{ $errors->has('product_code') ? ' has-error' : 'enter' }}>

                            <label for="post_title">Product Code</label>
                            <input type="text" class="form-control" name="product_code" value="" placeholder="Enter Product Code"><br>

                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" class="form-control" name="Description" placeholder="Enter Description"></textarea>
                        </div>

                        <div class="form-group" >
                            <label>
                              <input  type="checkbox" name="new_arrivals" value="1"> New Arrivals<br>
                            </lable>
                        </div>

                        <div class="form-group">
                            <label for="post_body">Select Category </label>
                            <select  class="select2 form-control"  name="category_id">
                            @foreach($categorys as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>

                            @endforeach
                            </select>
                        </div>

                         <label for="post_body">Select Image</label>
                        <input type="file" name="image[]" multiple >
                        <br><br><br>

                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                            Add Product</button>
                            <br><br><br><br><br>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection
