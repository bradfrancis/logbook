@extends('app')

@section('content')
    {!! Form::model($drive, ['url' => '#', 'role' => 'form', 'method' => 'PATCH']) !!}
    <div class="col-md-10">
        <div class="col-md-7 col-md-offset-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-11">
                                    <h4 class="panel-title">
                                        @if($drive->title)
                                            {{ $drive->title }}&nbsp;-&nbsp;{{ $drive->start_date->toDayDateTimeString() }}
                                        @else
                                            Drive&nbsp;-&nbsp;{{ $drive->start_date->toDayDateTimeString() }}
                                        @endif
                                    </h4>
                                </div>
                                <div class="col-md-1 pull-right">
                                    <div class="dropdown">
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="true" id="drive-options-menu">
                                            <span class="ionicons ion-navicon"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="#drive-options-menu">
                                            <li><a href="{{ route('drives.edit', ['drive' => $drive]) }}">Edit</a></li>
                                            <li>
                                                <a id="delete_btn" class="no-js-hide" href="{{ route('drives.destroy', ['drive' => $drive]) }}">Delete</a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>


                        </div>
                        <div class="panel-body">
                            <div class="row form-group">
                                <div class="col-md-6">
                                    {!! Form::label('origin', 'From', ['class' => 'control-label']) !!}
                                    <div class="input-group">
                                        {!! Form::text('origin', null, ['class' => 'form-control input-sm', 'disabled']) !!}
                                        <span class="input-group-addon"><i class="ionicon ion-earth"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('destination', 'To', ['class' => 'control-label']) !!}
                                    <div class="input-group">
                                        {!! Form::text('destination', null, ['class' => 'form-control input-sm', 'disabled']) !!}
                                        <span class="input-group-addon"><i class="ionicon ion-earth"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    {!! Form::label('duration', 'Duration', ['class' => 'control-label']) !!}
                                    <div class="input-group">
                                        {!! Form::text('duration', $drive->duration_in_minutes . " minutes", ['class' => 'form-control input-sm', 'disabled']) !!}
                                        <span class="input-group-addon"><i class="ionicons ion-clock"></i></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    {!! Form::label('distance', 'Distance', ['class' => 'control-label']) !!}
                                    <div class="input-group">
                                        {!! Form::text('distance', $drive->distance_km, ['class' => 'form-control input-sm', 'disabled']) !!}
                                        <span class="input-group-addon">km</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    {!! Form::label('notes', 'Notes', ['class' => 'control-label']) !!}
                                    {!! Form::textarea('notes', $drive->notes, ['class' => 'form-control', 'disabled', 'rows' => '6']) !!}
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">Tasks</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! Form::select('tasks_list[]', App\Task::lists('description', 'id')->all() , null,
                                        ['multiple', 'disabled', 'style' => 'width: 100%', 'id' => 'tasks-list'])
                                    !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <!-- Road Conditions Panel -->
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">Road Conditions</h4>
                        </div>
                        <div class="panel-body small-panel">
                            <ul id="road_conditions_list_group" class="list-group">
                                @foreach(App\RoadCondition::all() as $r_cond)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span>{{ $r_cond->description }}</span>
                                                @if(in_array($r_cond->id, $drive->road_conditions_list))
                                                    <i class="ionicons ion-android-checkbox-outline size-22 pull-right"></i>
                                                @else
                                                    <i class="ionicons ion-android-checkbox-outline-blank size-22 pull-right"></i>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Traffic Conditions Panel -->
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">Traffic Conditions</h4>
                        </div>
                        <div class="panel-body small-panel">
                            <ul id="traffic_conditions_list_group" class="list-group">
                                @foreach(App\TrafficCondition::all() as $t_cond)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span>{{ $t_cond->description }}</span>
                                                @if(in_array($t_cond->id, $drive->getRelation('traffic_conditions')->lists('id')->toArray()))
                                                    <i class="ionicons ion-android-checkbox-outline size-22 pull-right"></i>
                                                @else
                                                    <i class="ionicons ion-android-checkbox-outline-blank size-22 pull-right"></i>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Visibility Panel -->
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Visibility</div>

                        <div class="panel-body small-panel">
                            <ul id="visibilities_list_group" class="list-group">
                                @foreach(App\Visibility::all() as $v)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span>{{ $v->description }}</span>
                                                @if(in_array($v->id, $drive->getRelation('visibilities')->lists('id')->toArray()))
                                                    <i class="ionicons ion-android-checkbox-outline size-22 pull-right"></i>
                                                @else
                                                    <i class="ionicons ion-android-checkbox-outline-blank size-22 pull-right"></i>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Road Types Conditions Panel -->
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">Road Types</h4>
                        </div>
                        <div class="panel-body small-panel">
                            <ul id="road_types_list_group" class="list-group">
                                @foreach(App\RoadType::all() as $rt)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span>{{ $rt->description }}</span>
                                                @if(in_array($rt->id, $drive->getRelation('road_types')->lists('id')->toArray()))
                                                    <i class="ionicons ion-android-checkbox-outline size-22 pull-right"></i>
                                                @else
                                                    <i class="ionicons ion-android-checkbox-outline-blank size-22 pull-right"></i>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@endsection
@section('inline_scripts')
    <script type="text/javascript">

            $(document).ready(function() {
            $('#tasks-list').select2();

            var form = $('form:first');
            $('#delete_btn').click({form: form}, function(e) {
                e.preventDefault();

                bootbox.confirm({
                    message: 'Are you sure you want to delete the current drive?'
                    + ' This action is permanent and cannot be undone.',
                    title: 'Delete Drive',
                    callback: function(result) {

                        if (result === true)
                        {
                            // Get the form element - there should only be one
                            var form = $('form:first');

                            // Set the action the current URL
                            $(form).attr('action', window.location.href);

                            // Set hidden _method input value to DELETE
                            $(form).find('input[name=_method]').attr('value', 'DELETE');

                            // Submit the request
                            $(form).submit();
                        }
                    }
                });
            });
        });


    </script>
@endsection