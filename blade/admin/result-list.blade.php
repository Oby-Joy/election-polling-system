@extends('layouts.master')

@section('title', 'Results')

@section('content')
	<div class="container-fluid mt-3">
		<h2>{{$post->post}} Results</h2>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">No. of votes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 1; @endphp
                        @foreach($votesDecode as $vote)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $vote['candidate'] }}</td>
                                <td>{{ $vote['total'] }}</td>
                            </tr>
                        @endforeach  
                    </tbody>
                </table><br><br><br>
            </div>
        </div>
    </div>
@endsection