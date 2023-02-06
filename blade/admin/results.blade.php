@extends('layouts.master')

@section('title', 'Results')

@section('content')
	<div class="container-fluid mt-3">
		<h2>Election Results</h2>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Post</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 1; @endphp
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$post->post}}</td>
                                <td><a href="/admin/result-list/{{$post->id}}">View Results</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection