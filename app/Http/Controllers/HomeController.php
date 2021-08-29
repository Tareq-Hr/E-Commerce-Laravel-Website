<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categorie;
use App\Article;
use App\Page;
use App\Commande;
use App\Articlecommande;
use App\Client;
use App\Coupon;

use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();

        return view('home', [
            'categories' => $categories
        ]);
    }

    public function Pages($id)
    {
        $page = Page::findOrFail($id);
            
            return view('page.page',[
                'page' => $page
            ]);
    }

    public function detailProduct($id,$titre){

        $article = Article::findOrFail($id);

        $categorie = Categorie::findOrFail($article->categorie);

        $sous_categories = Categorie::where('parent', '=', $categorie->parent)->get();

        foreach ($sous_categories as $sous_categorie) {

               $data[] = $sous_categorie->id;
            
        }

        //dd($categorie->id ,$data);

        $produits_connexes = Article::whereIn('categorie', $data)->inRandomOrder()->limit(4)->get();

        return $this->view_('detail.product',[
            'article' => $article,
            'categorie' => $categorie,
            'produits_connexes' => $produits_connexes
        ]);

    }

    public function admin()
    {
        return view('back.home');
    }

    public function getImagesByCategory(Request $req){

        $categ_id = $req->categorie_id;
        $articles = Article::where('categorie','=',$categ_id)->get();
        return $articles;
    }

    public function validateCommand(){

        $client = Client::create([
            'nom' => request('nom'),
            'tel' => request('tel'),
            'email' => request('email'),
            'adresse' => request('adresse'),
            'ville' => request('ville'),
        ]);

        $coupon_id = null;
        if(request('coupon')){
            $coupon = Coupon::where('coupon',request('coupon'))->get();
            foreach ($coupon as $code) {
                $coupon_id = $code->id;
                $coupon_remise = $code->remise;
            }
        }
        $total_cmd = ($coupon_id) ? (request('total') - (request('total') * $coupon_remise / 100) + 49) : (request('total') + 49);

        $commande = Commande::create([
            'client' => $client->id,
            'coupon' => $coupon_id,
            'total' =>  $total_cmd
        ]);

        if(session()->has('articles')){          
            for($i=0; $i<sizeof(session('articles')); $i++){
                Articlecommande::create([
                    'id_cmd' => $commande->id,
                    'id_article' => session('articles')[$i]['article']->id ,
                    'qty' => session('articles')[$i]['qty'],
                ]);
            }
        }

        return redirect()->route('thankyou');
        

    }
    
    public function applyCoupon(){

        $coupon_id = null;
        $coupon_remise = null;

        if(request('coupon')){
            $coupon = Coupon::where('coupon',request('coupon'))->get();
            foreach ($coupon as $code) {
                $coupon_id = $code->id;
                $coupon_remise = $code->remise;
            }
        }

        return view('checkout',[
            'coupon_id' => $coupon_id,
            'coupon_code' => request('coupon'),
            'coupon_remise' => $coupon_remise
            ]);

        }

}
