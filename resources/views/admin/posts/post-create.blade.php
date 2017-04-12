@extends('admin.header')

@section('content')
    <div class="columns is-marginless">
        @component('admin.props.sidebar')
        @endcomponent
        <div id="app" class="column is-10 is-offset-2 content-wrapper">
            <post-create-edit :post="{{$post->toJSON()}}">

            </post-create-edit>
        </div>
    </div>
@endsection
