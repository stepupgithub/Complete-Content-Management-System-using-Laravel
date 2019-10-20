@extends('layouts.admin')

@section('content')

<h1>Replies</h1>

<div class="container">
     
     <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>Id</th>
              <th>Author</th>
              <th>Email</th>
              <th>Body</th>
            </tr>
          </thead>
          <tbody>
     @foreach($replies as $reply)
               <tr>
               <td>{{$reply->id}}</td>
               <td>{{$reply->author}}</td>
               <td>{{$reply->email}}</td>
               <td>{{$reply->body}}</td>
               <td><a href="{{route('home.post', $reply->comment->post['id'])}}">View Post</a></td>
               <td>
                    @if($reply->is_active == 1)
                    <form role="form" action="/admin/comment/replies/{{$reply->id}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        {!! method_field('PATCH') !!}
                        <input type="hidden" name="is_active" value="0">
                        <button type="submit" class="btn btn-success">Un-Approve</button>
                   </form>
                    
                    @else
                    <form role="form" action="/admin/comment/replies/{{$reply->id}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        {!! method_field('PATCH') !!}
                        <input type="hidden" name="is_active" value="1">
                        <button type="submit" class="btn btn-info">Approve</button>
                   </form>
                   @endif
               </td>
               <td>
               <form action="/admin/comment/replies/{{$reply->id}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
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
     

</div>

@endsection