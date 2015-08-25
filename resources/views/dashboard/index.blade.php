@extends('app')

@section('content')
    <div class="col-md-7 col-md-offset-3">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><p class="panel-title">Overview</p></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-5 text-right">License Level:</div>
                            <div class="col-md-7">{{ $learner->license_level }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 text-right">Minimum Required Hours:</div>
                            <div class="col-md-7">{{ $learner->minimum_hours }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 text-right">Drives Logged:</div>
                            <div class="col-md-7">{{ count($learner->drives) }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 text-right">Hours Logged:</div>
                            <div class="col-md-7">{{ $learner->hours_logged->format('%h hours, %I minutes') }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 text-right">Progress:</div>
                            <div class="col-md-7">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ $learner->percent_complete }}" aria-valuemin="0"
                                         aria-valuemax="100" style="width: {{ $learner->percent_complete }}%">
                                        <span>{{ $learner->percent_complete }}%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><p class="panel-title">Most Recent Drives</p></div>
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
                        <a href="{{ route('drives.create') }}" class="btn btn-primary btn-sm col-md-offset-10">Log Drive</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><p class="panel-title">Recent Tasks</p></div>
                    <div class="panel-body">
                        @if ($tasks)
                            <table class="table table-striped table-hover table-condensed">
                                <thead>
                                <tr>
                                    <th>Added</th>
                                    <th>Date/Time</th>
                                    <th>Task</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <td>{{ Carbon::parse($task['pivot']['created_at'])->diffForHumans(Carbon::now(), true) }} ago</td>
                                        <td>{{ Carbon::parse($task['pivot']['created_at'])->toDayDateTimeString() }}</td>
                                        <td><a href="{{ route('drives.show', ['id' => $task['pivot']['drive_id']]) }}">{{ $task['description'] }}</a></td>
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
    </div>

@endsection