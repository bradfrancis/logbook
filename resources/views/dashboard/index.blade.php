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
                <div class="panel-heading">Most Recent Drives</div>
                <div class="panel-body">
                    @if($learner->drives->count() > 0)
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>Added</th>
                                <th>Title</th>
                                <th>Duration</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($learner->most_recent as $drive)
                            <tr>
                                <td>{{ $drive->created_at->diffForHumans(Carbon::now(), true) }} ago</td>
                                <td><a href="{{ url('drives', ['id' => $drive->id])}}">{{ $drive->title }}</a></td>
                                <td>{{ $drive->duration->format('%Hh %Im')}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>No drives logged yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Recent Tasks</div>
                <div class="panel-body">
                    @if ($learner->tasks)
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
                    @else
                    <p>No recent tasks.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection