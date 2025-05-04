@extends('layouts.dash')

@section('content')
<div class="container">
    <h2>{{__('puplic.create_user')}}</h2>
    @if(session('success'))
    <div class="alert alert-success">
    session('success')
    @endif
    </div>
    @if($errors->any())
   <div class="alert">
         <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
             @endforeach
         </ul>
   </div>
    @endif
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">{{__('puplic.name')}}</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{__('puplic.email')}}</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">{{((__('puplic.password')))}}:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{((__('puplic.Confirm_Password')))}}:</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">{{__('puplic.role')}}:</label>
            <select id="role" name="role" class="form-select" required>
                <option value="admin">{{__('puplic.Admin')}}</option>
                <option value="member">{{__('puplic.Member')}}</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">{{__('puplic.Create')}}</button>
    </form>
</div>
@endsection
