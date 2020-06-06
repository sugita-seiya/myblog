@extends('layouts.default')

@section('title',$post->title)

@section('content')
  <h1>
    <a href="{{url('/')}}" class="header-menu">Back</a>
    {{ $post->title }}
  </h1>
  <p>{!! nl2br(e($post->boby)) !!}</p>

  <h2>Comments</h2>
  <ul>
    @forelse($post->comments as $comment)
      <li>
        {{ $comment->boby }}
        <a href="#" class="del" data-id="{{ $comment->id}}">[×]</a>
        <form method="post" action="{{ action('CommentsController@destroy', [$post, $comment] )}}" id="form_{{$comment->id}}">
          {{csrf_field()}}
          {{method_field('delete')}}
        </form>
      </li>
    @empty
      <li>コメントはありません。</li>
    @endforelse
  </ul>
  <form method="post" action="{{ action('CommentsController@store', $post) }}">
  {{ csrf_field() }}
  <p>
    <input type="text" name="boby" placeholder="enter title" value="{{old('boby')}}">
    @if ($errors->has('boby'))
    <span class="error">{{ $errors->first('boby') }}</span>
    @endif
  </p>
  <p>
    <input type="submit" value="コメントを送信">
  </p>
</form>
<script src="/js/main.js"></script>
@endsection