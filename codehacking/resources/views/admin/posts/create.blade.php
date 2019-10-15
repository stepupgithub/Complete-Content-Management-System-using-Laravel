@extends('layouts.admin')

@section('content')

<h1>Create Posts</h1>
<div class="container">
<form action="/admin/posts" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
     {!! csrf_field() !!}

     <!-- <input name="_method" type="hidden" value="PUT"> -->

     <div class="form-group">
          <label for="title">Title</label>
          <input class="form-control" type="text"  name="title" id="title" placeholder="Enter the title">
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
          <textarea class="form-control" rows="6" cols="50" name="body" id="body" placeholder="">Describe your post here...
          </textarea>
     </div>

     <div class="form-group">
          <input class="btn btn-primary" type="submit"  name="submit" value="Create Post">
     </div>
     
</form>
</div>

<div class="container">
     @include('includes.form_error')
</div>

@endsection
