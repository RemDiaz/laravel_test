@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')


<form action="/auth/login" method="post" class="signup-form">
    @csrf
    <div class="nes-field margin">
        <label for="name_field">Your name</label>
        <input name="name" type="text" id="" placeholder="Enter name" class="nes-input">
    </div>
    <div class="nes-field margin">
        <label for="email_field">Email</label>
        <input name="email" type="email" id="email_field" placeholder="Enter email" class="nes-input">
    </div>
    <div class="nes-field margin">
        <label for="password_field">Password</label>
        <input name="password" type="password" id="password_field" placeholder="Password" class="nes-input">
    </div>
    <button type="submit" class="nes-btn is-success margin">Submit</button>
</form>

@endsection

