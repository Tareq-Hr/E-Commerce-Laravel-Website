<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Coupon;
use App\User;
use App\Categorie;
use App\Media;

class CouponController extends Controller
{
    public $model = 'coupon';
    public function filter_fields(){
        return [
            'titre'=>[
                'type'=>'text'
            ],

            'coupon'=>[
                'type'=>'select',
                'table'=>'coupons',
                'fields' => ['id as key_','coupon as value_'],
            ],

            'date_debut'=>[
                'type'=>'text'
            ],

            'date_fin'=>[
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
        $coupons = Coupon::where($this->filter(false))
                        ->orderBy($this->orderby, 'desc')->paginate($this->perpage())
                        ->withPath($this->url_params(true,['coupon'=>null]));

        return $this->view_('back.coupon.list', [
            'results'=>$coupons
        ]);
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {     
        return $this->view_('back.coupon.update',[
            'object'=> new Coupon()
        ]);
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        
        $this->validate(request(), [
            'titre' => 'required|string|max:255',
            'coupon' => 'required|string',
            'remise' => 'required|integer',
        ]);

        $coupon = Coupon::create([
            'titre'=>request('titre'),
            'coupon'=>request('coupon'),
            'remise'=>request('remise'),
            'date_debut'=>request('date_debut'),
            'date_fin'=>request('date_fin')
        ]);
       

       return redirect()
                ->route('coupon_edit', $coupon->id)
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
        $coupon = Coupon::findOrFail($id);

        return $this->view_('back.coupon.update', [
            'object'=>$coupon
        ]);
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $this->validate(request(), [
            'titre' => 'required|string|max:255',
            'coupon' => 'required|string',
            'remise' => 'required|integer',
        ]);
      
        $coupon = Coupon::findOrFail($id);

        $coupon->titre = request('titre');
        $coupon->coupon = request('coupon');
        $coupon->remise = request('remise');
        $coupon->date_debut = request('date_debut');
        $coupon->date_fin = request('date_fin');

        $coupon->save();

        return redirect()
                ->route('coupon_edit', $coupon->id)
                ->with('success', __('global.edit_succees'));
    }

    /*
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $msg = 'delete_error';
        $flash_type = 'error';
        $coupon = Coupon::findOrFail($id);

        if( $coupon->delete() ){            
            $flash_type = 'success';
            $msg = 'delete_succees';
        }

        return redirect()
            ->route('coupon')
            ->with($flash_type, __('global.'.$msg));
    }
    
}