<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Carbon\Carbon;
use App\Models\Group;
use App\Models\GrpPlanner;
use App\Models\Professor;
use Illuminate\Http\Request;

class GrpPlannersController extends Controller
{
      //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mytime = Carbon::now();
    $today=$mytime->setTimezone('Africa/Casablanca')->format('l');
    $days=[
        ['day'=>'Monday','active'=>0],
        ['day'=>'Tuesday','active'=>0],
        ['day'=>'Wednesday','active'=>0],
        ['day'=>'Thursday','active'=>0],
        ['day'=>'Friday','active'=>0],
        ['day'=>'Saturday','active'=>0],
        ['day'=>'Sunday','active'=>0],
    ];
    foreach($days as $i){
        if($i['day']==$today){
            $days[$mytime->dayOfWeekIso-1]['active']=1;
        }
    }
    $hours=[];
    $hr=[];
    $counter=0;
    for($i=8;$i<21;$i++){
        $sess=GrpPlanner::where('day',$today)->where('start_time',$i)->get();
        if(sizeof($sess)>0){
            $hr=[
                'hour'=>$i,
                'active'=>1
            ];
        }else{
            $hr=[
                'hour'=>$i,
                'active'=>0
            ];
        }

        $hours[]=$hr;

    }
    $groups=Group::get();
    $professors=Professor::get();
    $classrooms=Classroom::get();
     return view('dashboard.sessions.index',compact('days','hours','today','groups','professors','classrooms'));
   

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listevents(Request $request)
    {
        
        $sess=GrpPlanner::with('group','professor','classroom')->where('day',$request->day)->where('start_time','LIKE','%'.$request->hour.'%')->get();
        $data=[];
        foreach($sess as $i){
            $row=[];
            $row['group']=$i->group->name;
            $row['day']=$i->day;
            $row['start']=$i->start_time;
            $row['end']=$i->end_time;
            $row['professor']=$i->professor->fname.' '.$i->professor->lname;
            $row['classroom']=$i->classroom->name;
            $module=Group::with('module')->find($i->id_group);
            $row['module']=$module->module->name;

            $data[$i->id]=$row;


        }
        return response()->json($data);
    }
    public function listdays(Request $request)
    {
        
        $hours=[];
        $hr=[];
        $counter=0;
        for($i=8;$i<21;$i++){
            $sess=GrpPlanner::where('day',$request->day)->where('start_time',$i)->get();
            if(sizeof($sess)>0){
                $hr=[
                    'hour'=>$i,
                    'active'=>1
                ];
            }else{
                $hr=[
                    'hour'=>$i,
                    'active'=>0
                ];
            }
    
            $hours[]=$hr;
    
        }
        return response()->json($hours);
    }
    public function editevents(Request $request)
    {
        $sess=GrpPlanner::findOrFail($request->id);
        $data=[];
        $data['current']=$sess;

        
        return response()->json($data);
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
        $data['id_group'] =  $request->group;
        $data['day'] =  $request->day;
        $data['start_time'] =  $request->start;
        $data['end_time'] =  $request->end;
        $data['id_professor'] =  $request->professor;
        $data['id_classroom'] =  $request->classroom;
        GrpPlanner::insert($data);
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
       $data=GrpPlanner::findOrFail($request->id);
       $data->id_group =  $request->group;
        $data->day =  $request->day;
        $data->start_time =  $request->start;
        $data->end_time =  $request->end;
        $data->id_professor =  $request->professor;
        $data->id_classroom =  $request->classroom;
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
        $data=GrpPlanner::findOrFail($request->id);
        $data->delete();
        return response()->json(['success'=>true]);

    }
}
