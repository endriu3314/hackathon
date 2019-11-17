@extends('layouts.app')
@section('content')
    <users-vanzari user-data-url="{{route('api-vanzari-users')}}"></users-vanzari>
@endsection
<script>

</script>
<script>
    import UsersVanzari from "../../js/components/UsersVanzari";
    export default {
        components: {UsersVanzari}
    }
</script>
