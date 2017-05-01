@extends('admin.header')

@section('content')
    <div class="columns is-marginless">
        @include('admin.props.sidebar')
        <div id="app" class="column is-10 is-offset-2 content-wrapper" data-meta='{{$meta}}'>
        	<notification :n="notification"></notification>
            <post-create-edit :mount-p="{{$post->toJSON()}}" :mount-t="{{json_encode($type)}}" :mount-m="meta" v-if="rendered">
                {{PostRegister::getMetaTemplates($post->type)}}
            </post-create-edit>
        </div>
    </div>
@endsection