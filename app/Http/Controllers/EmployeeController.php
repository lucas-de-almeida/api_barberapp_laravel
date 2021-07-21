<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:api');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = Employee::with('company','user','services','schedules')->get();
        if($employes)
            return response()->json($employes);
        
        return response()->json(['error'=>'Response not found.']);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employe = new Company();
        $employe->first_name = $request ->first_name;
		$employe->last_name= $request ->last_name;
		$employe->user_id= $request ->user_id;
		$employe->companie_id= $request ->compaie_id;
        $employe->save();

        if($employe)
            return response()->json($employe);
        
        return response()->json(['error'=>'Resource not save'],401);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employe = Employee::find($id);

        if($employe)
            return response()->json($emplye);
        
        return response()->json(['error'=>'Resourcenot found']);
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
        $employe = Employee::find($id);
        $employe->first_name = $request ->first_name;
		$employe->last_name= $request ->last_name;
		$employe->user_id= $request ->user_id;
		$employe->companie_id= $request ->companie_id;
        $employe->save();

        if($employe)
            return response()->json($employe);
        
        return response()->json(['error'=>'Resource not update'],401);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employe = Employee::find($id);
        if($employe){
            $employe->delete();
            return response()->json($employe);
        }

        return response()->json(['error'=> 'Resource nor delete']);
    }
}
