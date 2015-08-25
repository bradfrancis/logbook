{!! Form::open(['route' => 'supervisors.store', 'role' => 'form', 'class' => 'form-horizontal', 'id' => "add-supervisor-form"]) !!}
    <!-- Name Input Field -->
    <div class="form-group">
        {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label required']) !!}
        <div class="col-md-6">
            {!! Form::input('text', 'name', null, ['class' => 'form-control input-sm', 'required']) !!}
        </div>
    </div>

    <!-- License Number Input Field -->
    <div class="form-group">
        {!! Form::label('license_no', 'License Number', ['class' => 'col-md-4 control-label required']) !!}
        <div class="col-md-6">
            {!! Form::input('text', 'license_no', null, ['class' => 'form-control input-sm', 'required']) !!}
        </div>
    </div>
{!! Form::close() !!}