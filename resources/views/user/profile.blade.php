@extends('layouts.app')
@section('content')
    <div class="row flex-row flex-wrap">
        <div class="col-6">
            <user-profile route="{{route('api-userdata', Auth::user()->id)}}"></user-profile>
        </div>
        <div class="col-6">

        </div>
    </div>
@endsection
<script>

</script>
