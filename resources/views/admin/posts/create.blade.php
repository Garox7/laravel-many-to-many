@extends('admin.layouts.base-admin')

@section('content')
    <div class="container">
        <form action="{{ route('admin.posts.store') }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            @csrf()

            {{-- TITOLO --}}
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                <div class="invalid-feedback">
                    @error('title')
                        <ul>
                            @foreach ($errors->get('title') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @enderror
                </div>
            </div>

            {{-- SLUG --}}
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
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

            {{-- CATEGORY --}}
            <div class="mb-3">
                <label for="category" class="form-label">Categoria</label>
                <select class="form-select @error('category_id') is-invalid @enderror" id="category" name="category_id">
                    <option value="">Seleziona la categoria</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    @error('category_id')
                        <ul>
                            @foreach ($errors->get('category_id') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @enderror
                </div>
            </div>

            {{-- TAGS --}}
            <div class="mb-3">
                <h6>Tags</h6>
                <div class="d-flex flex-wrap">
                    @foreach($tags as $tag)
                        <div class="form-check mx-1">
                            <input
                                id="tag-{{ $tag->id }}"
                                class="form-check-input"
                                type="checkbox"
                                value="{{ $tag->id }}"
                                name="tags[]"
                                @if (in_array($tag->id, old('tags', []))) checked @endif
                            >
                            <label class="form-check-label" for="tag-{{ $tag->id }}">
                                {{ $tag->name }}
                            </label>
                        </div>
                    @endforeach
                    @if ($errors->has('tags') || $errors->has('tags.*'))
                        <div>
                            Ci sono problemi con il tag
                        </div>
                    @endif
                </div>
            </div>

            {{-- FILE IMAGE --}}
            <div class="mb-3">
                <label for="uploaded_img" class="form-label">Importa file</label>
                <input type="file" class="form-control @error('uploaded_img') is-invalid @enderror" id="uploaded_img" name="uploaded_img" aria-label="file example" required>
                <div class="invalid-feedback">
                    @error('uploaded_img')
                        <ul>
                            @foreach ($errors->get('uploaded_img') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @enderror
                </div>
            </div>

            {{-- CONTENT --}}
            <div class="mb-3">
                <label for="content" class="form-label">Contenuto</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{ old('content') }}</textarea>
                <div class="invalid-feedback">
                    @error('content')
                        <ul>
                            @foreach ($errors->get('content') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @enderror
                </div>
            </div>

            {{-- EXCERPT --}}
            <div class="mb-3">
                <label for="excerpt" class="form-label">Testo d'anteprima</label>
                <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt">{{ old('excerpt') }}</textarea>
                <div class="invalid-feedback">
                    @error('excerpt')
                        <ul>
                            @foreach ($errors->get('excerpt') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Crea post</button>
            </div>
        </form>
    </div>
@endsection
