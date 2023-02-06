@extends('layouts.master')

@section('title', 'Candidates List')

@section('content')
	<div class="container-fluid mt-2">
		<h2>{{$post->post}} Candidates List</h2>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Faculty</th>
                            <th scope="col">Manifesto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($post->candidates) <= 0)
                            <tr>
                                <td colspan="4">No candidates yet</td>
                            </tr>
                        @else
                            @php $count = 1;  @endphp
                            @foreach($post->candidates as $candidate)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$candidate->first_name}} {{$candidate->last_name}}</td>
                                    <td>{{$candidate->faculty}}</td>
                                    <td>{{$candidate->manifesto}}</td>

                                
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection