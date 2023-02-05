@extends('admin.layouts.base-admin')

@section('content')
<div class="dash-container">
    <div class="table">
        <div class="title">
            <div class="title-content">
                <i class='bx bxs-dashboard icon'></i>
                <span class="text">Tags</span>
            </div>
            <div class="title-content">
                <a href="{{ route('admin.tags.create') }}">
                    <span class="text">Add</span>
                    <i class='bx bx-message-square-add icon' ></i>
                </a>
            </div>
        </div>

        <div class="table-data">
            <div class="data name">
                <span class="data-title">Title</span>
                @foreach ($tags as $tag)
                    <div class="data-list options">
                        <span class="actions">

                            <form action="#" method="post" class="delete">
                                @csrf
                                @method('DELETE')
                                <button class="material-symbols-outlined icon">delete</button>
                            </form>

                            <a href="#" class="edit">
                                <span class="material-symbols-outlined icon">more_vert</span>
                            </a>
                        </span>
                        <span>
                            <a href="{{ route('admin.tags.show', ['tag' => $tag]) }}">
                                {{ $tag->name }}
                            </a>
                        </span>
                    </div>
                @endforeach
            </div>
            <div class="data slug">
                <span class="data-title">Slug</span>
                @foreach ($tags as $tag)
                    <span class="data-list">{{ $tag->slug }}</span>
                @endforeach
            </div>
            {{-- <div class="data category">
                <span class="data-title">Post Associati</span>
                @if($tag->posts)
                    @foreach ($tag->posts as $post)
                        <a href="#" class="data-list">
                            {{ $post->title }}
                        </a>
                    @endforeach
                @endif
            </div> --}}
            {{-- <div class="data joined">
                <span class="data-title">Joined</span>
                @foreach ($posts as $post)
                    <span class="data-list">{{ $post->created_at }}</span>
                @endforeach
            </div> --}}
        </div>
    </div>
    {{-- <div class="mx-auto pt-2" >
        {{ $posts->links() }}
    </div> --}}
</div>
@endsection
