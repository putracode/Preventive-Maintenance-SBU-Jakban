@extends('layout.adminlte')

@section('content')
<div class="card card-info" style="margin-top: -20px; margin-bottom: 50px;">
    <div class="card-header">
        <h3 class="card-title">Create User</h3>
    </div>
    <form action="/user" method="POST">
        @csrf
        <div class="card-body">
            
            <div class="form-group mb-4">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required value="{{ old('name') }}" autocomplete="off">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="username">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required value="{{ old('username') }}" autocomplete="off">
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required value="{{ old('password') }}" autocomplete="off">
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label for="role">Role</label>
                <select class="form-control select2 @error('role') is-invalid @enderror" required id="role" name="role">
                    <option selected hidden></option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
                @error('role')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm px-4 float-right ml-3" id="submitButton">Submit</button>
                <a href="/user" class="btn btn-danger btn-sm px-4 float-right">Cancel</a>
            </div>
    </form>
</div>
@endsection
@section('script')
{{-- <script src="/asset/plugins/select2/js/select2.full.min.js"></script>
<script>
    $('.select2').select2()
</script> --}}
@endsection
