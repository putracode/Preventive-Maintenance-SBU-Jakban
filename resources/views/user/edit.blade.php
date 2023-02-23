@extends('layout.adminlte')

@section('content')
<div class="card card-info" style="margin-top: -20px; margin-bottom: 50px;">
    <div class="card-header">
        <h3 class="card-title">Edit User</h3>
    </div>
    <form action="/user/{{ $user->id }}" method="POST">
        @csrf
        @method('put')
        <div class="card-body">
            
            <div class="form-group mb-4">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required value="{{ old('name',$user->name) }}" autocomplete="off">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="username">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required value="{{ old('username',$user->username) }}" autocomplete="off">
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label for="role">Role</label>
                <select class="form-control select2 @error('role') is-invalid @enderror" required id="role" name="role">
                    <option value="admin" {{ $user->role == "admin" ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ $user->role == "user" ? 'selected' : '' }}>User</option>
                </select>
                @error('role')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm px-4 float-right ml-3">Submit</button>
                <button type="button" class="btn btn-info btn-sm px-4" data-toggle="modal" data-target="#modal-default">
                    Edit Password
                  </button>
                <a href="/user" class="btn btn-danger btn-sm px-4 float-right">Cancel</a>
            </div>
    </form>
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="font-size: 15px">Change Password</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/user/password/{{ $user->id }}" method="post">
            @csrf
        <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') @enderror" id="password" name="password" required placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" autocomplete="off" value="{{ old('password') }}">
                  @error('password')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
        </div>
    </form>
    </div>

    </div>

  </div>
@endsection