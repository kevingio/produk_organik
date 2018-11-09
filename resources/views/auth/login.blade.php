@extends('layouts.master')

@section('title')
  Login
@endsection

@section('content')
<section class="stack">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <div class="col-md-12">
                            @if ($errors->has('username'))
                                <div class="alert alert-danger">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Username</label>
                        <div class="col-md-12">
                            <input id="username" type="text" class="form-control" name="username" autocomplete="off" required autofocus>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>
                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control" name="password" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-dark btn-block">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
