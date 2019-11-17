@extends('layouts.app')
@section('content')
    <users-i-t user-data-url="{{route('api-it-users')}}"></users-i-t>
@endsection
<script>

</script>
<script>
    import UsersIT from "../../js/components/UsersIT";

    export default {
        components: {UsersIT}
    }
</script>
