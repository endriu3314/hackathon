@extends('layouts.app')

@section('content')
    <admin-users-table route="{{route('api-users')}}"
                       user-role-url="{{route('api-userroles')}}"></admin-users-table>
@endsection
