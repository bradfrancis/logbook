@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Progress</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4 text-right">Drives Logged:</div>
                        <div class="col-md-6">{{ count($learner->drives) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 text-right">Hours Logged:</div>
                        <div class="col-md-6">{{ $learner->hours_logged->format('%h hours, %I minutes') }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 text-right">Overall Progress:</div>
                        <div class="col-md-6"><progress max="50" value="3"></progress></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Recently Added Drives</div>
                <div class="panel-body">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>Added</th>
                                <th>Title</th>
                                <th>Duration</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($learner->most_recently_added_drives as $drive)
                            <tr>
                                <td>{{ $drive->end_date->diffForHumans(Carbon::now(), true) }} ago</td>
                                <td>{{ $drive->title }}</td>
                                <td>{{ $drive->duration->format('%h hours %I minutes') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Recent Tasks</div>
                <div class="panel-body">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                        <tr>
                            <th>Added</th>
                            <th>Task</th>
                            <th>Drive Title</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($learner->recent_tasks as $task)
                            <tr>
                                <td>{{ Carbon::parse($task->end_date)->diffForHumans(Carbon::now(), true) }} ago</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->title }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection