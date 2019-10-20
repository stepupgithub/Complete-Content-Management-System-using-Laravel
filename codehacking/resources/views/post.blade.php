@extends('layouts.blog-post')

@section('content')

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$post->user['name']}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{$post->photo['file']}}" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">{{$post->body}}</p>
                
                <hr>

                @if(Session::has('comment_message'))
               {{session('comment_message')}}
                @endif



                <!-- Blog Comments -->
@if(Auth::check())

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="/admin/comments" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                         <input type="hidden" name="post_id" value="{{$post->id}}">
                        <div class="form-group">
                             <label for="body"></label>
                            <textarea class="form-control" rows="3" name="body" id="body"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Comment</button>
                    </form>
                </div>
@endif       
                <hr>



                <!-- Posted Comments -->

                @if(Session::has('reply_message'))
               {{session('reply_message')}}  
               @endif

               
          @if(count($comments)>0)   
               @foreach($comments as $comment)
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img height="64" class="media-object" src="{{$comment->photo}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at->diffForHumans()}}</small>
                        </h4>
                        <p>{{$comment->body}}</p>



                        <!-- Reply Bar(form) Toggle Button-->
                        <div class="comment-reply-container">
                         <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                         <div class="comment-reply">

                            <form role="form" action="/comment/reply" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                              {!! csrf_field() !!}
                              <input type="hidden" name="comment_id" value="{{$comment->id}}">
                              <div class="form-group">
                                   <label for="body"></label>
                                   <textarea class="form-control" rows="2" name="body" id="body"></textarea>
                              </div>
                              <button type="submit" class="btn btn-primary">Submit Reply</button>
                            </form>

                         </div>
                         </div>



               @if(count($comment->replies)>0)   
                    @foreach($comment->replies as $reply)
                         @if($reply->is_active == 1)

                         
                        <!-- Dislaying Nested Comment -->
                        <div class="media" id="nested-comment">
                            <a class="pull-left" href="#">
                                <img height="64"class="media-object" src="{{$reply->photo}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$reply->author}}
                                    <small>{{$reply->created_at->diffForHumans()}}</small>
                                </h4>
                                <p>{{$reply->body}}</p>
                            </div>


                         
                        <!-- End Nested Comment -->
                        </div>

                         @endif
                    @endforeach
               @endif
                    </div>
                </div>
               @endforeach
          @endif

@endsection

@section('scripts')

<script>
     $(".comment-reply-container .toggle-reply").click(function(){

          $(this).next().slideToggle("slow");
           
     })
</script>

@endsection
