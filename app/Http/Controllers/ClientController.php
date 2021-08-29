<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Client;
use App\User;
use App\Media;

class ClientController extends Controller
{
    public $model = 'client';
    public function filter_fields(){
        return [
            'nom'=>[
                'type'=>'text'
            ],
            'tel'=>[
                'type'=>'text'
            ],
            'email'=>[
                'type'=>'text'
            ],
            'ville'=>[
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
        $clients = Client::where($this->filter(false))
                        ->orderBy($this->orderby, 'desc')->paginate($this->perpage())
                        ->withPath($this->url_params(true,['client'=>null]));

        return $this->view_('back.client.list', [
            'results'=>$clients
        ]);
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        return $this->view_('back.client.update',[
            'object'=> new Client(),
            'clients' => $clients,
        ]);
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'nom' => 'required|string|max:255',
            'tel' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            
        ]);

        $client = Client::create([
            'nom'=>request('nom'),
            'tel'=>request('tel'),
            'email'=>request('email'),
            'adresse'=>request('adresse'),
            'ville'=>request('ville'),
        ]);
       

       return redirect()
                ->route('client_edit', $client->id)
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
        $client = Client::findOrFail($id);

        $clients = Client::all();

        return $this->view_('back.client.update', [
            'object'=>$client,
            'clients'=>$clients,
        ]);
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $this->validate(request(), [
            'nom' => 'required|string|max:255',
            'tel' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
        ]);
      
        $client = Client::findOrFail($id);

        $client->nom = request('nom');
        $client->tel = request('tel');
        $client->email = request('email');
        $client->adresse = request('adresse');
        $client->ville = request('ville');
       
        $client->save();

        return redirect()
                ->route('client_edit', $client->id)
                ->with('success', __('global.edit_succees'));
    }

    /*
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $msg = 'delete_error';
        $flash_type = 'error';
        $client = Client::findOrFail($id);

        if( $client->delete()){            
            $flash_type = 'success';
            $msg = 'delete_succees';
        }

        return redirect()
            ->route('client')
            ->with($flash_type, __('global.'.$msg));
    }
}