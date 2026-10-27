@extends('layouts.app')

@section('title', 'Вход')

@section('content')


<form action="/auth/signin" method="post" class="signup-form">
    @csrf
    <div class="nes-field margin">
        <label for="email_field">Email</label>
        <input name="email" type="email" id="email_field" placeholder="Enter email" class="nes-input">
    </div>
    <div class="nes-field margin">
        <label for="password_field">пароль</label>
        <input name="password" type="password" id="password_field" placeholder="Password" class="nes-input">
    </div>
    <button type="submit" class="nes-btn is-success margin">Submit</button>
</form>

@endsection

