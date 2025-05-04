@extends('layouts.dash')

@section('content')
<div class="container">
    <h2>{{ __('puplic.available_books') }}</h2>

    @if($books->isEmpty())
        <p>{{ __('puplic.no_available_books') }}</p>
    @else
        <div class="row">
            @foreach($books as $book)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $book->imag ?: 'https://via.placeholder.com/150' }}" class="card-img-top" alt="{{ $book->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">{{ $book->description }}</p>
                        <p class="card-text">
                            <small class="text-muted">{{ __('puplic.category') }}: {{ optional($book->category)->name }}</small>
                        </p>

                        @if($book->is_available)
                            <form action="{{ route('books.borrow', $book) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">{{ __('puplic.borrow') }}</button>
                            </form>
                        @else
                            <button class="btn btn-secondary" disabled>{{ __('puplic.borrowed') }}</button>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
