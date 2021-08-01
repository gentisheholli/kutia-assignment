@extends('layout')
@section('header')
    <div class="page-header">
        <h1>LineUp / Show #{{$line_up->id}}</h1>
    </div>
@endsection

@section('content')
    <div class="well well-sm">
        <div class="row">
            <div class="col-md-6">
                <a class="btn btn-link" href="{{ route('line_ups.listLineUps') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
            </div>
            <div class="col-md-6">
                 <a class="btn btn-sm btn-warning pull-right" href="{{ route('line_ups.edit', $line_up->id) }}">
                    <i class="glyphicon glyphicon-edit"></i> Edit
                </a>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">

            <label>Day</label>
<p>
	{{ $line_up->day }}
</p> <label>Artists</label>
<p>
	{{ $line_up->artists }}
</p>

        </div>

    </div>
@endsection
