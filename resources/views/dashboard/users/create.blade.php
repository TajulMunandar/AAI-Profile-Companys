@extends('dashboard.layouts.main')

@section('page-content')
<!-- Row -->
<div class="card shadow-none border-0">
    <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
        <h4 class="mb-0">{{ isset($user) ? 'Edit User' : 'Create User' }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ isset($user) ? route('dashboard.users.update', $user->id) : route('dashboard.users.store') }}" method="POST">
            @csrf
            @if(isset($user))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ isset($user) ? $user->name : old('name') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ isset($user) ? $user->username : old('username') }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ isset($user) ? $user->email : old('email') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="is_admin" class="form-label">Role</label>
                    <select class="form-select" id="is_admin" name="is_admin" required>
                        <option value="operator" {{ isset($user) && $user->is_admin == 'operator' ? 'selected' : '' }}>Operator</option>
                        <option value="admin" {{ isset($user) && $user->is_admin == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password {{ isset($user) ? '(Kosongkan jika tidak ingin mengubah)' : '' }}</label>
                <input type="password" class="form-control" id="password" name="password" {{ !isset($user) ? 'required' : '' }}>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="ti {{ isset($user) ? 'ti-pencil' : 'ti-plus' }}"></i>
                    {{ isset($user) ? 'Update' : 'Create' }}
                </button>
                <a href="{{ route('dashboard.users.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
