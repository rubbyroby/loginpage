<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Level;
use App\Models\Module;
use App\Models\Student;
use App\Models\StudentLevel;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Student::get();
        $levels=Level::get();
        
        return view('dashboard.students.index',compact('data','levels'));
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
        $data['fname'] =  $request->fname;
        $data['lname'] =  $request->lname;
        $data['email'] =  $request->email;
        $data['phone'] =  $request->tel;
        $data['parent_phone'] =  $request->ptel;
        $data['address'] =  $request->address;
        Student::insert($data);
        $last=Student::get()->last();
        $data1=array();
        $data1['id_student']=$last->id;
        $data1['id_level']=$request->level;
        StudentLevel::insert($data1);

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
        $data=Student::with('stdlevel')->findOrFail($id);
        $modules=Module::where('id_level',$data->stdlevel->id_level)->get();
         return view('dashboard.students.show',compact('data','modules'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listgroupe(Request $request)
    {
        $groupes=array();
        $data = Group::where('id_module',$request->id)->get();
        foreach($data as $i){
            $groupes[$i->id]=$i->name;
        }
        
        return response()->json($groupes);
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
       $data=Student::findOrFail($request->id);
       $data->fname =  $request->fname;
        $data->lname =  $request->lname;
        $data->email =  $request->email;
        $data->phone =  $request->tel;
        $data->parent_phone =  $request->ptel;
        $data->address =  $request->address;
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
        $data=Student::findOrFail($request->id);
        $data->delete();
        return response()->json(['success'=>true]);

    }
}
