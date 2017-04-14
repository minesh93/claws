@extends('admin.header')

@section('content')
    <div class="columns is-marginless">
        @component('admin.props.sidebar')
        @endcomponent
        <div id="app" class="column is-10 is-offset-2 content-wrapper">
            <post-create-edit :mount-p="{{$post->toJSON()}}" :mount-t="{{json_encode($type)}}">

            </post-create-edit>
        </div>
    </div>
@endsection
