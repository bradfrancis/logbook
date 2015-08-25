@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">

                    {!! Form::open(['url' => '/auth/register', 'role' => 'form',
                        'class' => 'form-horizontal', 'id' => 'reg_form']) !!}

                        <!-- Name Input Field -->
                        <div class="form-group">
                            {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label required']) !!}
                            <div class="col-md-6">
                                {!! Form::input('text', 'name', null, ['class' => 'form-control input-sm', 'required']) !!}
                            </div>
                        </div>

                        <!-- Email Address Form Input -->
                        <div class="form-group">
                            {!! Form::label('email', 'Email Address', ['class' => 'col-md-4 control-label required']) !!}
                            <div class="col-md-6">
                                {!! Form::input('email', 'email', null, ['class' => 'form-control input-sm', 'required']) !!}
                            </div>
                        </div>

                        <!-- Password Input Field -->
                        <div class="form-group">
                            {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label required']) !!}
                            <div class="col-md-6">
                                {!! Form::input('password', 'password', null, ['class' => 'form-control input-sm', 'required']) !!}
                            </div>
                        </div>

                        <!-- Confirm Password Input Field -->
                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'col-md-4 control-label required']) !!}
                            <div class="col-md-6">
                                {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control input-sm', 'required']) !!}
                            </div>
                        </div>
                    
                        <!-- License Number Input Field -->
                        <div class="form-group">
                            {!! Form::label('license_no', 'License Number', ['class' => 'col-md-4 control-label required']) !!}
                            <div class="col-md-6">
                                {!! Form::input('text', 'license_no', null, ['class' => 'form-control input-sm',
                                    'required', 'maxlength' => '7', 'pattern' => '^[A-Za-z0-9]{6,7}$',
                                    'title' => 'Between 6 and 7 characters; letters and numbers only!'])
                                !!}
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
                            <div class="col-md-4 col-md-offset-8 pull-right">
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

@section('inline_scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            // Add pattern matching (regex) validation method to the
            // jQuery Validation plugin
            $.validator.addMethod('pattern', function(value, element, pattern) {
                var re = new RegExp(pattern);
                return re.test(value);
            });

            // Configure validation
            $('#reg_form').validate({

                // Define validation rules
                rules: {
                    name: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        minlength: 6
                    },
                    password_confirmation: {
                        equalTo: $('input[name=password]')
                    },
                    license_no: {
                        required: true,
                        pattern: "^[A-Za-z0-9]{6,7}$"
                    }
                },
                messages: {
                    name: 'Your name is required.',
                    password: {
                        required: "Please enter a password.",
                        minlength: $.validator.format("Password must be at least {0} characters long!")
                    },
                    password_confirmation: {
                        equalTo: 'Passwords do not match!'
                    },
                    license_no: {
                        pattern: "A valid license number is required."
                                + "<br>(Between 6 and 7 characters; letters and numbers only!)",
                        required: "Your license number is required"
                    }
                }

            });
        });
    </script>


@endsection