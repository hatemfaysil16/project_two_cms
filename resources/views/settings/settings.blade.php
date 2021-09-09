@extends('layouts.app')

@section('content')






<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
    <div class="card">
        <div class="card-header">edit setting</div>

        <div class="card-body">




            @if(count($errors)>0)
            <ul class="navbar-nav mr-auto">
                    @foreach ($errors->all() as $error)
                    <li class="nav-item active">
                                {{$error}}
                            </li>
                    @endforeach
                    
                    </ul>
                    @endif

            

            <form action="{{route('settings.update')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field()}}

                <div class="form-group">
                    <label for="title">blog_name</label>
                    <input type="text" class="form-control" name="blog_name" value="{{$settings->blog_name}}"  placeholder="Enter title">
                    </div>

                    <div class="form-group">
                    <label for="title">blog_number</label>
                    <input type="text" class="form-control" name="phone_number" value="{{$settings->phone_number}}" placeholder="Enter title">
                    </div>

                    <div class="form-group">
                    <label for="title">blog_email</label>
                    <input type="text" class="form-control" name="blog_email" value="{{$settings->blog_email}}" placeholder="Enter title">
                    </div>

                    <div class="form-group">
                    <label for="title">address</label>
                    <input type="text" class="form-control" name="address" value="{{$settings->address}}" placeholder="Enter title">
                    </div>
                <button type="submit" class="btn btn-primary">update</button>
                </form>      

        </div>
    </div>
</div>
</div>
</div>
@endsection


@section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">

@endsection


@section('scripts')

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js" defer></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script>
$(document).ready(function() {
$('#content').summernote();
});
</script>

@endsection


