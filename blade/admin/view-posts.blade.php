@extends('layouts.master')

@section('title', 'View Posts')

@section('content')
	<div class="container-fluid mt-2">
		<h2>Posts</h2>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Post</th>
                            <th scope="col">Add</th>
                            <th scope="col">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 1;  @endphp
                        @if(count($posts) <= 0)
                            <tr>
                                <td>No available posts</td>
                            </tr>
                        @else
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$post->post}}</td>
                                    <td><a href="/admin/add-candidate/{{$post->id}}">Add Candidate</a></td>
                                    <td><a href="/admin/candidates/{{$post->id}}">View Candidate(s)</a></td> 
                                   
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection