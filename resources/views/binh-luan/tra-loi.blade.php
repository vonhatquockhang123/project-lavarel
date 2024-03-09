@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">TRẢ LỜI BÌNH LUẬN </h1>
</div>
<form method="POST" action="{{ route('comments.post_reply', ['comment_id' => $comment_id]) }}">
    @csrf
    <input type="hidden" name="comment_id" value="{{ $comment_id }}">
    <label for="reply_content">Nội dung trả lời:</label><br>
    <textarea id="reply_content" name="reply_content" rows="4" cols="50"></textarea><br>
    <label for="user_name">Tên người dùng:</label><br>
    <input type="text" id="user_name" name="user_name"><br><br>
    <input type="submit" value="Gửi trả lời">
</form>
@endsection