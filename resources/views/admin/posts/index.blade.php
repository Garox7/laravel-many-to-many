@extends('admin.layouts.base-admin')

@section('content')
@if(session('success_deleted'))
    <div class="container py-4">
        <div class="alert alert-warning">
            Il post "{{ session('success_deleted')->title }}" è stato eliminato.
        </div>
    </div>
@endif
<div class="dash-container">
    <div class="table">
        <div class="title">
            <div class="title-content">
                <i class='bx bxs-dashboard icon'></i>
                <span class="text">Posts</span>
            </div>
            <div class="title-content">
                <a href="{{ route('admin.posts.create') }}">
                    <span class="text">Add</span>
                    <i class='bx bx-message-square-add icon' ></i>
                </a>
            </div>
        </div>

        <div class="table-data">
            <div class="data name">
                <span class="data-title">Title</span>
                @foreach ($posts as $post)
                    <div class="data-list options">
                        <span class="actions">

                            <form action="{{ route('admin.posts.destroy', ['post' => $post]) }}" method="post" class="delete">
                                @csrf
                                @method('DELETE')
                                <button class="material-symbols-outlined icon">delete</button>
                            </form>

                            <a href="{{ route('admin.posts.edit', ['post' => $post]) }}" class="edit">
                                <span class="material-symbols-outlined icon">more_vert</span>
                            </a>
                        </span>
                        <span>
                            <a href="{{ route('admin.posts.show', ['post' => $post]) }}">
                                {{ $post->title }}
                            </a>
                        </span>
                    </div>
                @endforeach
            </div>
            <div class="data slug">
                <span class="data-title">Slug</span>
                @foreach ($posts as $post)
                    <span class="data-list">{{ $post->slug }}</span>
                @endforeach
            </div>
            <div class="data category">
                <span class="data-title">Category</span>
                @if($post->category)
                    @foreach ($posts as $post)
                        <a href="#" class="data-list">
                            {{ $post->category->name }}
                        </a>
                    @endforeach
                @endif
            </div>
            <div class="data joined">
                <span class="data-title">Joined</span>
                @foreach ($posts as $post)
                    <span class="data-list">{{ $post->created_at }}</span>
                @endforeach
            </div>
        </div>
    </div>
    <div class="mx-auto pt-2" >
        {{ $posts->links() }}
    </div>
</div>
@endsection
