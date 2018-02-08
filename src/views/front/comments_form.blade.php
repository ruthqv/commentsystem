<form method="post" action="{{route('comments.add')}}" id="form" role="form">
    {{ csrf_field() }}

   <input type="hidden" name="commentstable_id" id="commentstable_id" class=" form-control" value="{{$item['id']}}">
   <input type="hidden" name="commentstable_type" id="commentstable_type" class=" form-control" value="{{$type}}">
    @if(isset($parent_id))
    <input type="hidden" name="parent_id" id="parent_id" class=" form-control" value="{{$parent_id}}">
    @endif

   <input type="hidden" name="user_id" id="user_id" class=" form-control" @if(auth()->check()) value="{{auth()->user()['id']}}"@endif>

    <div class="row">
        <div class="col-md-6 form-group">
            <!-- Name -->
            <input type="text" name="name" id="name" class=" form-control" placeholder="Name *" maxlength="100" required @if(auth()->check()) value="{{auth()->user()['name']}}"@endif>
        </div>
        <div class="col-md-6 form-group">
            <!-- Email -->
            <input type="email" name="email" id="email" class=" form-control" placeholder="Email *" maxlength="100" required @if(auth()->check()) value="{{auth()->user()['email']}}"@endif >
        </div>

        <!-- Comment -->
        <div class="form-group col-md-12">
            <textarea name="comment" id="comment" class=" form-control" rows="6" placeholder="Comment" maxlength="400" required></textarea>
        </div>

        <!-- Send Button -->
        <div class="form-group col-md-12">
        
            {!! Recaptcha::render([ 'template' => 'snippets.customCaptcha' ]) !!}

            <button type="submit" class="btn btn-small btn-main ">
                Send comment
            </button>
        </div>
    </div>
</form>