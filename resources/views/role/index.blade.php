@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> LineUp
            <a class="btn btn-success pull-right" href="{{ route('line_ups.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($line_ups->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Day</th> <th>Artists</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($line_ups as $line_up)
                            <tr>
                                <td class="text-center"><strong>{{$line_up->id}}</strong></td>

                                <td>{{$line_up->day}}</td> <td>{{$line_up->artists}}</td>
                                
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('line_ups.show' ,['id' => $line_up->id])}}">
                                        <i class="glyphicon glyphicon-eye-open"></i> View
                                    </a>
                                    
                                    <a class="btn btn-xs btn-warning" href="{{ route('line_ups.edit' ,['id' => $line_up->id])}}">
                                        <i class="glyphicon glyphicon-edit"></i> Edit
                                    </a>

                                    <form action="{{ route('line_ups.destroy', ['id' => $line_up->id]) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection