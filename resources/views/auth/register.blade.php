@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">

                    {!! Form::open(['url' => '/auth/register', 'role' => 'form', 'class' => 'form-horizontal']) !!}

                        <!-- Name Input Field -->
                        <div class="form-group">
                            {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('text', 'name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <!-- Email Address Form Input -->
                        <div class="form-group">
                            {!! Form::label('email', 'Email Address', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('email', 'email', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <!-- Password Input Field -->
                        <div class="form-group">
                            {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <!-- Confirm Password Input Field -->
                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    
                        <!-- License Number Input Field -->
                        <div class="form-group">
                            {!! Form::label('license_no', 'License Number', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('text', 'license_no', null, ['class' => 'form-control', 'maxlength' => '8']) !!}
                            </div>
                        </div>

                        <!-- License Level Input Field -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">License Level</label>
                            <div class="control-group col-md-6">
                                <label class="checkbox-inline col-md-4 col-md-offset-2">
                                    <input type="radio" checked value="L1" name="license_level"> L1
                                </label>
                                <label class="checkbox-inline col-md-4">
                                    <input type="radio" name="license_level" value="L2"> L2
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    {!! Form::close() !!}

                    @include('errors.list')
                </div>
            </div>
        </div>
    </div>
@endsection