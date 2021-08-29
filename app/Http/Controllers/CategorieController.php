<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Categorie;
use App\User;
use App\Media;

class CategorieController extends Controller
{
    public $model = 'categorie';
    public function filter_fields(){
        return [
            'categorie'=>[
                'type'=>'text'
            ],
            'parent'=>[
                'type'=>'select',
                'table'=>'categories',
                'fields' => ['id as key_','categorie as value_'],
            ],
        ];
    }

    public function __construct()
    {
        //$this->middleware('auth');

    }
    
    public function index()
    {
        $categories = Categorie::where($this->filter(false))
                        ->orderBy($this->orderby, 'desc')->paginate($this->perpage())
                        ->withPath($this->url_params(true,['categorie'=>null]));

        return $this->view_('back.categorie.list', [
            'results'=>$categories
        ]);
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::where('parent',null)->get();
        return $this->view_('back.categorie.update',[
            'object'=> new Categorie(),
            'categories' => $categories,
        ]);
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'categorie' => 'required|string|max:255',
            
        ]);

        $categorie = Categorie::create([
            'categorie'=>request('categorie'),
            'parent'=>request('parent'),
        ]);
       

       return redirect()
                ->route('categorie_edit', $categorie->id)
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
        $categorie = Categorie::findOrFail($id);

        $categories = Categorie::all();

        return $this->view_('back.categorie.update', [
            'object'=>$categorie,
            'categories'=>$categories,
        ]);
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $this->validate(request(), [
            'categorie' => 'required|string|max:255'
        ]);
      
        $categorie = Categorie::findOrFail($id);

        $categorie->categorie = request('categorie');
        $categorie->parent = request('parent');
       
        $categorie->save();

        return redirect()
                ->route('categorie_edit', $categorie->id)
                ->with('success', __('global.edit_succees'));
    }

    /*
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $msg = 'delete_error';
        $flash_type = 'error';
        $categorie = Categorie::findOrFail($id);

        $parents = Categorie::where('parent', '=', $id)->delete();

        if( $categorie->delete()){            
            $flash_type = 'success';
            $msg = 'delete_succees';
        }

        return redirect()
            ->route('categorie')
            ->with($flash_type, __('global.'.$msg));
    }
}