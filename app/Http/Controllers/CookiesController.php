<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cookie;

class CookiesController extends Controller

{

    public function setCookie(Request $request)
	    {
	    	$id = request('id');

	    	$qty = request('qty');

	    	$article = \App\Article::findOrFail($id);
	    	
	    	\Session::push('articles',['article'=>$article,"qty"=>$qty]);


	    	return redirect()
	                ->route('detail_produit', [$id, $article->titre] );
	    }   


	    public function flushCookies(){
	    	
	    	if(session()->has('articles'))
	    	{
	    		session()->flush('articles');
	    	}

	    	return view('thankyou');
	    } 

	    public function deleteAll(){

	    	if(session()->has('articles'))
	    	{
	    		session()->flush('articles');    		
	    	}

	    	return redirect()
	                ->route('front_home');
	    }	
}
