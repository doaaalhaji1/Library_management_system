@extends('layouts.dash')

@section('content')
     <h1>{{__('puplic.welcomedash')}}</h1>
     
              
                <a href="{{ route('profile.edit') }}" class="btn btn-primary mb-1">
                    {{ __('puplic.Profile') }}
                </a>
                
                <div class="form-container">
                    <form method="POST" action="{{ route('logout') }}" class="mb-0">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            {{ __('puplic.Log_Out') }}
                        </button>
                    </form>
                </div>
            
        
@endsection