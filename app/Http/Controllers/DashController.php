<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;


class DashController extends Controller
{
    

    public function Dashboard(){
        $totalPosts = Post::where('user_id', Auth::user()->id)->count();
        // $totalPosts = Post::where('user_id', Auth::user()->id)->get();
        // $totalPublish = Post::count()->status;
        // $totalPublish = Post::where('status', 1)->get();
        // $totalPublish = Post::where('status', Auth::user()->id)->count();    
        $totalPublish = Post::where('status', 1)->where('user_id', Auth::user()->id)->count();
        $totalUnPublish = Post::where('status', 0)->where('user_id', Auth::user()->id)->count();
        return view('dashboard', ['totalPosts' => $totalPosts, 'totalPublish' => $totalPublish, 'totalUnPublish' => $totalUnPublish]);
        // return view('dashboard',compact($totalPosts));
    }
}