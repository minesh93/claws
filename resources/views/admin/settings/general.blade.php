@extends('admin.header')

@section('content')
    <div class="columns is-marginless">
        @include('admin.props.sidebar')
        <div id="app" class="column is-10 is-offset-2 content-wrapper">
            <settings-general :posts='{{json_encode($posts)}}' :mount-s='{{$settings}}'></settings-general>
        </div>
    </div>
@endsection