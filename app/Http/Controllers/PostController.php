<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use TwitterAPIExchange;
use App\Models\PostModel;

class PostController extends Controller
{
 public function index(){

    $posts = PostModel::paginate(5);
    return view('twitter.post.index',compact('posts'));

 }

 public function add(){

   return view('twitter.post.add');
}

 public function store(Request $request){
   
      $request->validate([
            'tweet_text'=>'required|max:140',
            'image'=>'mimes:jpg,jpeg,png',
      ],
      [
            'tweet_text.required'=>'Please insert service name',
            'tweet_text.max'=>'do not insert more than 140 string',
      ]);

      
      $image = $request->file('image');
      $name_gen = hexdec(uniqid());
      // $request->image->storeAs('image',$name_gen);
      $public_image=$request->image->move(public_path('image'), $name_gen.".".$image->getClientOriginalExtension());
      // $img_ext = strtolower($image->getClientOriginalExtension());
      // $img_name = $name_gen.'.'.$img_ext;
      // $upload_location = 'image/tweet/';

        $post = new PostModel;
        $post->tweet_text = $request->tweet_text;
        $post->link = $request->link;
        $post->image = $public_image;
        $post->user_id = Auth::user()->id;
        $post->save();
        // return redirect()->back()->with('success','save data okay');
        return redirect()->route('post')->with('success','success update twitter account');


 }

 public function getTimeLine(){

    $twitter = new TwitterAPIExchange([
        'oauth_access_token' => 'YOUR_OAUTH_ACCESS_TOKEN',
        'oauth_access_token_secret' => 'YOUR_OAUTH_ACCESS_TOKEN_SECRET',
        'consumer_key' => 'YOUR_CONSUMER_KEY',
        'consumer_secret' => 'YOUR_CONSUMER_SECRET',
    ]);


 }

}
