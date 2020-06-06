@extends('layouts.default')

@section('title', 'New Post')

@section('content')
<h1>
  <a href="{{ url('/') }}" class="header-menu">Back</a>
  Edit Post
</h1>
<form method="post" action="{{ url('/posts', $post->id) }}">
  {{ csrf_field() }}
  {{ method_field('patch') }}
  <p>
    <input type="text" name="title" placeholder="enter title" value="{{old('title',$post->title)}}">
    @if ($errors->has('title'))
    <span class="error">{{ $errors->first('title') }}</span>
    @endif
  </p>
  <p>
    <textarea name="boby" placeholder="enter boby">{{ old('boby',$post->boby) }}</textarea>
    @if ($errors->has('boby'))
    <span class="error">{{ $errors->first('boby') }}</span>
    @endif
  </p>
  <p>
    <input type="submit" value="Update">
  </p>
</form>
@endsection