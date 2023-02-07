@extends('admin.layouts.base-admin')

@section('content')
    <div class="container">
        <form action="{{ route('admin.tags.update', ['tag' => $tag]) }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            @csrf()
            @method('put')

            {{-- NAME --}}
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $tag->name) }}">
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
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $tag->slug) }}">
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

            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Modifica</button>
            </div>
        </form>
    </div>
@endsection
