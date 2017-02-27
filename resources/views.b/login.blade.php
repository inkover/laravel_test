@extends('layouts.layout')

@section('content')       
       <section id="form"><!--form-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="login-form"><!--login form-->
                            <h2>Авторизация</h2>
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{url('login')}}">
                                {!! csrf_field() !!}
                                <input type="email" name="email" id="email" placeholder="Email Address" />
                                <input type="password" name="password" id="password" placeholder="Password" />
                                <div>
                                    <input name="remember" id="remember" type="checkbox" class="checkbox" style="display: inline;">
                                    Запомнить меня
                                </div>
                                <div><a href="/remind">Восстаноить пароль</a></div>
                                <button type="submit" class="btn btn-default">Login</button>
                            </form>
                        </div><!--/login form-->
                    </div>
                </div>
            </div>
        </section><!--/form-->
@endsection