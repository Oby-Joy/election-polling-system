@extends('layouts.child')

@section('title', 'Cast Vote')

@section('content')
    <div class="container">
        <div class="col-xl-12 col-md-12 mb-4 mt-5">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    @if(session('success')) 
                        <div class="alert alert-success"> 
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error')) 
                        <div class="alert alert-danger"> 
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold mb-1 text-left text-primary">
                                <form action="{{ route('storeVote') }}" method="POST" class="my-2">
                                    @csrf
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="candidate">Candidate<span style="color:red;">*</span></label>
                                        <select name="candidate" id="" class="form-control @error('candidate') is-invalid @enderror">
                                            <option value="">Select Candidate</option>
                                            @foreach($post->candidates as $candidate)
                                                <option value="{{ $candidate->first_name }} {{ $candidate->last_name }}">{{ $candidate->first_name }} {{ $candidate->last_name }}</option>
                                            @endforeach
                                        </select>

                                        @error('candidate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <input type="hidden" value="{{ $post->post }}" name="post">
                                    <input type="hidden" value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" name="voter">

                                    <button class="btn btn-primary" type="submit" id="change" >Submit</button>     
                                </form>
                            </div>
                            <div class="h5 mb-0 text-gray-800 mt-3">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection