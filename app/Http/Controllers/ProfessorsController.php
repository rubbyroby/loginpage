<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Professor;
use App\Models\ProfessorModule;
use Illuminate\Http\Request;
use App\Models\ProfessorSalary;

class ProfessorsController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data=Professor::get()->last();
        $modules=Module::with('level')->get();

        $data=Professor::with('salary','promodules')->get();
        return view('dashboard.professors.index',compact('data','modules'));
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
       
        $data = array();
        $data['fname'] =  $request->fname;
        $data['lname'] =  $request->lname;
        $data['email'] =  $request->email;
        $data['phone'] =  $request->tel;
        $data['address'] =  $request->address;
        Professor::insert($data);
         $last=Professor::get()->last();
         $data1 = array();
         $data1['id_professor'] =  $last->id;
         $data1['salary_hour'] =  $request->salary;
         ProfessorSalary::insert($data1);

         foreach($request->modules as $module){
            $data = array();
         $data['id_professor'] =  $last->id;
         $data['id_module'] = $module;
         ProfessorModule::insert($data);
         }




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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data=Professor::findOrFail($request->id);
        $data->delete();
        return response()->json(['success'=>true]);

    }
}
