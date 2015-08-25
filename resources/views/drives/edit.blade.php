@extends('app')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div class="row">
            <div class="page-header">
                <h1>Update Drive</h1>
            </div>

            <p>Here you can update the details of a drive.</p>
        </div>

        <div class="row">
            {!! Form::model($drive, ['route' => ['drives.update', $drive], 'role' => 'form', 'method' => 'PATCH']) !!}
            @include('drives.partials._form')
            {!! Form::close() !!}

            @include('errors.list')
        </div>
    </div>

    @include('drives.partials.modals.add_vehicle')
    @include('drives.partials.modals.add_supervisor')
@endsection