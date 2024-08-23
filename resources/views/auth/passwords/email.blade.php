@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Сброс пароля</h1>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Отправить ссылку для сброса пароля</button>
    </form>
</div>
@endsection
