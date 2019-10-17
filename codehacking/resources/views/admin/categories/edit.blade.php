@extends('layouts.admin')

@section('content')

<h1 style="padding-left: 10px">Update Category</h1>


<div class="container">
          <form action="/admin/categories/{{$category->id}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
               {!! csrf_field() !!}
               {!! method_field('PATCH') !!}

               <div class="form-group">
                    <label for="name">Title</label>
                    <input class="form-control" value="{{$category->name}}" type="text"  name="name" id="name">
               </div>

               <div class="form-group" style="display: inline-block">
                    <input class="btn btn-primary" value="Update" type="submit"  name="submit">
               </div>
          </form>

          <form action="/admin/categories/{{$category->id}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
               {!! csrf_field() !!}
               {!! method_field('PATCH') !!}    
               <input name="_method" type="hidden" value="delete">
               <input class="btn btn-danger" value="Delete Category" type="submit"  name="submit">
          </form>
</div>




@endsection