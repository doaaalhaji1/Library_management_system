@extends('layouts.dash')

@section('content')
<div class="container">
    <h2>{{ __('puplic.edit_book') }}</h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="title" class="form-label">{{ __('puplic.title') }}</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $book->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">{{ __('puplic.descrption') }}</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $book->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">{{ __('puplic.category') }}</label>
            <select id="category_id" name="category_id" class="form-select" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="is_available" class="form-label">{{ __('puplic.availability') }}</label>
            <select id="is_available" name="is_available" class="form-select" required>
                <option value="1" {{ $book->is_available ? 'selected' : '' }}>{{ __('puplic.available') }}</option>
                <option value="0" {{ !$book->is_available ? 'selected' : '' }}>{{ __('puplic.reserved') }}</option>
            </select>
        </div>
        <div class="mb-3">
    <label for="image_url" class="form-label">{{ __('puplic.imag') }}</label>
    <input type="text" class="form-control" id="image_url" name="imag" value="{{ old('image_url', $book->image_url ?? '') }}">
</div>

        <button type="submit" class="btn btn-primary">{{ __('puplic.update') }}</button>
    </form>
</div>
@endsection
