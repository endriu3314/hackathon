@extends('layouts.app')

@section('content')
    <a href={{route('ev-nou')}} class="btn btn-primary">Create event</a>
    <admin-users-table route="{{route('api-users')}}"
                       user-role-url="{{route('api-userroles')}}"></admin-users-table>
@endsection
