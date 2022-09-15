@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <a href="{{ route('admin.roles.create') }}" class="float-right btn btn-secondary btn-sm">New Role</a>
  <h1>Roles List</h1>
@stop

@section('content')
  @if (session('info'))
    <div class="alert alert-success">
      <b>{{ session('info') }}</b>
    </div>
  @endif

  <div class="card">
    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Role</th>
            <th colspan="2"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($roles as $role)
            <tr>
              <td>{{ $role->id }}</td>
              <td>{{ $role->name }}</td>
              <td width="10px">
                <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-primary btn-sm">Edit</a>
              </td>
              <td width="10px">
                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
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
