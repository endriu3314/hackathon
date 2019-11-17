@extends('layouts.app')
@section('content')
<title>Cotei</title>
    <div class="row flex-row flex-wrap">
        <div class="col">
            <div class="row">
                <user-profile-single route="{{route('api-userdata', $id)}}"></user-profile-single>
            </div>
            <div class="row">
                <istoric-joburi route="{{route('api-userjobs', Auth::user()->id)}}"></istoric-joburi>
            </div>
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
