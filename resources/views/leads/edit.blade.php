@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редактировать лид</h1>

    <form method="POST" action="{{ route('leads.update', $lead->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="first_name">Имя</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $lead->first_name }}" required>
        </div>

        <div class="form-group">
            <label for="last_name">Фамилия</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $lead->last_name }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Номер телефона</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $lead->phone }}" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $lead->email }}" required>
        </div>

        <div class="form-group">
            <label for="message">Текст обращения</label>
            <textarea class="form-control" id="message" name="message" rows="4" required>{{ $lead->message }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
@endsection
