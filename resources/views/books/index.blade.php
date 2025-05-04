@extends('layouts.dash')

@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
    {{ session('success') }}
    @endif
    </div>

    <h2>{{ __('puplic.all_book') }}</h2>

    @if($books->isEmpty())
    {{ __('puplic.no_book') }}
    @else
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ __('puplic.id') }}</th>
                <th>{{ __('puplic.title') }}</th>
                <th>{{ __('puplic.descrption') }}</th>
                <th>{{ __('puplic.category') }}</th>
                <th>{{ __('puplic.joined_add') }}</th>
                <th>{{ __('puplic.availability') }}</th>
                <th>{{ __('puplic.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->description }}</td>
                <td>{{ optional($book->category)->name }}</td>
                <td>{{ $book->created_at }}</td>
                <td>
                <form action="{{ route('books.toggleAvailability', $book->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('PATCH')
    
    <div class="form-group">
        <label for="user_id">{{ __('puplic.select_user') }}</label>
        <select name="user_id" id="user_id" class="form-select" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    
    <button type="submit" class="btn btn-{{ $book->is_available ? 'success' : 'danger' }}">
        {{ $book->is_available ? __('puplic.available') : __('puplic.not_available') }}
    </button>
</form>


                </td>
                <td class="">
                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary" style="margin-bottom: 10px;">
    {{ __('puplic.edit') }}
</a>

<form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" style="margin-right: 10px;">
        {{ __('puplic.delete') }}
    </button>
</form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

</div>
@endsection
