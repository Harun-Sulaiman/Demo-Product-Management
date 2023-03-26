@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit roles for: {{ $user->name }}</div>

                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user) }}" method="POST">
                        <div class="form-group row mb-3">
                            <label for="email" class="col-md-2 col-form-label text-md-end">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="form-group row mb-3">
                            <label for="name" class="col-md-2 col-form-label text-md-end">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="form-group row mb-3">
                            <label for="roles" class="col-md-2 col-form-label text-md-end">Roles</label>
                            <div class="col-md-6">
                                @foreach ($roles as $role)
                                    <div class="form-check">
                                        <input type="checkbox" name="roles[]" id="role{{ $role->id }}" value="{{ $role->id }}" class="form-check-input"
                                            @if ($user->roles->pluck('id')->contains($role->id)) checked @endif >
                                        <label class="form-check-label" for="role{{ $role->id }}">{{ $role->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-2">
                                @csrf
                                {{ method_field('put') }}
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
