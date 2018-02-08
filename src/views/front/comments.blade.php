{{--<div class="post-comments">
    <h3 class="post-sub-heading">Comments</h3>
    <ul class="media-list comments-list m-bot-50 clearlist">
     @foreach($item->comments as $comment)
        <!-- Comment Item start-->
        <li class="media">
            @if($comment['parent_id'] === 0 )
            <div class="media-body">
                <div class="comment-info">
                    <div class="comment-author">
                        <a href="#">{{$comment['name']}}</a>
                                    <button data-toggle="collapse" data-target="#repply{{$comment['id']}}" class="comment-button" style="background: none;border:none"><i class="tf-ion-chatbubbles"></i>Repply to {{$comment['name']}}</button>

                                        <div id="repply{{$comment['id']}}" class="collapse">
                                                <form method="POST" action="{{ route('admin.comments.repply', $comment['id']) }}" accept-charset="UTF-8" role="form">
                                                    {{ csrf_field() }}
                                                    <textarea name="comment" id="" cols="20" rows="3" class="form-control"></textarea><br>
                                                    <button type="submit" class="btn btn-sm btn-main"><i class="fa fa-check" aria-hidden="true"></i>Send</button>
                                                </form>
                                        </div>
                    </div>
                    <time>{{$comment['created_at']}}</time>
                </div>
                <p>
                    {{$comment['comment']}}
                </p>
            @if(count($comment->childs($comment['id']) ) > 0 )
            
            <!-- {{$childs =$comment->childs($comment['id'])  }} -->
            {{ count($childs)}} Repplies
            @foreach($childs as $child)
                <div class="media">
                    <a class="pull-left" href="#">
                    <div class="media-body">
                        <div class="comment-info">
                            <div class="comment-author">
                                <a href="#">{{$child['name']}}</a>
                            </div>
                            <time>{{$child['created_at']}}</time>
                        </div>
                        <p>
                             {{$child['comment']}}
                        </p>
                    </div>
                </div>
                @endforeach
            @endif
            </div>

            @endif
        </li>
         @endforeach
        <!-- End Comment Item -->

    </ul>
</div>--}}



<div class="post-comments">
    <h3 class="post-sub-heading">Comments</h3>
    <ul class="media-list comments-list m-bot-50 clearlist">
  
    @foreach($item->comments as $comment)
        @if($comment['parent_id'] === 0 )

        <li class="media">
            <a class="pull-left" href="#">
                        
            <div class="media-body">
                <div class="comment-info">
                    <h4 class="comment-author"><a href="#">{{$comment['name']}}</a></h4>
                    <time>July 02, 2015, at 11:34</time>
                    <a class="comment-button" data-toggle="collapse" data-target="#repply{{$comment['id']}}" ><i class="tf-ion-chatbubbles"></i>Reply</a>
                                        <div id="repply{{$comment['id']}}" class="collapse">
                                                @include('comments::front.comments_form',['item' =>$item,'type'=>$comment['commentstable_type'],'parent_id'=>$comment['id'] ])
                                        </div>

                </div>
                <p>
                    {{$comment['comment']}}
                </p>



            @if(count($comment->childs($comment['id']) ) > 0 )
            <!-- {{$childs =$comment->childs($comment['id'])  }} -->
                    @foreach($childs as $child)                
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object comment-avatar" src="images/blog/avater-2.jpg" alt="" width="50" height="50">
                            </a>
                             <div class="media-body">
                                <div class="comment-info">
                                    <div class="comment-author" @if($child->isAdmin($child['user_id'])) style="background:#f7f7f7;border-bottom:1px solid #dedede;" @endif>
                                        <a href="#">@if($child->isAdmin($child['user_id']))<i class="fa fa-user-plus" aria-hidden="true"></i> @endif {{$child['name']}}</a>

                                    </div>
                                    <time>{{$child['created_at']}}</time>
                                </div>
                                <p>
                                    {{$child['comment']}}
                                </p>
               
                            </div>
                        </div>
                    @endforeach
            @endif 
            </div>
        </li>

        @endif
    @endforeach
    
    </ul>
</div>        