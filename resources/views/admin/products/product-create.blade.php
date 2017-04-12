@extends('admin.header')

@section('content')
    <div class="columns is-marginless">
        @component('admin.props.sidebar')
        @endcomponent
        <div id="app" class="column is-10 is-offset-2 content-wrapper">
            <div class="title">
                Create Product
            </div>
            <form class="columns">
                <div class="column is-8">
                    <div class="field">
                        <label class="label">Name</label>
                        <p class="control">
                            <input class="input" type="text" placeholder="Some Unique T-Shirt" value="{{$product->name}}">
                        </p>
                    </div>

                    <div class="field">
                        <label class="label">Description</label>
                        <p class="control">
                            @component('admin.props.quill')
                              {{$product->description}}
                            @endcomponent
                        </p>
                    </div>

                    <div class="field">
                        <label class="label">Price</label>
                        <p class="control">
                            <input class="input" type="text" placeholder="0.00" v-model="product.price">
                        </p>
                    </div>

                </div>
                <div class="column is-4">
                    <p class="control">
                        <button v-on:click="saveProduct" class="button is-primary is-fullwidth">Save</button>
                    </p>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
