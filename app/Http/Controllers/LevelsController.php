<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelsController extends Controller
{
     //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Level::get();
        
        return view('dashboard.levels.index',compact('data'));
    }
    public function classroom()
    {
        $data=Classroom::get();
        
        return view('dashboard.classrooms.index',compact('data'));
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
        Level::insert($data);
        return response()->json(['success'=>'true']);
    }
    public function addclass(Request $request)
    {
        //
        $data = array();
        $data['name'] =  $request->name;
        Classroom::insert($data);
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
       $data=Level::findOrFail($request->id);
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
        $data=Level::findOrFail($request->id);
        $data->delete();
        return response()->json(['success'=>true]);

    }
    public function deleteclass(Request $request)
    {
        $data=Classroom::findOrFail($request->id);
        $data->delete();
        return response()->json(['success'=>true]);

    }
}
