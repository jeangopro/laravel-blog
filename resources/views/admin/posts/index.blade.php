@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <a href="{{ route('admin.posts.create') }}" class="float-right btn btn-secondary btn-sm">New Post</a>
  <h1>List Posts</h1>
@stop

@section('content')
  @if (session('info'))
    <div class="alert alert-success">
      <b>{{ session('info') }}</b>
    </div>
  @endif

  @livewire('admin.posts-index')
@stop

@section('css')
  <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
  <script>
    console.log('Hi!');
  </script>
@stop
