@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  <div class="row">
     @if(Auth::user()->role->role_name !='sales')
     <div class="btn btn-default col-2 text-center">   
      <a href="{{route('users.create')}}">Add User</a> 
    </div>
    @endif
  </div>
    <div class="row">
        <div class="col-12">
        <div class="card">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="user1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                   </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->role_name }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
<script>
  $(function () {
    $("#user1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,"ordering": false,
      "buttons": ["csv"]
    }).buttons().container().appendTo('#user1_wrapper .col-md-6:eq(0)');
  });
</script>
@endsection