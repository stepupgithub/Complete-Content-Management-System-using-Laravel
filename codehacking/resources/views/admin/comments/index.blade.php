@extends('layouts.admin')

@section('content')

<h1>Comments</h1>

<div class="container">
     @if(count($comments) > 0)
     <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>Id</th>
              <th>Author</th>
              <th>Email</th>
              <th>Body</th>
              <th>Post Link</th>
              <th>Replies</th>
            </tr>
          </thead>
          <tbody>
                @foreach($comments as $comment)
                     <tr>
                     <td>{{$comment->id}}</td>
                     <td>{{$comment->author}}</td>
                     <td>{{$comment->email}}</td>
                     <td>{{$comment->body}}</td>
                     <td><a href="{{route('home.post', $comment->post->id)}}">View Post</a></td>
                     <td><a href="{{route('admin.comment.replies.show', $comment->id)}}">View Replies</a></td>
                     <td>
                          @if($comment->is_active == 1)
                          <form role="form" action="/admin/comments/{{$comment->id}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                              {!! csrf_field() !!}
                              {!! method_field('PATCH') !!}
                              <input type="hidden" name="is_active" value="0">
                              <button type="submit" class="btn btn-success">Un-Approve</button>
                         </form>
                          
                          @else
                          <form role="form" action="/admin/comments/{{$comment->id}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                              {!! csrf_field() !!}
                              {!! method_field('PATCH') !!}
                              <input type="hidden" name="is_active" value="1">
                              <button type="submit" class="btn btn-info">Approve</button>
                         </form>
                         @endif
                     </td>
                     <td>
                     <form action="/admin/comments/{{$comment->id}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                         {!! csrf_field() !!}
                         {!! method_field('PATCH') !!}    
                         <input name="_method" type="hidden" value="delete">
                         <input class="btn btn-danger" value="Delete" type="submit"  name="submit">
                    </form>
                     </td>
                    </tr>
                @endforeach
          </tbody>
     </table>
     @else
     <h1 class="text-centered">No Comments</h1>
     @endif
</div>

@endsection