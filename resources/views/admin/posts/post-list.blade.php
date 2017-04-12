@extends('admin.header')

@section('content')
    <div class="columns is-marginless">
        @component('admin.props.sidebar')
        @endcomponent
        <div class="column is-10 is-offset-2 content-wrapper">
            <div class="title">
                Woot
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
    </div>
@endsection
