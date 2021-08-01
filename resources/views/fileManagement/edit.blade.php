@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> LineUp / Edit #{{$line_up->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('line_ups.update' ,['id' => $line_up->id])}}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
	<label for="day-field">Day</label>
    <input class="form-control" type="text" name="day" id="day-field" value="{{ old('day', $line_up->day ) }}" />
</div> <div class="form-group">
	<label for="artists-field">Artists</label>
	<input class="form-control" type="text" name="artists" id="artists-field" value="{{ old('artists', $line_up->artists ) }}" />
</div>

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('line_ups.listLineUps') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection