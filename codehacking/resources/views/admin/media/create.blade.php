@extends('layouts.admin')

@section('styles')

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">

@endsection
 



@section('content')

<h1>Upload Media</h1>

     <form class="dropzone" action="/admin/media" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
          {!! csrf_field() !!}
          {!! method_field('PATCH') !!}
     </form>

@endsection




@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

@endsection