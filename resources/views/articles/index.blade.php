@extends('layouts.app')

@section('title', 'Статьи')

@section('content')

<div class="nes-table-responsive">
    <table class="nes-table is-bordered is-centered">
        <tbody>
            <tr>
                <th>Date</th>
                <td>{{ $article->datePublic }}</td>
            </tr>
            <tr>
                <th>Title</th>
                <td>{{ $article->title }}</td>
            </tr>
            <tr>
                <th>ShortDesc</th>
                <td>{{ $article->shortDesc}}</td>
            </tr>
            <tr>
                <th>Desc</th>
                <td>{{ $article->desc}}</td>
            </tr>
        </tbody>
    </table>
    <div class="article-actions margin">
        <a href="/article/{{$article->id}}/edit" class="nes-btn is-warning">Редактировать</a>
        <form action="/article/{{$article->id}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="nes-btn is-error">Удалить</button>
        </form>
    </div>
</div>

@endsection