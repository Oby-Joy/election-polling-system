<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        
        return view('voters.home', compact('posts'));
    }

    public function vote($id){
        $post = Post::findOrFail($id);

        return view('voters.vote', compact('post'));
    }

    public function storeVote(Request $request){
        request()->validate([
            'candidate' => 'required',
            'post' => 'required',
            'voter' => 'required',
        ]);

        $result = new Result();

        $result->candidate = $request->candidate;
        $result->post = $request->post;
        $result->voter = $request->voter;

        if(DB::table('results')
            ->where('post', $request->post)
            ->where('voter', $request->voter)
            ->exists()){
            return back()->with('error', 'You have already cast a vote for this post');
        }
        else{
            $result->save();

            return back()->with('success', 'Vote cast successfully');
        }

       
    }
}
