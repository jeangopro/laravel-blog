<div>
  <div class="card">
    <div class="card-header">
      <input wire:model="search" class="form-control" type="text" placeholder="Type user name or email">
    </div>

    @if ($users->count())
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            @foreach ($users as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td width="10px">
                  <a class="btn btn-primary btn-sm" href="{{ route('admin.users.edit', $user) }}">Edit</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="card-footer">
        {{ $users->links() }}
      </div>
    @else
      <div class="card-body">
        <b>No Records</b>
      </div>

    @endif
  </div>
</div>
