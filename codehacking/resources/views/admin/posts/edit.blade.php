@extends('layouts.admin')

@section('content')

<h1 style="padding-left: 35px">Edit Post</h1>
<div class="container">
     <div class="col-sm-3">
          <img src="{{$post->photo ? $post->photo['file'] : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
     </div>
     <div class="col-sm-9">
          <form action="/admin/posts/{{$post->id}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
          {!! csrf_field() !!}
          {!! method_field('PATCH') !!}

          <!-- <input name="_method" type="hidden" value="PUT"> -->

          <div class="form-group">
               <label for="title">Title</label>
               <input class="form-control" value="{{$post->title}}" type="text"  name="title" id="title" placeholder="Enter the title">
          </div>

          <div class="form-group">
               <label for="category_id">Category</label>
               <select class="form-control" name="category_id" id="category_id">
                    <option value="0" selected>Choose Category</option>
                    <option value="1">PHP</option>
                    <option value="2">Python</option>
                    <option value="3">JavaScript</option>
                    <option value="4">Cotlin</option>
               </select>
          </div><br>

          <div class="form-group">
               <label for="photo_id">Upload Image</label>
               <input class="form-control" type="file" name="photo_id" id="photo_id" placeholder="Upload your Image">
          </div>

          <div class="form-group">
               <label for="body">Description</label><br>
               <textarea class="form-control" rows="6" cols="50" name="body" id="body" placeholder="">{{$post->body}}
               </textarea>
          </div>

          <div class="form-group" style="display: inline-block">
               <input class="btn btn-primary" value="Update Post" type="submit"  name="submit">
          </div>
          </form>
          
          <form action="/admin/posts/{{$post->id}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
               {!! csrf_field() !!}
               {!! method_field('PATCH') !!}    
               <input name="_method" type="hidden" value="delete">
               <input class="btn btn-danger" value="Delete Post" type="submit"  name="submit">
          </form>
     </div>

</div>

<div class="container">
     @include('includes.form_error')
</div>

@endsection
