@extends("layouts.users")
@section("content")
<div class="container">

    <router-view name="beHome" :key="$route.name + Date.now()"></router-view>
    <router-view :key="$route.name + Date.now()"></router-view>

</div>
@endsection
