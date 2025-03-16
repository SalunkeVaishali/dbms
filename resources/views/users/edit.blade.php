@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>{{ isset($user) ? 'Edit User' : 'Create User' }}</h2>

    <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST">
        @csrf
        @if(isset($user))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" name="first_name" class="form-control" id="first_name" 
                value="{{ old('first_name', $user->first_name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" name="last_name" class="form-control" id="last_name" 
                value="{{ old('last_name', $user->last_name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" 
                value="{{ old('email', $user->email ?? '') }}" required>
        </div>

        @if(!isset($user))
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
        </div>
        @endif

        <div class="mb-3">
            <label for="role_id" class="form-label">User Role</label>
            <select name="role_id" class="form-control" required>
                <option value="">Select Role</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ isset($user) && $user->role_id == $role->id ? 'selected' : '' }}>
                        {{ ucfirst($role->role_name) }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($user) ? 'Update' : 'Create' }}</button>
    </form>
</div>
@endsection
