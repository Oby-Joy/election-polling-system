@extends('layouts.master')

@section('title', 'Voters List')

@section('content')
	<div class="container-fluid mt-2">
		<h2>Voters List</h2>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Matriculation Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($voters) <= 0)
                            <tr>
                                <td colspan="3">No available voter</td>
                            </tr>
                        @else
                            @php $count = 1; @endphp
                            @foreach($voters as $voter)
                                <tr>
                                    <td>{{ $count++}}
                                    <td>{{$voter->first_name}} {{$voter->last_name}}</td> 
                                    <td>{{ $voter->matric_number }}</td>                          
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection