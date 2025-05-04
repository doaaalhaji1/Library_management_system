@extends('layouts.dash')

@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
    {{session('success')}}
    @endif
    </div>
    
    <h2>{{__('puplic.usres')}}</ h2>
    
    


    @if($users->isEmpty())
   {{__('puplic.no_users')}}
    @else
    <table class="table table-striped">
        <thead>
        <tr>
            <th> {{__('puplic.id')}}</th>
            <th> {{__('puplic.name')}}</th>
            <th> {{__('puplic.email')}}</th>
            <th> {{__('puplic.joined_at')}} </th>
            <th> {{__('puplic.role')}} </th>
        </tr>
        </thead>
        <tbody>
            @foreach($users as $c)
            <tr> 
                <td>{{$c->id}}</td>
                <td>{{$c->name}}</td>
                <td>{{$c->email}}</td>
               
               
                <td>{{$c->created_at}}</td>
                 <td>{{$c->role}}</td>
                <td>
                    

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    
</div>
@endsection