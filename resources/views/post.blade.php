@extends('layouts.blog-post')
@section('content')
    <h1>{{ $post->title ?? '' }}</h1>
    <p class="lead">
        by <a href="#">{{ $post->user->name ?? '' }}</a>
    </p>

    <hr>
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>
    <img class="img-responsive" src="{{$post->photo->file ?? ''}}" alt="">

    <hr>

    <p>{{$post->body ?? ''}}</p>

    <hr>

    <div id="disqus_thread"></div>
    <script>

        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://codehacking-test-2.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

    {{--@if(Session::has('success'))--}}
        {{--<div class="text text-success">{{session('success')}}</div>--}}
    {{--@endif--}}

    {{--@if(Auth::check())--}}
        {{--<!-- Comments Form -->--}}
        {{--<div class="well">--}}
            {{--<h4>Leave a Comment:</h4>--}}
            {{--<form action="{{ url("admin/comments") }}" method="post">--}}
                {{--{{ csrf_field() }}--}}
                {{--<input type="hidden" name="post_id" value="{{$post->id}}">--}}
                {{--<div class="form-group">--}}
                    {{--<textarea name="body" id="body" class="form-control" rows="3"></textarea>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<button type="submit" class="btn btn-primary">Submit comment</button>--}}
                {{--</div>--}}
            {{--</form>--}}
        {{--</div>--}}
    {{--@endif--}}

    {{--<hr>--}}

    {{--@if(count($comments) > 0)--}}
        {{--@foreach($comments as $comment)--}}
            {{--<!-- Comment -->--}}
            {{--<div class="media">--}}
                {{--<a class="pull-left" href="#">--}}
                    {{--<img height="64" class="media-object"--}}
                         {{--src="{{Auth::user()->gravatar}}" alt="">--}}
                {{--</a>--}}
                {{--<div class="media-body">--}}
                    {{--<h4 class="media-heading">{{$comment->author}}--}}
                        {{--<small>{{$comment->created_at->diffForHumans()}}</small>--}}
                    {{--</h4>--}}
                    {{--<p>{{$comment->body}}</p>--}}
                {{--@if(count($comment->replies) > 0)--}}
                    {{--@foreach($comment->replies as $reply)--}}
                        {{--@if($reply->is_active == 1)--}}
                            {{--<!-- Nested Comment -->--}}
                                {{--<div id="nested-comment" class=" media">--}}
                                    {{--<a class="pull-left" href="#">--}}
                                        {{--<img height="64" class="media-object" src="{{$reply->photo}}" alt="">--}}
                                    {{--</a>--}}
                                    {{--<div class="media-body">--}}
                                        {{--<h4 class="media-heading">{{$reply->author}}--}}
                                            {{--<small>{{$reply->created_at->diffForHumans()}}</small>--}}
                                        {{--</h4>--}}
                                        {{--<p>{{$reply->body}}</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="comment-reply-container">--}}
                                        {{--<button class="toggle-reply btn btn-primary pull-right">Reply</button>--}}
                                        {{--<div class="comment-reply col-sm-6">--}}
                                            {{--<form action="{{ url('comment/reply') }}" method="post">--}}
                                                {{--{{ csrf_field() }}--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<input type="hidden" name="comment_id" value="{{ $comment->id }}">--}}
                                                    {{--<label for="body">Body:</label>--}}
                                                    {{--<textarea name="body" id="body" class="form-control"--}}
                                                              {{--rows="1"></textarea>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<button class="btn btn-primary" type="submit">Submit</button>--}}
                                                {{--</div>--}}
                                            {{--</form>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<!-- End Nested Comment -->--}}
                                {{--</div>--}}
                            {{--@else--}}
                                {{--<h1 class="text-center">No Replies</h1>--}}
                            {{--@endif--}}
                        {{--@endforeach--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--@endforeach--}}
    {{--@endif--}}
@endsection
@section('scripts')

    <script>

        $(".comment-reply-container .toggle-reply").click(function () {


            $(this).next().slideToggle("slow");
        });

    </script>
@endsection

