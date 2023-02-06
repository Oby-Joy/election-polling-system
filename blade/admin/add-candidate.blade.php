@extends('layouts.master')

@section('title', 'Add Candidate')

@section('content')
	<div class="container-fluid mt-2">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Candidate</h6> 
            </div>
            <div class="card-body">
                @if(session('success')) 
                    <div class="alert alert-success"> 
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('saveCandidate') }}" method="POST" class="my-2">
                    @csrf
                    <input type="hidden" value="{{$post->id}}" name="post_id">

                    <div class="form-group col-md-6 mb-3">
                        <label for="first_name">First Name<span style="color:red;">*</span></label>
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" autocomplete="first_name" autofocus>

                         @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="last_name">Last Name<span style="color:red;">*</span></label>
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" autocomplete="last_name" autofocus>

                         @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="faculty">Faculty<span style="color:red;">*</span></label>
                        <input id="faculty" type="text" class="form-control @error('faculty') is-invalid @enderror" name="faculty" value="{{ old('faculty') }}" placeholder="Faculty" autocomplete="faculty" autofocus>

                         @error('faculty')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="manifesto">Manifesto<span style="color:red;">*</span></label>
                        <textarea id="manifesto" name="manifesto" class="form-control @error('manifesto') is-invalid @enderror" value="{{ old('manifesto') }}" autocomplete="manifesto" autofocus cols = 5></textarea>

                         @error('manifesto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button class="btn btn-primary" type="submit" style="margin:auto;" id="add">Add Candidate</button>

                    
                </form>
                
            </div>
        </div>
    <div>
@endsection