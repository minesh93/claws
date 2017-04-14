@extends('admin.header')

@section('content')
    <div class="columns is-marginless">
        @component('admin.props.sidebar')
        @endcomponent
        <div class="column is-10 is-offset-2 content-wrapper">
            <div class="columns">
                <div class="column is-10">
                    <div class="title">
                        {{$type->listTitle}}
                    </div>
                </div>
                <div class="column is-2 is-vcentered">
                    <a href="/admin/content/{{$type->name}}/add" class="button is-primary is-large is-fullwidth">{{$type->createText}}</a>
                </div>
            </div>
            <table class="table">
                <thead>

                <tr>
                    <th>Name</th>
                    <th>Creator</th>
                    <th>Edited</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->name}}</td>
                            <td>{{$post->creator->name}}</td>
                            <td>{{$post->updated_at->format('d/m/Y')}}</td>
                            <td>
                                <div class="field is-grouped">
                                    <p class="control">
                                        <a class="button is-primary" href='/admin/content/{{$type->name}}/{{$post->id}}'">
                                            Edit
                                        </a>
                                    </p>
                                    <p class="control">
                                        <a class="button is-danger">
                                            Delete
                                        </a>
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
