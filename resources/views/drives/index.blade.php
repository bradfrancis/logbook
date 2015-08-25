@extends('app')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <table class="table table-striped table-hover table-condensed">
            <thead>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Duration</th>
                <th>Title</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Distance</th>
                <th>Road Types</th>
                <th>Road Conditions</th>
                <th>Traffic Conditions</th>
                <th>Visibility</th>
            </tr>
            </thead>
            <tbody>
            @foreach($drives as $drive)
                <tr>
                    <td>
                        <a href="{{ route('drives.show', ['drive' => $drive]) }}">{{ $drive->start_date->toFormattedDateString() }}</a>
                    </td>
                    <td>{{ $drive->start_date->format('h:i A') }}</td>
                    <td>{{ $drive->duration->format('%Hh %Im') }}</td>
                    <td>{{ $drive->title }}</td>
                    <td>{{ $drive->origin }}</td>
                    <td>{{ $drive->destination }}</td>
                    <td>{{ $drive->distance_km }}</td>
                    <td>{{ $drive->road_types_concat }}</td>
                    <td>{{ $drive->road_conditions_concat }}</td>
                    <td>{{ $drive->traffic_conditions_concat }}</td>
                    <td>{{ $drive->visibilities_concat }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection