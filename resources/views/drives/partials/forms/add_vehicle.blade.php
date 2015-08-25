{!! Form::open(['route' => 'vehicles.store', 'role' => 'form', 'class' => 'form-horizontal', 'id' => "add-vehicle-form"]) !!}
    <!-- Make Input Field -->
    <div class="form-group">
        {!! Form::label('make', 'Make', ['class' => 'col-md-4 control-label required']) !!}
        <div class="col-md-6">
            {!! Form::input('text', 'make', null, ['class' => 'form-control input-sm', 'required']) !!}
        </div>
    </div>

    <!-- Model Input Field -->
    <div class="form-group">
        {!! Form::label('model', 'Model', ['class' => 'col-md-4 control-label required']) !!}
        <div class="col-md-6">
            {!! Form::input('text', 'model', null, ['class' => 'form-control input-sm', 'required']) !!}
        </div>
    </div>

    <!-- Year Input Field -->
    <div class="form-group">
        {!! Form::label('year', 'Year', ['class' => 'col-md-4 control-label required']) !!}
        <div class="col-md-6">
            {!! Form::input('text', 'year', null, ['class' => 'form-control input-sm', 'required']) !!}
        </div>
    </div>

    <!-- Registration Number Input Field -->
    <div class="form-group">
        {!! Form::label('registration_no', 'Registration Number', ['class' => 'col-md-4 control-label required']) !!}
        <div class="col-md-6">
            {!! Form::input('text', 'registration_no', null, ['class' => 'form-control input-sm', 'required']) !!}
        </div>
    </div>
{!! Form::close() !!}