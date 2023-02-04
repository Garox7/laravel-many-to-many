@extends('admin.layouts.base-admin')

@section('content')
@if(session('success_deleted'))
    <div class="container py-4">
        <div class="alert alert-warning">
            La categoria "{{ session('success_deleted')->name }}" è stata eliminata.
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
                <a href="{{ route('admin.categories.create') }}">
                    <span class="text">Add</span>
                    <i class='bx bx-message-square-add icon' ></i>
                </a>
            </div>
        </div>
        <div class="table-data">
            <div class="data name">
                <span class="data-title">Name</span>
                @foreach ($categories as $category)
                    <div class="data-list options">
                        <span class="actions">
                            @if($category->slug !== 'uncotegorized')
                                <form action="{{ route('admin.categories.destroy', ['category' => $category]) }}" method="post" class="delete">
                                    @csrf
                                    @method('DELETE')
                                    <button class="material-symbols-outlined icon">delete</button>
                                </form>
                            @else
                                <div class="delete" style="width: 24px"></div>
                            @endif
                            <a href="{{ route('admin.categories.edit', ['category' => $category]) }}" class="edit">
                                <span class="material-symbols-outlined icon">more_vert</span>
                            </a>
                        </span>
                        <span>
                            <a href="{{ route('admin.categories.show', ['category' => $category]) }}">
                                {{ $category->name }}
                            </a>
                        </span>
                    </div>
                @endforeach
            </div>
            <div class="data slug">
                <span class="data-title">Slug</span>
                @foreach ($categories as $category)
                    <span class="data-list">{{ $category->slug }}</span>
                @endforeach
            </div>
            <div class="data joined">
                <span class="data-title">ID</span>
                @foreach ($categories as $category)
                    <span class="data-list">{{ $category->id }}</span>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
