@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Usuario</h1>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
            <div class="form-group">
                <label for="roles">Roles</label>
                <select name="roles[]" class="form-control" multiple required>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
