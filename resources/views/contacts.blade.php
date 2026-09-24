@extends('layouts.app')

@section('title','Контакты')

@section('content')

<h1>Контакты</h1>

<p>Наши контактные данные:</p>

@foreach ($contacts as $contact)

    <div class="nes-container with-title margin">

        <h3>{{ $contact['name'] }}</h3>

        <p>
            <strong>Телефон:</strong>
            {{ $contact['phone'] }}
        </p>

        <p>
            <strong>Email:</strong>
            {{ $contact['email'] }}
        </p>

    </div>

@endforeach

@endsection