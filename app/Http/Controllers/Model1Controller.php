<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModel1Request;
use App\Http\Requests\UpdateModel1Request;
use App\Models\Model1;

class Model1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $routeArray = app('request')->route()->getAction();
        $controllerAction = class_basename($routeArray['controller']);
        $controller = explode('@', $controllerAction)[0];
            return view('model1', ['name' => 'James', 'controllername'=>trim(substr($controller,0,-10))]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('model1create', ['modelname' => 'James-create']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreModel1Request $request)
    {
        //
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
