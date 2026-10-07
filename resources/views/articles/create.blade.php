@extends('layouts.app')

@section('title', 'Редактирование')

@section('content')


<form action="/article" method="post">
    @csrf
    <div class="nes-field margin">
        <label for="date_field">Date</label>
        <input name="datePublic" type="date" id="date_field"  class="nes-input">
    </div>
    <div class="nes-field margin">
        <label for="name_field">Title</label>
        <input name="title" id="name_field"  class="nes-input">
    </div>
    <div class="nes-field margin">
        <label for="shortDesc_field">Short description</label>
        <input name="shortDesc" id="shortDesc_field"  class="nes-input">
    </div>
    <div class="nes-field margin">
        <label for="desc_field">Description</label>
        <textarea name="desc" id="desc_field" class="nes-textarea"></textarea>
    </div>
    <button type="submit" class="nes-btn is-success margin">Готово</button>
</form>

@endsection

