<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Module;
use Illuminate\Http\Request;

class ModulesController extends Controller
{
    
     //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Module::with('level')->get();
       
         return view('dashboard.modules.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = array();
        $data['name'] =  $request->name;
        $data['price_mounth'] =  $request->price;
        $data['id_level'] =  $request->id_level;
        Module::insert($data);
        return response()->json(['success'=>'true']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $data=Module::findOrFail($request->id);
       $data->name =  $request->name;
        $data->save();
        return response()->json(['success'=>'true']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data=Module::findOrFail($request->id);
        $data->delete();
        return response()->json(['success'=>true]);

    }
}
