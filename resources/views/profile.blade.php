@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Профиль пользователя</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('resent'))
        <div class="alert alert-success">{{ session('resent') }}</div>
    @endif

    <form method="POST" action="{{ route('profile') }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
        </div>

        <div class="form-group">
            <label for="password">Новый пароль</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <label for="password-confirm">Подтвердите новый пароль</label>
            <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
        </div>

        <button type="submit" class="btn btn-primary">Обновить профиль</button>
    </form>

    @if (!Auth::user()->hasVerifiedEmail())
        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-secondary mt-3">Отправить письмо для подтверждения аккаунта</button>
        </form>
    @endif
</div>
@endsection
