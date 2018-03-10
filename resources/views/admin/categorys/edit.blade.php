@extends('admin.layouts.adminapp')
@section('content')
<div id="page-wrapper">
           <div class="container-fluid">
               <div class="row bg-title">
                   <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                       <h4 class="page-title">edit category</h4> </div>
                   </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                <div class="white-box">
                        <form action="" class="form-horizontal form-material" method="post">
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
                                                @if($company->id == $category->company_id)
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
                        <?php
                            $company = App\setting::where('key','theme_id')->first();
                        ?>

                        <div class="form-group">
                                @if($company->value==3)
                            <label for="post_body">Select Theme </label>
                            <select  class="select2 form-control"  name="theme">
                                @foreach($companys as $company)
                                    @if($company->id == $category->theme)
                                        <option value="{{ $company->id }}" selected >{{ $company->theme }}</option>
                                    @else
                                        <option value="{{ $company->id }}">{{ $company->theme }}</option>
                                    @endif
                                @endforeach
                            </select>
                              @endif
                        </div>

                        <!-- Category start -->
                        <div class="form-group">
                            <label for="post_title">Category Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $category->name }}" ><br>
                        </div>
                        <!-- Category End -->
                        <button type="submit" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>
                            Update Category</button>

                    </form>
                </div>

        </div>
    </div>
</div>
@endsection
