@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Подтверждение Email</h1>

    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            На ваш e-mail было отправлено новое письмо для подтверждения.
        </div>
    @endif

    <p>Перед тем как продолжить, пожалуйста, подтвердите свой адрес электронной почты, перейдя по ссылке в письме, которое мы вам отправили. Если вы не получили письмо, <a href="{{ route('verification.resend') }}">нажмите здесь, чтобы запросить еще раз</a>.</p>
</div>
@endsection
