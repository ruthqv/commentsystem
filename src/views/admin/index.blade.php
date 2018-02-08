@extends('admin.index')
@section('previous')
<a type="submit" href="{{ route('admin.home') }}" class="btn btn-sm btn-primary" target="_blank" title="GO BACK"><i class="fa fa-angle-left"></i> GO BACK</a>

<h1>comments ({{ $comments->total() }})</h1>

@endsection
@section('maincontent')

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Item</th>
 
                        <th class="text-center">Comment</th>
                        <th class="text-center">Approve</th>
                        <th class="text-center">Remove</th>
                    </tr>
                    @foreach ($comments as $comment)
                        <tr>
                            <td class="text-right">{{ $comment['id'] }}</td>
                            <td class="text-right">

                                 <a href="{{ $comment->item($comment)['link'] }}" target="_blank"><i class="fa fa-external-link"></i>{{ $comment->item($comment)['name'] }}</a>
                            </td>

                            <td>
                              {{ $comment['name'] }}

                              {{ $comment['email'] }}
    
                              {{ $comment['comment'] }}
                            </td>
                            <td class="text-center">
                                 @if( $comment['approved']==1 )<i class="fa fa-check" aria-hidden="true"></i> @else 
                                <form method="POST" action="{{ route('admin.comments.approve', $comment['id']) }}" accept-charset="UTF-8" role="form">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check" aria-hidden="true"></i>Approve</button>
                                </form>
                               @endif

                            </td>
                            <td class="text-center">
                                <form method="POST" action="{{ route('admin.comments.destroy', $comment['id']) }}" accept-charset="UTF-8" role="form" onsubmit="return confirm('Do you really want to remove this comment?');">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Remove</button>
                                </form>
                            </td>
                            <td class="text-left">
                                <button data-toggle="collapse" data-target="#repply{{$comment['id']}}">Repply</button>

                                <div id="repply{{$comment['id']}}" class="collapse">
                                        <form method="POST" action="{{ route('admin.comments.add', $comment['id']) }}" accept-charset="UTF-8" role="form">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="commentstable_id" id="commentstable_id" class=" form-control" value="{{$comment['commentstable_id']}}">
                                            <input type="hidden" name="commentstable_type" id="commentstable_type" class=" form-control" value="{{$comment['commentstable_type']}}">
                                            <input type="hidden" name="parent_id" id="parent_id" class=" form-control" value="{{$comment['id']}}">
                                            <input type="hidden" name="user_id" id="user_id" class=" form-control" value="{{auth()->user()['id']}}">
                                            <input type="text" name="name" id="name" class=" form-control" placeholder="Name *" maxlength="100" required value="{{auth()->user()['name']}}">

                                            <input type="email" name="email" id="email" class=" form-control" placeholder="Email *" maxlength="100" required value="{{auth()->user()['email']}}">

                                            <textarea name="comment" id="comment" class=" form-control" rows="6" placeholder="Comment" maxlength="400" required></textarea>
                                            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check" aria-hidden="true"></i>Repply</button>
                                        </form>
                                </div>




                            </td>

                        </tr>
                    @endforeach
                </table>
            </div>

            {{ $comments->links() }}


@endsection