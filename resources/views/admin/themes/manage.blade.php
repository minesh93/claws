@extends('admin.header')

@section('content')
    <div class="columns is-marginless">
        @component('admin.props.sidebar')
        @endcomponent
        <div class="column is-10 is-offset-2 content-wrapper">
            <div class="columns">
                <div class="column is-10">
                    <div class="title">
                        Managing Themes
                    </div>
                </div>
            </div>
            <div class="columns is-multiline">
                @foreach(Theme::listThemes() as $theme)
                    <div class="column is-4">
                        <div class="card theme-selector">
                            <div class="card-content">
                                <p class="title">
                                    {{$theme->name}}
                                </p>
                                <img src="http://placecorgi.com/1920/1080"  class="image is-16by9 is-paddingless"/>
                            </div>
                            <form method="POST" action="/admin/theme" class="card-footer">
                                <p class="card-footer-item">
                                    {{csrf_field()}}
                                    <input type="hidden" name="theme" value="{{$theme->id}}">
                                    <button type="submit" class="button is-block is-fullwidth is-primary" href="#">Activate Theme</button>
                                </p>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
