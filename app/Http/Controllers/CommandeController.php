<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Commande;
use App\Coupon;
use App\Client;
use App\Articlecommande;
use App\Article;

class CommandeController extends Controller
{
    public $model = 'commande';
    public function filter_fields(){
        return [
            'client'=>[
                'type'=>'text'
            ],
            'coupon'=>[
                'type'=>'select',
                'table'=>'coupons',
                'fields' => ['id as key_','coupon as value_'],
            ],
            'total'=>[
                'type'=>'text'
            ]
        ];
    }

    public function __construct()
    {
        //$this->middleware('auth');

    }
    
    public function index()
    {
        $commandes = Commande::where($this->filter(false))
                        ->orderBy($this->orderby, 'desc')->paginate($this->perpage())
                        ->withPath($this->url_params(true,['commande'=>null]));

        return $this->view_('back.commande.list', [
            'results'=>$commandes
        ]);
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $commandes = Commande::all();
        $coupons = Coupon::all();
        $clients = Client::all();
        return $this->view_('back.commande.update',[
            'object'=> new Commande(),
            'commandes' => $commandes,
            'coupons' => $coupons,
            'clients' => $clients,
        ]);
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'client' => 'required|string|max:255',
            'total' => 'required|string|max:255',
            
        ]);

        $commande = Commande::create([
            'client'=>request('client'),
            'coupon'=>request('coupon'),
            'total'=>request('total'),
        ]);
       

       return redirect()
                ->route('commande_edit', $commande->id)
                ->with('success', __('global.create_succees'));
    }

    /*
     * Display the specified resource.
     */

    public function show($id)
    {
        return $this->edit($id);
    }

    
    public function edit($id)
    {
        $commande = Commande::findOrFail($id);

        $commandes = Commande::all();
        $coupons = Coupon::all();
        $clients = Client::all();

        return $this->view_('back.commande.update', [
            'object'=>$commande,
            'commandes'=>$commandes,
            'coupons' => $coupons,
            'clients' => $clients,
        ]);
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $this->validate(request(), [
            'client' => 'required|string|max:255',
            'total' => 'required|string|max:255',
        ]);
      
        $commande = Commande::findOrFail($id);

        $commande->client = request('client');
        $commande->coupon = request('coupon');
        $commande->total = request('total');
       
        $commande->save();

        return redirect()
                ->route('commande_edit', $commande->id)
                ->with('success', __('global.edit_succees'));
    }

    /*
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $msg = 'delete_error';
        $flash_type = 'error';
        $commande = Commande::findOrFail($id);

        if( $commande->delete()){            
            $flash_type = 'success';
            $msg = 'delete_succees';
        }

        return redirect()
            ->route('commande')
            ->with($flash_type, __('global.'.$msg));
    }

    public function afficherCommande($id){

        $commande = Commande::findOrFail($id);

        if($commande->coupon)
            $coupon = Coupon::findOrFail($commande->coupon);
        else
            $coupon = null;

        $articles_cmd = Articlecommande::where('id_cmd',$id)->get();

        
        foreach ($articles_cmd as $article) {

               $articles[] = [
                'article'=>Article::findOrFail($article->id_article),
                'qty'=>$article->qty
            ];
            
        }

        $client = Client::findOrFail($commande->client);

        return view('back.afficher_commande',[
            'commande' => $commande,
            'articles' => $articles,
            'client' => $client,
            'coupon' => $coupon
        ]);

    }
}