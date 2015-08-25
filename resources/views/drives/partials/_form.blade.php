<div class="panel-group" id="log-drive-panel-group" aria-multiselectable="true">

    <!-- Date/Time Panel -->
    <div class="panel panel-default" data-panel-number="1">
        <div class="panel-heading" role="tab">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="panel-title">1. Date/Time</h4>
                </div>
                <div class="col-md-1 col-md-offset-5">
                    <button class="btn btn-default btn-xs panel-toggle-btn no-js-hide" role="button" data-toggle="collapse"
                            data-parent="#log-drive-panel-group" href="#datetime" aria-expanded="true" aria-controls="datetime">
                        <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>

        <div class="panel-collapse collapse in" role="tabpanel" id="datetime">
            <div class="panel-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        <h4>Start</h4>
                    </div>
                    <div class="col-md-6">
                        <h4>End</h4>
                    </div>

                    <!-- Start Date Input Field -->
                    <div class="col-md-3">
                        {!! Form::label('formatted_start_date', 'Date', ['class' => 'control-label required']) !!}
                        <div class="input-group">
                            {!! Form::input('date', 'formatted_start_date', null,
                            ['class' => 'form-control input-sm', 'required'])
                            !!}
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>

                    <!-- Start Time Input Field -->
                    <div class="col-md-3">
                        {!! Form::label('start_time', 'Time', ['class' => 'control-label required']) !!}
                        <div class="input-group">
                            {!! Form::input('time', 'start_time', null,
                            ['class' => 'form-control input-sm', 'required']) !!}
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                        </div>
                    </div>

                    <!-- End Date Input Field -->
                    <div class="col-md-3">
                        {!! Form::label('formatted_end_date', 'Date', ['class' => 'control-label required']) !!}
                        <div class="input-group">
                            {!! Form::input('date', 'formatted_end_date', null, ['class' => 'form-control input-sm', 'required']) !!}
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>

                    <!-- End Time Input Field -->
                    <div class="col-md-3">
                        {!! Form::label('end_time', 'Time', ['class' => 'control-label required']) !!}
                        <div class="input-group">
                            {!! Form::input('time', 'end_time', null,
                            ['class' => 'form-control input-sm', 'required']) !!}
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                        </div>
                    </div>
                </div>

                <button class="btn btn-success btn-sm col-md-offset-10 continue-btn no-js-hide">Continue
                    <span class="glyphicon glyphicon-arrow-right"></span>
                </button>


            </div>
        </div>
    </div>

    <!-- Basic Info Panel -->
    <div class="panel panel-default" data-panel-number="2">
        <div class="panel-heading" role="tab">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="panel-title">2. Basic Info</h4>
                </div>
                <div class="col-md-1 col-md-offset-5">
                    <button class="btn btn-default btn-xs panel-toggle-btn no-js-hide" role="button" data-toggle="collapse"
                            data-parent="#log-drive-panel-group" href="#basicinfo" aria-expanded="true" aria-controls="basicinfo">
                        <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>

        <div class="panel-collapse collapse in" role="tabpanel" id="basicinfo">
            <div class="panel-body">
                <div class="form-group row">
                    <!-- Title Form Input -->
                    <div class="col-md-12">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    <!-- Origin Input Field -->
                    <div class="col-md-4">
                        {!! Form::label('origin', 'Origin', ['class' => 'control-label']) !!}
                        {!! Form::input('text', 'origin', null, ['class' => 'form-control input-sm']) !!}
                    </div>

                    <!-- Destination Input Field -->
                    <div class="col-md-4">
                        {!! Form::label('destination', 'Destination', ['class' => 'control-label']) !!}
                        {!! Form::input('text', 'destination', null, ['class' => 'form-control input-sm']) !!}
                    </div>

                    <!-- Distance Input Field -->
                    <div class="col-md-4">
                        {!! Form::label('distance_km', 'Distance', ['class' => 'control-label']) !!}
                        <div class="input-group">
                            {!! Form::input('decimal', 'distance_km', null, ['class' => 'form-control input-sm']) !!}
                            <span class="input-group-addon">km</span>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <!-- Notes Form Input -->
                    <div class="col-md-12">
                        {!! Form::label('notes', 'Notes') !!}
                        {!! Form::textarea('notes', null, ['class' => 'form-control', 'rows' => '5']) !!}
                    </div>
                </div>

                <button class="btn btn-success btn-sm col-md-offset-10 continue-btn no-js-hide">Continue
                    <span class="glyphicon glyphicon-arrow-right"></span>
                </button>
            </div>
        </div>

    </div>

    <!-- Vehicle Panel -->
    <div class="panel panel-default" data-panel-number="3">
        <div class="panel-heading" role="tab">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="panel-title">3. Vehicle</h4>
                </div>
                <div class="col-md-1 col-md-offset-5">
                    <button class="btn btn-default btn-xs panel-toggle-btn no-js-hide" role="button" data-toggle="collapse"
                            data-parent="#log-drive-panel-group" href="#vehicle" aria-expanded="true" aria-controls="vehicle">
                        <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>

        <div class="panel-collapse collapse in" role="tabpanel" id="vehicle">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8">
                        {!! Form::label('vehicle_id', 'Select Vehicle', ['class' => 'control-label']) !!}
                        {!! Form::select('vehicle_id', $form_data['vehicles'], null, ['class' => 'form-control input-sm', 'id' => 'vehicle_list', 'required']) !!}
                    </div>
                    <div class="col-md-1 add-resource-btn">
                        <a title="Add Vehicle" id="add-vehicle-btn" class="btn btn-success btn-sm no-js-hide" data-toggle="modal" data-target="#add-vehicle-modal">
                            <span class="glyphicon glyphicon-plus" aria-label="Add Vehicle"></span>
                        </a>
                    </div>
                </div>

                <button class="btn btn-success btn-sm col-md-offset-10 continue-btn no-js-hide">Continue
                    <span class="glyphicon glyphicon-arrow-right"></span>
                </button>
            </div>
        </div>

    </div>

    <!-- Supervisor Panel -->
    <div class="panel panel-default" data-panel-number="4">
        <div class="panel-heading" role="tab">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="panel-title">4. Supervisor</h4>
                </div>
                <div class="col-md-1 col-md-offset-5">
                    <button class="btn btn-default btn-xs panel-toggle-btn no-js-hide" role="button" data-toggle="collapse"
                            data-parent="#log-drive-panel-group" href="#supervisor" aria-expanded="true" aria-controls="supervisor">
                        <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>

        <div class="panel-collapse collapse in" role="tabpanel" id="supervisor">
            <div class="panel-body">
                <div class="row form-group">
                    <div class="col-md-8">
                        {!! Form::label('supervisor_id', 'Select Supervisor', ['class' => 'control-label']) !!}
                        {!! Form::select('supervisor_id', $form_data['supervisors'], null, ['class' => 'form-control input-sm', 'id' => 'supervisor_list']) !!}
                    </div>
                    <div class="col-md-1 add-resource-btn">
                        <a title="Add Supervisor" id="add-supervisor-btn" class="btn btn-success btn-sm no-js-hide" data-toggle="modal" data-target="#add-supervisor-modal">
                            <span class="glyphicon glyphicon-plus" aria-label="Add Supervisor"></span>
                        </a>
                    </div>
                </div>

                <button class="btn btn-success btn-sm col-md-offset-10 continue-btn no-js-hide">Continue
                    <span class="glyphicon glyphicon-arrow-right"></span>
                </button>
            </div>
        </div>

    </div>

    <!-- Tasks and Conditions Panel -->
    <div class="panel panel-default" data-panel-number="5">
        <div class="panel-heading" role="tab">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="panel-title">5. Tasks and Conditions</h4>
                </div>
                <div class="col-md-1 col-md-offset-5">
                    <button class="btn btn-default btn-xs panel-toggle-btn no-js-hide" role="button" data-toggle="collapse"
                            data-parent="#log-drive-panel-group" href="#tasks" aria-expanded="true" aria-controls="tasks">
                        <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>

        <div class="panel-collapse collapse in" role="tabpanel" id="tasks">
            <div class="panel-body">
                <div class="form-group row">
                    <div class="col-md-10 col-md-offset-1">
                        {!! Form::label('tasks_list', 'Select Tasks', ['class' => 'control-label']) !!}
                        {!! Form::select('tasks_list[]', $form_data['tasks'], null, ['class' => 'form-control',
                            'id' => 'tasks_list', 'multiple'])
                        !!}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-10 col-md-offset-1">
                        {!! Form::label('road_types_list', 'Select Road Types', ['class' => 'control-label']) !!}
                        {!! Form::select('road_types_list[]', $form_data['road_types'], null, [
                            'class' => 'form-control',
                            'id' => 'road_types_list',
                            'multiple' ])
                        !!}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-10 col-md-offset-1">
                        {!! Form::label('road_conditions_list', 'Select Road Conditions', ['class' => 'control-label']) !!}
                        {!! Form::select('road_conditions_list[]', $form_data['road_conditions'], null, [
                            'class' => 'form-control',
                            'id' => 'road_conditions_list',
                            'multiple' ])
                        !!}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-10 col-md-offset-1">
                        {!! Form::label('traffic_conditions_list', 'Select Traffic Conditions', ['class' => 'control-label']) !!}
                        {!! Form::select('traffic_conditions_list[]', $form_data['traffic_conditions'], null, [
                            'class' => 'form-control',
                            'id' => 'traffic_conditions_list',
                            'multiple' ])
                        !!}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-10 col-md-offset-1">
                        {!! Form::label('visibilities_list', 'Select Visibility', ['class' => 'control-label']) !!}
                        {!! Form::select('visibilities_list[]', $form_data['visibilities'], null, [
                            'class' => 'form-control',
                            'id' => 'visibilities_list',
                            'multiple' ])
                        !!}
                    </div>
                </div>

                <!-- Submit Form Input -->
                <div class="form-group">
                    <div class="button-group pull-right">
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                        {!! Form::reset('Reset', ['class' => 'btn btn-danger', 'id' => 'reset-btn']) !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@section('inline_scripts')
    <script type="text/javascript">

        $('#tasks_list').select2({
            placeholder: 'Select Tasks'
        });

        $('#road_types_list').select2({
            placeholder: 'Select Road Types'
        });

        $('#road_conditions_list').select2({
            placeholder: 'Select Road Conditions'
        });

        $('#traffic_conditions_list').select2({
            placeholder: 'Select Traffic Conditions'
        });

        $('#visibilities_list').select2({
            placeholder: 'Select Visibilities'
        });

        $(document).ready(function() {
            var panel_group = $('#log-drive-panel-group');

            // Ensure other panels close when one is shown
            $(panel_group).on('show.bs.collapse', function () {
                $('#log-drive-panel-group').find('.in').collapse('hide');
            });

            // Change the panel toggle button icon on open/close
            $('div.panel').each(function() {
                var button = $(this).find('button[data-toggle]');

                // Change to a '-' icon when a panel is open
                $(this).on("show.bs.collapse", function() {
                    var span = $(button).children('span:first');
                    $(span).removeClass('glyphicon-plus').addClass('glyphicon-minus');
                });

                // Change to a '+' icon when a panel is closed
                $(this).on("hide.bs.collapse", function() {
                    var span = $(button).children('span:first');
                    $(span).removeClass('glyphicon-minus').addClass('glyphicon-plus');
                });
            });

            // Close all but the first panel on load
            $(panel_group).find('.in').collapse('show').each(function () {
                var panelNumber = $(this).parent().attr('data-panel-number');

                if (panelNumber != '1') {
                    $(this).collapse('hide');
                }
            });

            // Close the currently open panel and open the next panel
            $('button.continue-btn').each(function() {
                var panelNumber = parseInt($(this).parents('div.panel').attr('data-panel-number'));

                $(this).on("click", function(e) {
                    e.preventDefault();

                    $(this).parents('div[role=tabpanel]').collapse('hide');
                    $('div[data-panel-number="' + (panelNumber + 1) + '"]')
                            .children('div[role=tabpanel]')
                            .collapse('show');
                });
            });

            // Prevent default behaviour so modal can open
            $('#add-vehicle-button').on("click", function(e) {
                e.preventDefault();
            });

            // Prevent default behaviour so modal can open
            $('#add-supervisor-button').on("click", function(e) {
                e.preventDefault();
            });

            // Set 'date' fields to use Date Picker plugin
            $('input[type=date]').datepicker();

            // Set 'time' fields to use Time Picker plugin
            $('input[type=time]').timepicker({
                template: false,
                minuteStep: 1
            });
        });

    </script>
@endsection