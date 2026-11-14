@extends('layouts.app')

@section('content')

<div class="nes-container with-title">
    <p class="title">Модерация комментариев</p>

    @if(session('success'))
        <p class="nes-text is-success">
            {{ session('success') }}
        </p>
    @endif

    @forelse($comments as $comment)

        <div class="nes-container is-rounded" style="margin-bottom: 20px;">

            <p>
                Автор: {{ $comment->user->name ?? 'Неизвестен' }}
            </p>

            <p>
                Статья: {{ $comment->article->title ?? 'Без названия' }}
            </p>

            <p>
                Комментарий:
            </p>

            <p>{{ $comment->text }}</p>

            <div style="display: flex; gap: 10px;">

                <form action="{{ route('comment.approve', $comment->id) }}"
                      method="POST">
                    @csrf
                    @method('PATCH')

                    <button type="submit" class="nes-btn is-success">
                        Принять
                    </button>
                </form>

                <form action="{{ route('comment.reject', $comment->id) }}"
                      method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="nes-btn is-error">
                        Отклонить
                    </button>
                </form>

            </div>
        </div>

    @empty

        <p>Нет комментариев, ожидающих модерации.</p>

    @endforelse
</div>

@endsection