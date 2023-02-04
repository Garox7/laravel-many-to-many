@extends('admin.layouts.base-admin')

@section('content')
<div class="container">
    <form action="{{ route('admin.categories.update', ['category' => $category]) }}" method="post" class="needs-validation">
        @csrf
        @method('put')

        {{-- NOME --}}
        <div class="mb-3">
            <label for="name" class="form-label">NOME</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $category->name) }}">
            <div class="invalid-feedback">
                @error('name')
                    <ul>
                        @foreach ($errors->get('name') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        {{-- SLUG --}}
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $category->slug) }}">
            <div class="invalid-feedback">
                @error('slug')
                    <ul>
                        @foreach ($errors->get('slug') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        {{-- DESCRIPTION --}}
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $category->description) }}</textarea>
            <div class="invalid-feedback">
                @error('description')
                    <ul>
                        @foreach ($errors->get('description') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Modifica</button>
        </div>
    </form>
</div>
@endsection
