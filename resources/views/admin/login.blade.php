@extends('admin.header')

@section('content')
    <section class="hero is-fullheight has-text-centered">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">Admin Login</h1>
                <div class="columns">
                    <div class="column is-4 is-offset-4 is-narrow">
                        <form id="login-box" class="box has-text-left" action="/admin/login" method="post">
                            {{ csrf_field() }}
                            <div class="field">
                                <label class="label">Email</label>
                                <p class="control has-icon">
                                    <input class="input" type="text" name="email" placeholder="Your Email">
                                    <span class="icon is-small">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                </p>
                            </div>

                            <div class="field">
                                <label class="label">Password</label>
                                <p class="control has-icon">
                                    <input class="input" type="password" name="password" placeholder="Your Super Secret Password">
                                    <span class="icon is-small">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                </p>
                            </div>

                            <div class="field">
                                <p class="control">
                                    <button class="button is-primary">
                                        Login
                                    </button>
                                </p>
                            </div>

                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
