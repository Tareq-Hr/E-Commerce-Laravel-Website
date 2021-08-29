<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Categorie;
use App\Media;

class ArticleController extends Controller
{
    public $model = 'article';
    public function filter_fields(){
        return [
            'image'=>null,

            'titre'=>[
                'type'=>'text'
            ],

            'categorie'=>[
                'type'=>'select',
                'table'=>'categories',
                'fields' => ['id as key_','categorie as value_'],
            ],

            'image1'=>null,
            'image2'=>null,
            'image3'=>null,
            'image4'=>null,
            'image5'=>null,
                     
        ];
    }

    public function __construct()
    {
        //$this->middleware('auth');

    }

    public function index()
    {
        $articles = Article::where($this->filter(false))
                        ->orderBy($this->orderby, 'desc')->paginate($this->perpage())
                        ->withPath($this->url_params(true,['article'=>null]));

        return $this->view_('back.article.list', [
            'results'=>$articles
        ]);
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $categories = Categorie::where('parent', '!=', null)->get();        

        return $this->view_('back.article.update',[
            'object'=> new Article(),
            'users' => $users,
            'categories' => $categories,
        ]);
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $media  = new Media();
        $media1 = new Media();
        $media2 = new Media();
        $media3 = new Media();
        $media4 = new Media();
        $media5 = new Media();

        

        if($request->file('image')){
            $media->_file = $request->file('image');
            $media->_path = 'Article';
            $media = $media->_save();

        }

        if($request->file('image1')){
            $media1->_file = $request->file('image1');
            $media1->_path = 'Article';
            $media1 = $media1->_save();
        }

        if($request->file('image2')){
            $media2->_file = $request->file('image2');
            $media2->_path = 'Article';
            $media2 = $media2->_save();
        }

        if($request->file('image3')){
            $media3->_file = $request->file('image3');
            $media3->_path = 'Article';
            $media3 = $media3->_save();
        }

        if($request->file('image4')){
            $media4->_file = $request->file('image4');
            $media4->_path = 'Article';
            $media4 = $media4->_save();
        }

        if($request->file('image5')){
            $media5->_file = $request->file('image5');
            $media5->_path = 'Article';
            $media5 = $media5->_save();
        }

        $this->validate(request(), [
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'categorie' => 'required|integer',
        ]);

        $article = Article::create([
            'titre'=>request('titre'),
            'contenu'=>request('contenu'),
            'categorie'=>request('categorie'),
            'prix_vente'=>request('prix_vente'),
            'prix_promo'=>request('prix_promo'),
            'inventaire'=>request('inventaire'),
            'tags'=>request('tags'),
            'taille'=>request('taille'),
            'poids'=>request('poids'),
            'litrage'=>request('litrage'),
            'materiau'=>request('materiau'),
            'reference'=>request('reference'),
            'couleur'=>request('couleur'),
            'image'=>$media->id,
            'image1'=>$media1->id,
            'image2'=>$media2->id,
            'image3'=>$media3->id,
            'image4'=>$media4->id,
            'image5'=>$media5->id,
        ]);
       

       return redirect()
                ->route('article_edit', $article->id)
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
        $article = Article::findOrFail($id);

        $users = User::all();

        $categories = Categorie::where('parent', '!=', null)->get(); 

        return $this->view_('back.article.update', [
            'object'=>$article,
            'users' => $users,
            'categories' => $categories,
        ]);
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        //dd($request);

        $this->validate(request(), [
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'categorie' => 'required|integer',
        ]);
      
        $article = Article::findOrFail($id);

        $article->titre = request('titre');
        $article->contenu = request('contenu');
        $article->categorie = request('categorie');
        $article->prix_promo = request('prix_promo');
        $article->prix_vente = request('prix_vente');
        $article->inventaire = request('inventaire');
        $article->tags = request('tags');
        $article->taille = request('taille');
        $article->poids = request('poids');
        $article->litrage = request('litrage');
        $article->materiau = request('materiau');
        $article->reference = request('reference');
        $article->couleur = request('couleur');

        $media  = new Media();
        $media1 = new Media();
        $media2 = new Media();
        $media3 = new Media();
        $media4 = new Media();
        $media5 = new Media();

        

        if($request->file('image')){
            $media->_file = $request->file('image');
            $media->_path = 'Article';
            $media = $media->_save();

            if($media)
                $article->image = $media->id;
        }

        if($request->file('image1')){
            $media1->_file = $request->file('image1');
            $media1->_path = 'Article';
            $media1 = $media1->_save();

            if($media1)
                $article->image1 = $media1->id;
        }

        if($request->file('image2')){
            $media2->_file = $request->file('image2');
            $media2->_path = 'Article';
            $media2 = $media2->_save();

            if($media2)
                $article->image2 = $media2->id;
        }

        if($request->file('image3')){
            $media3->_file = $request->file('image3');
            $media3->_path = 'Article';
            $media3 = $media3->_save();

            if($media3)
                $article->image3 = $media3->id;
        }

        if($request->file('image4')){
            $media4->_file = $request->file('image4');
            $media4->_path = 'Article';
            $media4 = $media4->_save();

            if($media4)
                $article->image4 = $media4->id;
        }

        if($request->file('image5')){
            $media5->_file = $request->file('image5');
            $media5->_path = 'Article';
            $media5 = $media5->_save();

            if($media5)
                $article->image5 = $media5->id;
        }

        $article->save();

        return redirect()
                ->route('article_edit', $article->id)
                ->with('success', __('global.edit_succees'));
    }

    /*
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $msg = 'delete_error';
        $flash_type = 'error';
        $article = Article::findOrFail($id);

        if( $article->delete() ){            
            $flash_type = 'success';
            $msg = 'delete_succees';
        }

        return redirect()
            ->route('article')
            ->with($flash_type, __('global.'.$msg));
    }
}