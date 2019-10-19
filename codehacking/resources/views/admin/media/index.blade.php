@extends('layouts.admin')

@section('content')

@if(Session::has('deleted_media'))
     <div class="btn btn-danger">{{session('deleted_media')}}</div>
@endif

<h1 style="padding-left: 10px">Media</h1>


<div class="container">
          @if($photos)
          <table class="table table-striped table-hover">
               <thead>
                 <tr>
                   <th>Id</th>
                   <th>Name</th>
                   <th>Created At</th>
                 </tr>
               </thead>
               <tbody>
                     @foreach($photos as $photo)
                          <tr>
                          <td>{{$photo->id}}</td>
                          <td><img src="{{$photo->file}}" height="50" alt=""></td>
                          <td>{{$photo->created_at ? $photo->created_at : 'No date'}}</td>
                          <td>
                              <form action="/admin/media/{{$photo->id}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
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
          @endif
</div>




@endsection