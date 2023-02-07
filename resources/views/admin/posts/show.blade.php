@extends('admin.layouts.base-admin')

@section('content')
    <div class="container py-5">
        <h1>{{ $post->title }}</h1>
        <h5>Nella categoria: {{ $post->category->name }}</h5>
        <div class="pb-4">
            @if ($post->tags->all())
                <span>Tags: </span>
                @foreach ($post->tags as $tag)
                    <a href="{{ route('admin.tags.show', ['tag' => $tag]) }}">
                        {{ $tag->name }}
                    </a>
                        {{ $loop->last ? '' : ' ,' }}
                @endforeach
            @endif
        </div>
        <div class="container mb-5">
            <img src="{{ asset('storage/' . $post->uploaded_img) }}" alt="{{ $post->title }}" class="img-fluid rounded">
        </div>
        <p>{{ $post->content }}</p>
    </div>
@endsection
