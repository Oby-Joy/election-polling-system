@extends('layouts.child')

@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="col-xl-12 col-md-12 mb-4 mt-5">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold mb-1 text-center">
                                Welcome {{Auth::user()->first_name}}. Click on a post to place your votes.  
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                @foreach($posts as $post)
                                    <label name="course" for="{{ $post->post }}"><a href="/voter/vote/{{$post->id}}" style="text-decoration:none;">{{ $post->post }}</label></a><br><br><br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection