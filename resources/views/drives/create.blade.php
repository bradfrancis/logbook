@extends('app')

@section('content')
    <div class="col-md-10">
        <div class="col-md-7 col-md-offset-4">
            <div class="row">
                <div class="page-header">
                    <h1>Log Drive</h1>
                </div>

                <p>Here you can log a drive.</p>
            </div>

            <div class="row">
                {!! Form::open(['route' => 'drives.store', 'role' => 'form']) !!}
                @include('drives.partials._form')
                {!! Form::close() !!}

                @include('errors.list')
            </div>
        </div>
    </div>

    @include('drives.partials.modals.add_vehicle')
    @include('drives.partials.modals.add_supervisor')
@endsection