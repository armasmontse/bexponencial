@extends('layouts.admin')


@section('title')
    {!! trans('manage_users.index.label') !!}
@endsection

@section('h1')
    {!! trans('manage_users.index.label') !!}
@endsection

@section('action')
    <a href="{{ route( 'admin::users.create' ) }}" class="btn-floating">
        <i class="material-icons waves-effect waves-light " >add</i>
    </a>
@endsection

@section('content')

	<users :list="store.users.data"></users>

@endsection

@section('vue_store')

    <script>
    console.log(mainVueStore);
        mainVueStore.users = {
            data: {!! json_encode($users) !!}
        }
    </script>

@endsection
