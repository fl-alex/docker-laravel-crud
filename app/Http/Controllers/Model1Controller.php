<?php

namespace App\Http\Controllers;
use App\Models\Model1;
use Illuminate\Http\Request;


class Model1Controller extends Controller
{


    public function get_controller_name(){

        $routeArray = app('request')->route()->getAction();
        $controllerAction = class_basename($routeArray['controller']);
        return trim(substr(explode('@', $controllerAction)[0],0,-10));

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $model1 = Model1::orderBy('id','desc')->paginate(2);
        return view('Model1', ['data'=>$model1]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('model1create',['modelname' => 'James-create', 'controllername'=>$this->get_controller_name()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $model1 = new Model1();
        $model1->name = $request->input('name');
        $model1->description = $request->input('description');
        $model1->save();

        return redirect()->route('Model1.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Model1 $model1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Model1 $model1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateModel1Request $request, Model1 $model1)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Model1 $model1)
    {
        //
    }
}
