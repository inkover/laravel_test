@extends('layouts.layout')

@section('content')       
       <section id="form"><!--form-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="login-form"><!--login form-->
                            <h2>Восстановление пароля</h2>
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{url('remind')}}">
                                {!! csrf_field() !!}
                                <input type="email" name="email" id="email" placeholder="Email Address" />

                                <button type="submit" class="btn btn-default">Отправить запрос</button>
                            </form>
                        </div><!--/login form-->
                    </div>
                </div>
            </div>
        </section><!--/form-->
@endsection