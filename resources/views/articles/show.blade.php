@extends('layouts.app')

@section('title', 'Статьи')

@section('content')

<div class="nes-table-responsive">
    <table class="nes-table is-bordered is-centered">
        <tbody>
            @foreach($articles as $article)
            <tr>
                <th>Date</th>
                <td>{{ $article['datePublic'] }}</td>
            </tr>
            <tr>
                <th>Title</th>
                <td>{{ $article['title'] }}</td>
            </tr>
            <tr>
                <th>ShortDesc</th>
                <td>{{ $article['shortDesc'] ?? ' ' }}</td>
            </tr>
            <tr>
                <th>Desc</th>
                <td>{{ $article['desc'] }}</td>
            </tr>
            <tr class="article-separator">
                <th></th>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection