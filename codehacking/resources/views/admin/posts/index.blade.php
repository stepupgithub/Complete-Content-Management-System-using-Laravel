@extends('layouts.admin')


@section('content')

@if(Session::has('deleted_post'))
     <div class="btn btn-danger">{{session('deleted_post')}}</div>
@endif

<h1>Posts</h1>

<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>User</th>
        <th>Category</th>
        <th>Title</th>
        <th>Body</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
         @if($posts)
          @foreach($posts as $post)
               <tr>
               <td>{{$post->id}}</td>
               <td><img height="80" src="{{$post->photo ? $post->photo['file'] : 'http://placehold.it/80x80'}}" alt="Post's Photo"></td>
               <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user['name']}}</a></td>
               <td>{{$post->category ? $post->category['name'] : 'Uncategorized'}}</td>
               <td>{{$post->title}}</td>
               <td>{{str_limit($post->body, 20)}}</td>
               <td>{{$post->created_at->diffForHumans()}}</td>
               <td>{{$post->updated_at->diffForHumans()}}</td>
               </tr>
          @endforeach
         @endif


    </tbody>
  </table>

@endsection