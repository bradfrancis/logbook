@extends('app')
@section('content')
    <div class="col-md-10">
        <div class="col-md-7 col-md-offset-4">
            <div class="row">
                <div class="page-header">
                    <h1>Account Settings</h1>
                </div>
                <p>Here you can modify your account settings such as your name, email address,
                    password etc.
                </p>
            </div>

            <div class="panel-group" id="account-settings-panel-group" aria-multiselectable="true">
                <div class="row">
                    <div class="panel panel-default">
                    <div class="panel-heading"><h4 class="panel-title">User Information</h4></div>
                    <div class="panel-body">
                        {!! Form::model($learner, ['route' => 'account::updateUserInfo',
                            'role' => 'form', 'class' => 'form-horizontal', 'method' => 'PATCH']) !!}
                        <div class="row">
                            <!-- Name Input Field -->
                            <div class="form-group">
                                {!! Form::label('name', 'Name: ', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::input('text', 'name', null, ['class' => 'form-control input-sm', 'required']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- License Number Input Field -->
                            <div class="form-group">
                                {!! Form::label('license_no', 'License Number: ', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::input('text', 'license_no', null, ['class' => 'form-control input-sm', 'required']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- License Level Input Field -->
                            <div class="form-group">
                                {!! Form::label('license_level', 'License Level: ', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-3">
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                {!! Form::radio('license_level', 'L1', null) !!}
                                            </span>
                                        {!! Form::text(null, 'L1', ['class' => 'form-control input-sm', 'disabled']) !!}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                {!! Form::radio('license_level', 'L2', null) !!}
                                            </span>
                                        {!! Form::text(null, 'L2', ['class' => 'form-control input-sm', 'disabled']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-10">
                                    {!! Form::submit('Save Changes', ['class' => 'btn btn-sm btn-success pull-right']) !!}
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}

                        @if(session('form_name') && session('form_name') === 'userinfo')
                            <div class="row">
                                <div class="col-md-12">
                                    @include('errors.list')
                                </div>

                            </div>
                        @endif
                    </div>
                </div>
                </div>

                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">Email/Password</h4>
                        </div>
                        <div class="panel-body">
                            {!! Form::open(['route' => 'account::updateEmailPass', 'role' => 'form',
                                'class' => 'form-horizontal', 'method' => 'PATCH']) !!}
                                <div class="row">
                                    <!-- Email Input Field -->
                                    <div class="form-group">
                                        {!! Form::label('email', 'Email: ', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::input('email', 'email', $user->email, ['class' => 'form-control input-sm', 'required']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Password Input Field -->
                                    <div class="form-group">
                                        {!! Form::label('password', 'Password: ', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::input('password', 'password', null, ['class' => 'form-control input-sm', 'minlength' => '6']) !!}
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <!-- Password Confirm Input Field -->
                                <div class="form-group">
                                    {!! Form::label('password_confirmation', 'Confirm Password: ', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control input-sm', 'minlength' => '6']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-10">
                                        {!! Form::submit('Save Changes', ['class' => 'btn btn-sm btn-success pull-right']) !!}
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}

                            @if(session('form_name') && session('form_name') === 'emailpass')
                                <div class="row">
                                    <div class="col-md-12">
                                        @include('errors.list')
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection