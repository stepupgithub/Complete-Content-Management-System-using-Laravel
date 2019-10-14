@extends('layouts.admin')

@section('content')

<h1>Create Users</h1>

<form action="/admin/users" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
     {!! csrf_field() !!}

     <!-- <input name="_method" type="hidden" value="PUT"> -->

     <div class="form-group">
          <label for="name">Name</label>
          <input class="form-control" type="text"  name="name" id="name" placeholder="Enter your name">
     </div>

     <div class="form-group">
          <label for="email">Email</label>
          <input class="form-control" type="email" name="email" id="email" placeholder="Enter your email">
     </div>

     <div class="form-group">
          <label for="role_id">Role</label>
          <select class="form-control" name="role_id" id="role_id">
               <option value="0" selected>Choose Option</option>
               <option value="1">Administrator</option>
               <option value="2">Author</option>
               <option value="3">Subscriber</option>
          </select>
     </div><br>

     <div class="form-group">
          <label for="is_active">Status</label>
          <select class="form-control" name="is_active" id="is_active">
               <option value="1">Active</option>
               <option value="2" selected>Inactive</option>
          </select>
     </div>

     <div class="form-group">
          <label for="file">Upload Image</label>
          <input class="form-control" type="file" name="file" id="file" placeholder="Upload your Image">
     </div>

     <div class="form-group">
          <label for="password">Password</label>
          <input class="form-control" type="password" name="password" id="password" placeholder="Enter your Password">
     </div>

     <div class="form-group">
          <input class="btn btn-primary" type="submit"  name="submit" placeholder="Create User">
     </div>
     
</form>

@include('includes.form_error')

@endsection
