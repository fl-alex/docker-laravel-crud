<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkerRequest;
use App\Models\Company;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{

    public function get_controller_name(){

        $routeArray = app('request')->route()->getAction();
        $controllerAction = class_basename($routeArray['controller']);
        return trim(substr(explode('@', $controllerAction)[0],0,-10));

    }

    public function get_my_routename(Request $request){
        return explode('.',$routeName = $request->route()->getName())[0];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $routename = $this->get_my_routename($request);
        $workers = Worker::orderBy('id','desc')->paginate(5);
        return view('worker.index', compact('workers', 'routename'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Company $company)
    {
        $company = $company::all();
        return view('worker.create',compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Worker $worker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Worker $worker)
    {
        return view('worker.edit',compact('worker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Worker $worker)
    {

        $request->validate([
            'name' => 'required'
        ]);

        $worker->fill($request->post())->save();

        return redirect()->route('workers.index')->with('success','Worker Has Been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Worker $worker)
    {
        $worker->delete();
        return redirect()->back()->with('success','Worker has been deleted successfully');
    }
}
