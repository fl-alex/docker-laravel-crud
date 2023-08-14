<?php

namespace App\Http\Controllers;
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
        $workers = Worker::with('Company')->orderBy('id','desc')->paginate(5);
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

    public function create_from(Company $company, Request $request)
    {
        $company = $company::all();
        $own_company = Company::all()->find($request->input('own_company'));
        return view('worker.create_from',compact('company', 'own_company'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'company_id' => 'required',
        ]);

        $worker = new Worker([
            'name' => $request->name
        ]);
        $company = Company::all()->find($request->company_id);
        $company->workers()->save($worker);

        return redirect()->route('workers.index')->with('success','Worler has been created successfully.');
    }

    public function store_from(Request $request)
    {

        print_r($request->name);
        print_r($request->company_id);


        $request->validate([
            'name' => 'required',
            'company_id' => 'required',
        ]);

        $worker = new Worker([
            'name' => $request->name
        ]);
        $company = Company::all()->find($request->company_id);
        $company->workers()->save($worker);

        //return redirect()->route('companies.edit')->with('success','Worker has been created successfully.');
        //return view('companies.edit', compact('company','workers','controllername'));
        return redirect()->route('companies.edit', [$request->company_id]);
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
        $company = Company::all();
        return view('worker.edit',compact('worker', 'company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Worker $worker)
    {

        $request->validate([
            'name' => 'required',
            'company_id' => 'required'

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
