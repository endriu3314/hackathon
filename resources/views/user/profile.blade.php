@extends('layouts.app')
@section('content')
    <div class="row flex-row flex-wrap">
        <div class="col-6">
            <div class="row">
                <user-profile route="{{route('api-userdata', Auth::user()->id)}}"></user-profile>
            </div>
            <div class="row">
                <istoric-joburi route="{{route('api-userjobs', Auth::user()->id)}}"></istoric-joburi>
            </div>
        </div>
        <div class="col-6">
            <user-profile-edit user-data-url="{{route('api-userdata', Auth::user()->id)}}"
                               user-update-url="{{route('update-user')}}">
            </user-profile-edit>
        </div>
    </div>
@endsection
<script>

</script>
<script>
    import IstoricJoburi from "../../js/components/IstoricJoburi";
    export default {
        components: {IstoricJoburi}
    }
</script>
