@extends('layouts.master')

@section('title', 'Add Post')

@section('content')
	<div class="container-fluid mt-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Post</h6>
            </div>
            <div class="card-body">
                @if(session('success')) 
                    <div class="alert alert-success"> 
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('savePost') }}" method="POST" class="my-2">
                    @csrf
                    <div class="form-group col-md-6 mb-3">
                        <label for="post">Post<span style="color:red;">*</span></label>
                        <input id="post" type="text" class="form-control @error('post') is-invalid @enderror" name="post" value="{{ old('post') }}" placeholder="Post" autocomplete="post" autofocus>

                         @error('post')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button class="btn btn-primary" type="submit" style="margin:auto;" id="add">Add Post</button>

                    
                </form>
                
            </div>
        </div>
    <div>
@endsection