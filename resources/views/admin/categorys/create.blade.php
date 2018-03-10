@extends('admin.layouts.adminapp')
@section('content')
<div id="page-wrapper">
           <div class="container-fluid">
               <div class="row bg-title">
                   <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                       <h4 class="page-title">add new categorys</h4> </div>
                   </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="white-box">
                        <form class="form-horizontal form-material" action="" method="post">
                                {{ csrf_field() }}
                        <!-- Add company start -->
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
                            <?php
                                $company = App\setting::where('key','theme_id')->first();
                            ?>
                            @if($company->value==3)
                                <div class="form-group">
                                    <label for="post_body">Select Theme </label>
                                    <select  class="select2 form-control"  name="theme">
                                        @foreach($companys as $company)
                                            <option value="{{ $company->theme }}">{{ $company->theme}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                        </h3>
                        <!-- Add Company End -->
                        @if ($errors->any())
                            <div class="alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- Add Category start -->
                        <div class="form-group">
                            <label for="post_title">Category Name &nbsp: </label>
                            <input type="text" class="form-control" name="name" value="" placeholder="Enter Category Name"><br>
                        </div>
                        <!-- Add category End -->
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                            Add Category</button>

                    </form>

            </div>
        </div>
    </div>
</div>

@endsection
