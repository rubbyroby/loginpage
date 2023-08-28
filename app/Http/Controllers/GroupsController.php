<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Level;
use App\Models\Module;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
      //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $levels=Level::get();
         $data=Group::with('level','module')->get();
       
         return view('dashboard.groups.index',compact('data','levels'));
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
        $data['id_level'] =  $request->level;
        $data['id_module'] =  $request->module;
        $data['max'] =  $request->max;
        Group::insert($data);
        return response()->json(['success'=>'true']);
    }

    public function listmodule(Request $request)
    {
        //
        $modules=array();
        $data = Module::where('id_level',$request->id)->get();
        foreach($data as $i){
            $modules[$i->id]=$i->name;
        }
        
        return response()->json($modules);
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
       $data=Group::findOrFail($request->id);
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
        $data=Group::findOrFail($request->id);
        $data->delete();
        return response()->json(['success'=>true]);

    }
}
