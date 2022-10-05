@extends('layouts.app')

@section('content')
    <header>
        <h1>
            {{ $post->title }}
        </h1>
    </header>
    <div class="clearfix">
        @if ($post->image)
            <img class="float-left mr-2" src="{{ $post->image }}" alt="{{ $post->slug }}">
        @endif
        <p>
            <strong>Categoria:</strong>
            @if ($post->category)
                {{ $post->category->label }}
            @else
                Nessuna
            @endif
        </p>
        <div class="mb-2">
            <strong>Tags:</strong>
            @forelse($post->tags as $tag)
                <span class="badge text-white p-1" style="background-color: {{ $tag->color }}">{{ $tag->label }}</span>
            @empty
                Nessun tag
            @endforelse
        </div>
        <div>
            <p>{{ $post->content }}</p>
        </div>



        <div><strong>Creato il:</strong> <time>{{ $post->created_at }}</time></div>
        <div><strong> Modificato il:</strong> <time>{{ $post->updated_at }}</time></div>
        <div>
            @if ($post->user)
                <strong>Autore:</strong> {{ $post->user->name }}
            @else
                Autore anonimo
            @endif
        </div>
    </div>
    <footer class="mt-5">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">
                    <i class="fa solid fa-rotate-left m-2"></i> Indietro
                </a>


            </div>

            <div class="d-flex align-items-center justify-content-end">
                @if ($post->user_id === Auth::id())
                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="delete-form">
                        <a class="btn btn btn-warning" href="{{ route('admin.posts.edit', $post) }}"><i
                                class="fa-solid fa-pencil m-2"></i>
                            Modifica</a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger mx-2" type="submit">
                            <i class="fa-solid fa-trash m-2"></i>Elimina
                        </button>
                    </form>
                @endif
            </div>

        </div>
    </footer>
@endsection
