@extends('layouts.app')
@section('content')
    <users-marketing user-data-url="{{route('api-marketing-users')}}"></users-marketing>
@endsection
<script>

</script>

<script>
    import UsersMarketing from "../../js/components/UsersMarketing";
    export default {
        components: {UsersMarketing}
    }
</script>
