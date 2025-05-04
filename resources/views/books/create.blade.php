@extends('layouts.dash')

@section('content')
<div class="container">
    <h2>{{__('puplic.create_book')}}</h2>
    
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

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">{{__('puplic.title')}}</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">{{__('puplic.descrption')}}</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">{{__('puplic.category')}}</label>
            <select id="category_id" name="category_id" class="form-select" required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="is_available" class="form-label">{{__('puplic.is_available')}}</label>
            <select id="is_available" name="is_available" class="form-select" required>
                <option value="1">{{__('puplic.available')}}</option>
                <option value="0">{{__('puplic.not_available')}}</option>
            </select>
        </div>
        <div class="mb-3">
    <label for="image_url" class="form-label">{{ __('puplic.imag') }}</label>
    <input type="text" class="form-control" id="image_url" name="image_url" value="{{ old('image_url', $book->image_url ?? '') }}">
</div>

        <button type="submit" class="btn btn-primary">{{__('puplic.Create')}}</button>
    </form>
</div>
@endsection
