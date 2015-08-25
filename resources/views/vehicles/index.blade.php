@extends('app')

@section('content')
    <div class="col-md-10">
        <div class="col-md-7 col-md-offset-4">
            <div class="row">
                <div class="page-header">
                    <h1>Manage Vehicles</h1>
                </div>

                <p>Edit and delete your vehicles here.</p>
            </div>
            <div class="panel-group">
                @foreach($vehicles as $vehicle)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="panel-title">{{ $vehicle->make . " " . $vehicle->model }}</h4>
                                </div>
                                <div class="col-md-4">
                                    <a class="btn btn-sm btn-danger pull-right" data-function="delete" tile="Delete">
                                        <i class="ionicons ion-android-delete"></i>
                                    </a>
                                    <a class="btn btn-sm btn-warning pull-right" data-function="edit" title="Edit">
                                        <i class="ionicons ion-edit"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            {!! Form::model($vehicle, ['role' => 'form', 'route' => ['vehicles.update', $vehicle],
                                'class' => 'form-horizontal', 'method' => 'PATCH'])
                            !!}
                                    <!-- Make Input Field -->
                            <div class="form-group">
                                {!! Form::label('make', 'Make:', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::input('text', 'make', null, ['class' => 'form-control input-sm', 'disabled']) !!}
                                </div>
                            </div>

                            <!-- Model Input Field -->
                            <div class="form-group">
                                {!! Form::label('model', 'Model:', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::input('text', 'model', null, ['class' => 'form-control input-sm', 'disabled']) !!}
                                </div>
                            </div>

                            <!-- Year Input Field -->
                            <div class="form-group">
                                {!! Form::label('year', 'Year:', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::input('text', 'year', null, ['class' => 'form-control input-sm', 'disabled']) !!}
                                </div>
                            </div>

                            <!-- Registration Number Input Field -->
                            <div class="form-group">
                                {!! Form::label('registration_no', 'Registration Number:', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::input('text', 'registration_no', null, ['class' => 'form-control input-sm', 'disabled']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}

                            <div class="alert alert-danger error-container">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <div>
                                    <ul class="errors-list"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('inline_scripts')
    <style>
        .error-container {
            display: none;
        }
    </style>
    <script type="text/javascript">

        $(document).ready(function() {

            // Bind edit functionality to each 'button'
            $('a[data-function=edit]').each(function() {
               // Find the panel the button belongs to
               var panel = $(this).parents('.panel');

               // Disable all text inputs
               $(panel).find('input[type=text]').attr('disabled', 'disabled');

               // Add 'Save Changes' button
               var formGroup = document.createElement('div');
               $(formGroup).addClass('form-group');

               var col = document.createElement('div');
               $(col).addClass('col-md-10');

               var input = document.createElement('input');
               $(input).attr({
                   type: 'submit',
                   value: 'Save Changes',
                   'class': 'btn btn-sm btn-success pull-right'
               });

               col.appendChild(input);
               formGroup.appendChild(col);

               // Initially we want the button hidden
               $(formGroup).hide();

               // Insert the now hidden button
               $(panel).find('.form-group:last').after(formGroup);

               // Handle the 'edit button' click event
               $(this).click({fg: formGroup, panel: panel}, function(e) {
                    var errors = $(e.data.panel).find('.error-container:first');

                   // Hide any flash messages
                   $('#flash-message').hide('slow', function() {
                       $(this).remove();
                   });

                   // Hide the errors container
                   $(errors).hide('fast');
                   // Remove any previous error messages
                   $(errors).find('li').remove();

                   // Toggle input fields
                   $(e.data.panel).find('input').each(function() {
                       if ($(this).attr('type') != 'submit' && $(this).attr('type') != 'hidden') {
                           if (this.hasAttribute('disabled')) {
                               $(this).removeAttr('disabled');
                           }
                           else {
                               $(this).attr('disabled', 'disabled');
                           }
                       }
                   });

                   // Toggle the save changes button
                   $(e.data.fg).toggle('slow');

               });

               // Handle the 'save changes button' click event
               var options = {
                   form: $(panel).find('form:first'),
                   panel: panel,
                   'errorContainer': $(panel).find('.error-container:first')
               };

               $(input).click(options, function(e) {
                   e.preventDefault();
                   var form = e.data.form;
                   var errors = e.data.errorContainer;

                   // Hide the errors container
                   $(errors).hide('fast');
                   // Remove any previous error messages
                   $(errors).find('li').remove();

                   // Hide any flash messages
                   $('#flash-message').hide('slow', function() {
                      $(this).remove();
                   });

                   $.ajax({
                       url: $(form).attr('action'),
                       data: $(form).serialize(),
                       method: 'post',
                       context: e.data.panel,
                       error: function(jqXHR) {
                           var response = $.parseJSON(jqXHR.responseText);
                           var errorList = $(this).find('.error-container:first').find('ul.errors-list');
                           for (key in response)
                           {
                               // Get the validation error message
                               var message = response[key];

                               // Get the formatted field name
                               var fieldName = $(this).find('label[for="' + key + '"]').text().replace(':', '');

                               // Add the error to the list
                               errorList.append('<li><strong>' + fieldName + ":</strong>&nbsp;" + message);
                           }

                           $(errors).show('slow');
                       },
                       success: function() {
                           // Flash success message to screen
                           var message = buildFlashMessage('<p>Changes saved!</p>', 'success');

                           // Set classes for flash message
                           // N.B. This is a temporary hack that won't be necessary in the future
                           $(message).removeClass(' col-md-6 col-md-offset-3 in').addClass('col-md-12');
                           $(this).find('form').before(message);
                           $(message).show('slow', function() {
                              $(this).addClass('in');
                           });
                       }
                   });
               });
           });

            $('a[data-function=delete]').each(function() {
                var panel = $(this).parents('.panel');

                $(this).click({panel: panel}, function(e) {
                    e.preventDefault();

                    var callback = $.proxy(function(result) {
                        var form = $(this).find('form:first');

                        if (result) {
                            $.ajax({
                                url: $(form).attr('action'),
                                method: 'post',
                                data: {_method: 'DELETE', _token: $(form).find('input[name=_token]').val()},
                                context: this,
                                success: function() {
                                    $(this).animate({
                                        height: 0,
                                        opacity: 0
                                    }, 600, function() {
                                        $(this).remove();
                                    });
                                }
                            })
                        }
                    }, $(e.data.panel));

                    bootbox.confirm({
                        message: 'Are you sure you want to delete this vehicle?'
                                + ' This action is permanent and cannot be undone.',
                        title: 'Delete Vehicle',
                        callback: callback
                    });
                });
            });
        });
    </script>
@endsection