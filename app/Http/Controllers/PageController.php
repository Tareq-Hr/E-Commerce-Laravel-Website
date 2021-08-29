<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $model = 'page';

    public function filter_fields(){
        return [
            'titre'=>[
                'type'=>'text'
            ],
        ];
    }

     public function __construct()
    {
        //$this->middleware('auth');

    }

    public function index()
    {
        $pages = Page::where($this->filter(false))
                        ->orderBy($this->orderby, 'desc')->paginate($this->perpage())
                        ->withPath($this->url_params(true,['page'=>null]));


        return $this->view_('back.page.list',[
            'results' => $pages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return $this->view_('back.page.update',[
            'object' => new Page(),
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate(request(), [
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
        ]);

        $page = Page::create([
            'titre'=>request('titre'),
            'contenu'=>request('contenu'),
        ]);
       

       return redirect()
                ->route('page_edit', $page->id)
                ->with('success', __('global.create_succees'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->edit($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $page = Page::findOrFail($id); 

        return $this->view_('back.page.update', [
            'object'=>$page
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string'
        ]);
      
        $page = Page::findOrFail($id);

        $page->titre = request('titre');
        $page->contenu = request('contenu');

        $page->save();

        return redirect()
                ->route('page_edit', $page->id)
                ->with('success', __('global.edit_succees'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);

        $msg = 'delete_error';
        $flash_type = 'error';

        if($page->delete()){
            $flash_type = 'success';
            $msg = 'delete_succees';
        }

        return redirect()
            ->route('page')
            ->with($flash_type, __('global.'.$msg));
    }
}
