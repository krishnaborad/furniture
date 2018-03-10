@extends('admin.layouts.adminapp')
@section('content')
<h1>{{ $heading }}</h1>
<br><br><br><br>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2"><h2><b>Contact Us</b></h2><br><br>
                 <font color="red" size="4">*required field.</font><br><br>
        <form action="{{ url('admin/contact') }}" method="post">{{ csrf_field() }}
                @if ($errors->any())
                    <div class="alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(Session::has('flash_message'))
                    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
                @endif

                <div class="col-sm-6">
                    <label for="name"><b><font color="black"size="4">Name<font color="red" size="4">*</font></font></b></label>
                    <input id="name"class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Your Name">
                </div>
                <div class="col-sm-6">
                    <label for="email"><b><font color="black"size="4">Email<font color="red" size="4">*</font></font></b></label>
                    <input id="email"class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Your Email">
                </div>
                <div class="col-sm-12"><br>
                    <label for="query"><b><font color="black" size="4">Query<font color="red" size="4">*</font></font></b></label>
                    <textarea id="query"type="text" class="form-control" name="query" value="{{ old('query') }}" placeholder="Enter Query"> </textarea><br>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary" name="add_post_btn">Submit</button>

        </form><br><hr>
                <table  style="width:100%" border="blue">
                    @foreach($contacts as $contact)
                        <tr>
                          <div>
                                <font color="black" size="5">{{$contact->name }}</font>
                          </div>
                          <div>
                            <font color="#0bb8e8" size="4">{{$contact->query }}</font>
                          </div>
                          <div>
                              <font color="#555555" size="4">{{$contact->email }}</font>
                          </font>------ {{ $contact ->created_at }}
                      </div>

                                <a href="{{ url('admin/contact/delete/' . $contact->id) }}" class="btn btn-danger btn-xs waves-effect waves-light deleteText"><i class="fa fa-trash-o" aria-hidden="true"></i>  Delete</a>
                            </tr><br><br><br>
                            <hr/>
                        @endforeach

                    </table>
</div></div></div>

@endsection
