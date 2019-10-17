@extends('layouts.admin')

@section('content')

<h1 style="padding-left: 10px">Categories</h1>


<div class="container">
     <div class="col-sm-6">
          <form method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
               {!! csrf_field() !!}

               <div class="form-group">
                    <label for="name">Title</label>
                    <input class="form-control" type="text"  name="name" id="name" placeholder="Enter the title">
               </div>

               <div class="form-group" style="display: inline-block">
                    <input class="btn btn-primary" value="Create Category" type="submit"  name="submit">
               </div>
          </form>
     </div>

     <div class="col-sm-6">

          @if($categories)

          <table class="table table-striped table-hover">
               <thead>
                 <tr>
                   <th>Id</th>
                   <th>Name</th>
                   <th>Created On</th>
                 </tr>
               </thead>
               <tbody>
                     @foreach($categories as $category)
                          <tr>
                          <td>{{$category->id}}</td>
                          <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                          <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'no date'}}</td>
                          </tr>
                     @endforeach
               </tbody>
          </table>
          @endif

     </div>
</div>




@endsection