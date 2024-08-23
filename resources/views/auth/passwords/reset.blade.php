@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Восстановление пароля</h1>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $email ?? old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Новый пароль</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="password-confirm">Подтвердите новый пароль</label>
            <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-primary">Сбросить пароль</button>
    </form>
</div>
@endsection
