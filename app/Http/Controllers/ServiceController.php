<?php

namespace App\Http\Controllers;
use App\Models\Service;

use Illuminate\Http\Request;

class ServiceController extends Controller
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
        $services = Service::all();
        if($services)
            return response()->json($services);
        return response()->json(['Error'=>'Response not found']);

      }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new Service();
        $service->name = $request ->name;
        $service->const = $request ->const;
        $service->employee_id = $request ->employee_id;
        $service->save();

        if($service)
            return response()->json($service);
        return response()->json(['Error'=>'Resource not created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        if($service)
            return response()->json($service);
        return response()->json(['Error'=>'Response not found']);
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
        $service = Service::find($id);
        $service->name = $request ->name;
		$service->const= $request ->const;
		$service->employee_id= $request ->employee_id;		
        $service->save();

        if($service)
            return response()->json($service);
        
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
        $service = Service::find($id);
        if($service){
            $service->delete();
            return response()->json($service);
        }

        return response()->json(['error'=> 'Resource nor delete']);
    }
}
