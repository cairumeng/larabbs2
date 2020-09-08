<form method="POST" action="{{route('replies.store')}}" class="mb-3">
    @csrf
    <input type="hidden" name="topic_id" value="{{$topic->id}}">
    <textarea name="content" class="form-control mb-3" rows="3" placeholder="Write your comment here..."></textarea>
    <button class="btn btn-primary">Reply</button>
</form>