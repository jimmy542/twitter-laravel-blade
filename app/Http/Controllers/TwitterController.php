<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccessKey;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TwitterController extends Controller
{
    
    public function index(){

        $accesskeys = AccessKey::paginate(5);
        return view('twitter.account.index',compact('accesskeys'));

    }

    public function add(){

        return view('twitter.account.add');
    }

    public function store(Request $request){
        $request->validate([
            'account_name'=>'required',
            'consumer_key'=>'required',
            'consumer_secret'=>'required',
            'access_token'=>'required',
            'access_token_secret'=>'required',
        ],
        [
            'account_name.required'=>'Please insert account_name',
            'consumer_key.required'=>'please insert consumer_key',
            'consumer_secret.required'=>'please insert consumer_secret',
            'access_token.required'=>'please insert access_token',
            'access_token_secret.required'=>'please insert access_token_secret',
            'account_active.required'=>'please insert account_active',
        ]);
        
        // save to Eloquent
        $accesskey = new AccessKey;
        $accesskey->account_name = $request->account_name;
        $accesskey->consumer_key = $request->consumer_key;
        $accesskey->consumer_secret=$request->consumer_secret;
        $accesskey->access_token = $request->access_token;
        $accesskey->access_token_secret = $request->access_token_secret;
        $accesskey->account_active = TRUE;
        $accesskey->user_id = Auth::user()->id;
        $accesskey->save();
        // return redirect()->back()->with('success','save data okay');
        return redirect()->route('twitter')->with('success','success update twitter account');
    }

    public function edit($id){

        $accesskey = AccessKey::find($id);
        return view('twitter.account.edit',compact('accesskey'));

    }

    public function save(Request $request ,$id){
        $request->validate([
            'account_name'=>'required',
            'consumer_key'=>'required',
            'consumer_secret'=>'required',
            'access_token'=>'required',
            'access_token_secret'=>'required',
        ],
        [
            'account_name.required'=>'Please insert account_name',
            'consumer_key.required'=>'please insert consumer_key',
            'consumer_secret.required'=>'please insert consumer_secret',
            'access_token.required'=>'please insert access_token',
            'access_token_secret.required'=>'please insert access_token_secret',
            'account_active.required'=>'please insert account_active',
        ]);
        

        AccessKey::where('id',$id)->update([
            'account_name'=>$request->account_name,
            'consumer_key'=>$request->consumer_key,
            'consumer_secret'=>$request->consumer_secret,
            'access_token'=>$request->access_token,
            'access_token_secret'=>$request->access_token_secret,
            'user_id'=>Auth::user()->id,
        ]);
        return redirect()->route('twitter')->with('success','success update twitter account');
    }

}
