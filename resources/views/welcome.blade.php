@extends('layouts.app')

@section('title', 'Главная')

@section('content')

    <style>
        .article-separator{
            background:#212529;
            height:20px;
        }
    </style>

    <h1>Добро пожаловать!</h1>

    <p>
        Мы рады приветствовать вас на нашем сайте.
    </p>

    <p>
        Здесь вы сможете узнать больше о чем-нить
        • • • ⍩⃝
    </p>

    <div class="nes-table-responsive">
    <table class="nes-table is-bordered is-centered">
        <tbody>
            @foreach($articles as $article)
            <tr>
                <th>Date</th>
                <td>{{ $article['date'] }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $article['name'] }}</td>
            </tr>
            <tr>
                <th>ShortDesc</th>
                <td>{{ $article['shortDesc'] ?? ' ' }}</td>
            </tr>
            <tr>
                <th>Desc</th>
                <td>{{ $article['desc'] }}</td>
            </tr>
            <tr>
                <th>Image</th>
                <td><a href="/galery/{{$article['full_image']}}"><img src="{{URL::asset('/images/'.$article['preview_image'])}}" alt="" height="100" width="auto"></a></td>
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
