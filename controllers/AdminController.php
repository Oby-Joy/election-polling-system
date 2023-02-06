<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Post;
use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index(){
        return view('admin.index');
    }

    public function addPost(){
        return view('admin.add-post');
    }

    public function savePost(){
        $properties = request()->validate([
            'post' => 'required|string|min:3',
        ]);

        Post::create($properties);

        return back()->with('success', 'Post added successfully');
    }

    public function viewPosts(){
        $posts = Post::all();

        return view('admin.view-posts', compact('posts'));
    }

    public function voters(){
        $voters = User::all();

        return view('admin.voters', compact('voters'));
    }

    public function results(){
        $posts = Post::all();

        return view('admin.results', compact('posts'));
    }

    public function addCandidate($id){
        $posts = Post::all(); 
        $post = Post::findOrFail($id);
        return view('admin.add-candidate', compact('posts','post'));
    }

    public function saveCandidate(){
        $properties = request()->validate([
            'post_id' => 'required',
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'faculty' => 'required|string',
            'manifesto' => 'required|min:10|string',
        ]);

        Candidate::create($properties);

        return back()->with('success', 'Candidate Added Successfully');
    }

    public function candidatesList($id){
        $post = Post::findOrFail($id);

        return view('admin.candidates-list', compact('post'));
    }

    public function resultList($id){
        $post = Post::findOrFail($id);

        $results = Result::all();

        $candidates = Candidate::all();

        $votes = DB::table('results')
                    ->select('candidate', DB::raw('count(*) as total'))
                    ->orderBy('candidate', 'asc')
                    ->where('post', $post->post)
                    ->groupBy('candidate')
                    ->get();
        $votesDecode = json_decode($votes, true);
        //dd($votesDecode);

        

        /*foreach($results as $result){
            $all = $result->candidate;
            $number = $votesDecode[$all];
        }*/
        //$votes = Result::where('candidate', $result->id)->count();

        return view('admin.result-list', compact('post', 'results', 'votes', 'candidates', 'votesDecode'));
    } 
}
