@extends('admin.header')

@section('content')
    <div class="columns is-marginless">
        @component('admin.props.sidebar')
        @endcomponent
        <div class="column is-10 is-offset-2 content-wrapper">
            <div class="columns">
                <div class="column is-10">
                    <div class="title">
                        List of {{str_plural($type)}}

                    </div>
                </div>
                <div class="column is-2 is-vcentered">
                    <button class="button is-primary is-large is-fullwidth">Create {{$type}}</button>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Creator</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->name}}</td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
