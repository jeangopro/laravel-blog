@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>Assign role</h1>
@stop

@section('content')
  @if (session('info'))
    <div class="alert alert-success">
      <b>{{ session('info') }}</b>
    </div>
  @endif
  <div class="card">
    <div class="card-body">
      <p class="h5">Name:</p>
      <p class="form-control">{{ $user->name }}</p>

      <h2 class="h5">Roles List</h2>
      {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
      @foreach ($roles as $role)
        <div class="">
          <label>
            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
            {{ $role->name }}
          </label>
        </div>
      @endforeach

      {!! Form::submit('Assign role', ['class' => 'btn btn-primary mt-2']) !!}
      {!! Form::close() !!}
    </div>
  </div>
@stop

@section('css')
  <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
  <script>
    console.log('Hi!');
  </script>
@stop
