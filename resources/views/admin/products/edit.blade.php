@extends('admin.layouts.adminapp')

@section('content')
<div id="page-wrapper">
           <div class="container-fluid">
               <div class="row bg-title">
                   <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                       <h4 class="page-title">Edit Product</h4> </div>
                   </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                <div class="white-box">
                <form class="form-horizontal form-material" action="{{ url('admin/product/edit/'.$product->id) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <!-- Company Start -->
                                        <?php
                                            $company = App\setting::where('key','company_options')->first();
                                        ?>
                                        <h3>
                                        @if($company->value==1)
                                        <div class="form-group">
                                            <label for="post_body">Select Company </label>
                                            <select  class="select2 form-control"  name="company_id">
                                                @foreach($companys as $company)
                                                    @if($company->id == $product->company_id)
                                                        <option value="{{ $company->id }}" selected >{{ $company->name }}</option>
                                                    @else
                                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif
                                </h3>
                                <!-- Company End -->


                        <div class="form-group">
                            <label for="post_title">Product Name</label>
                            <input type="text" class="form-control" name="name" value="{{$product->name}}"  placeholder="Enter Product Name"> <br>
                        </div>
                        <div class="form-group">
                            <label for="post_title">Product Code</label>
                            <input type="text" class="form-control" name="product_code" value="{{$product->product_code}}" placeholder="Enter Product Code"><br>
                        </div>
                        <div class="form-group">
                            <label for="post_body">Description</label>
                            <textarea class="form-control" name="Description" placeholder="Enter Description">{{$product->description}}</textarea>
                        </div>
                        <div class="form-group" >
                        <label>
                            <input or="post_body" type="checkbox" name="new_arrivals" value="1"
                            @if($product->new_arrivals == 1) checked @endif > New Arrivals<br>
                        </label>

                        </div>

                        <div class="form-group" >
                            <label for="post_body">Select Category </label>
                            <select  class="select2 form-control" name="category_id">
                            @foreach($categorys as $category)
                                @if($category->id == $product->category_id)
                                    <option value="{{ $category->id }}" selected >{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach

                        </select>
                        </div>


                            <br><br>
                        <div class="form-group" >
                            <label for="post_body">Select Image</label>
                            <input type="file" name="image[]" multiple >
                        </div>    <br>


                    <button type="submit" class="btn btn-primary"></i>Update Product</button><br><br>

                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
                    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
                            <div class="form-group" >
                                <label for="post_body">Product Images </label>
                                <br><font color="#687282" size="3" >Click On Image  <i class="fa fa-search-plus fa fw"></i></font>
                                        <table class="table table-bordered table-striped">
                                                @foreach($product->images as $image)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <a class="fancybox" rel="ligthbox" href="{{asset($image->image_path )}}">
                                                            <img src="{{asset($image->image_path )}}" class="img-responsive" width="50px" alt="" /></td>
                                                            </a>

                                                            <script type="text/javascript">
                                                              $(".fancybox").fancybox({
                                                                  openEffect: "none",
                                                                  closeEffect: "none"
                                                              });
                                                            </script>

                                                        <p><td><a href="{{ url('admin/product/delete/' . $image->id .'/'.$product->id) }}" class="btn btn-danger btn-xs waves-effect waves-light deleteText"> <i class="glyphicon glyphicon-trash"></i> Delete</a></td></p>

                                                    </tr>
                                                    <a href='{{ asset("images/$product->product_image") }}'>{{ $product->product_image }}</a>

                                                @endforeach
                                        </table>
                                </div>
                                <br><br><br>

            </form>


            </div>
        </div>
    </div>
</div>


@endsection
