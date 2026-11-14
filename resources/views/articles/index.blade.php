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
    @can('article')
    <div class="article-actions margin">
        <a href="/article/{{$article->id}}/edit" class="nes-btn is-warning">Редактировать</a>
        <form action="/article/{{$article->id}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="nes-btn is-error">Удалить</button>
        </form>
    </div>
    @endcan
</div>

<hr>

<h2 class="margin4">Комментарии</h2>

@if(session('success'))
    <div class="nes-balloon from-left">
        {{ session('success') }}
    </div>
@endif

@forelse($article->comments as $comment)

    <section class="nes-container with-title margin2">
        <p class="title">
            {{ $comment->user ? $comment->user->name : 'Неизвестный пользователь' }}

            @if($comment->user && $comment->user->role &&
                $comment->user->role->role == 'moderator')
                <span class="nes-text is-primary">[Модератор]</span>
            @endif
        </p>

        <p>{{ $comment->text }}</p>

        <p>
            <small>{{ $comment->created_at->format('d.m.Y H:i') }}</small>
        </p>

        
        @auth
            @if($comment->user_id == auth()->id())
                <form action="{{ route('comment.update', $comment->id) }}"
                    method="POST">

                    @csrf
                    @method('PUT')

                    <div class="nes-field">
                        <label for="text-{{ $comment->id }}">
                            Редактировать комментарий
                        </label>

                        <textarea
                            class="nes-textarea"
                            name="text"
                            id="text-{{ $comment->id }}"
                            required
                        >{{ $comment->text }}</textarea>
                    </div>

                    <div style="display: flex; gap: 10px; align-items: center;">
                        <button type="submit" class="nes-btn is-warning">
                            Сохранить
                        </button>

                        @if(
                            $comment->user_id == auth()->id() ||
                            (auth()->user()->role &&
                            auth()->user()->role->role == 'moderator')
                        )
                            <button
                                type="button"
                                class="nes-btn is-error"
                                onclick="this.closest('.comment-block').querySelector('.delete-comment-form').requestSubmit()"
                            >
                                Удалить
                            </button>
                        @endif
                    </div>
                </form>
            @elseif(
                auth()->user()->role &&
                auth()->user()->role->role == 'moderator'
            )
                <form action="{{ route('comment.destroy', $comment->id) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="nes-btn is-error">
                        Удалить
                    </button>
                </form>
            @endif

            @if($comment->user_id == auth()->id())
                <form class="delete-comment-form"
                    action="{{ route('comment.destroy', $comment->id) }}"
                    method="POST"
                    style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            @endif
        @endauth

    </section>

    <br>

@empty

    <p>Пока нет комментариев. Будьте первым!</p>

@endforelse

<hr>

<h2 class="margin4">Оставить комментарий</h2>

@auth

    <form action="{{ route('comment.store', $article->id) }}"
          method="POST">

        @csrf

        <div class="nes-field">
            <label for="comment-text">Ваш комментарий</label>

            <textarea
                class="nes-textarea"
                name="text"
                id="comment-text"
                placeholder="Введите комментарий..."
                required
            >{{ old('text') }}</textarea>
        </div>

        @error('text')
            <p class="nes-text is-error">{{ $message }}</p>
        @enderror

        <br>

        <button type="submit" class="nes-btn is-primary">
            Отправить комментарий
        </button>

    </form>

@else

    <p>Чтобы оставить комментарий, необходимо авторизоваться.</p>

    <a href="{{ route('login') }}" class="nes-btn is-primary">
        Войти
    </a>

@endauth


@endsection