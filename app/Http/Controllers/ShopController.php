<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Session;
use Storage;

class ShopController extends Controller
{

    /*
    * define view path 
    */
    protected $view_path = '';

    /*
    * initialization function 
    */
    public function __construct() {
        $this->view_path = 'shop'; 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::query()
                        ->whereNull('deleted_at')
                        ->orderBy('id', 'DESC')
                        ->paginate(20);

        return View($this->view_path.'/index',compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View($this->view_path.'/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'shop_name' => 'required|max:255',
            'email'     => 'required|email|unique:shops',
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'address'   => 'required|max:150',
        ]);

        if ($request->hasFile('image')) {
            $format = $request->file('image')->getClientOriginalExtension();
            $imageName = time().".".$format;
            Storage::disk('public')->put($imageName, file_get_contents($request->file('image')));
        }

        $shop = new Shop();
        $shop->shop_name    = $request->shop_name;
        $shop->email        = $request->email;
        $shop->image        = isset($image) ? $image : "";
        $shop->address      = $request->address;
        $shop->save();

        Session::flash('success', 'Shop created successfully!');
        return redirect()->route('shop.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Shop::find($id);
        return View($this->view_path.'/edit',compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'shop_name' => 'required|max:255',
            'email'     => 'nullable|unique:shops,email,'.$id,
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'address'   => 'required|max:150',
        ]);

        if ($request->file('image') != null) {
            $format = $request->file('image')->getClientOriginalExtension();
            $imageName = time().".".$format;            
            \Storage::disk('public')->put($imageName, file_get_contents($request->file('image')));
        } else {
            $imageName = $request->old_image;
        }

        $shop = Shop::find($id);
        $shop->shop_name    = $request->shop_name;
        $shop->email        = $request->email;
        $shop->image        = isset($imageName) ? $imageName : "";
        $shop->address      = $request->address;
        $shop->save();

        Session::flash('success', 'Shop updated successfully!');
        return redirect()->route('shop.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $id = $request->get('id');

        $delete = Shop::find($id)->delete();
        
        Session::flash('success', 'Shop delete successfully!');
        return \Redirect::back();
    }
}
