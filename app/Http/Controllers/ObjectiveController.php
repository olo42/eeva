<?php

namespace App\Http\Controllers;

use App\Objective;
use App\Employee;
use Illuminate\Http\Request;

class ObjectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $employee = Employee::where('email', $request->email)->first();
        
        if(empty($employee)) {
            $employee = $this->create_employee($request->email, $request->name);
        }

        return view('objectives.create', compact('employee'));
    }

    private function create_employee($email, $name)
    {
        $employee = new Employee();
        $employee->email = $email;
        $employee->name = $name;
        $employee->save();
        return $employee;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Employee $employee)
    {
        $objective = new Objective();
        
        $objective->user_id = \Auth::user()->id;
        $objective->employee_id = $employee->id;
        $objective->objective = $request->objective;
        
        if($request->evaluate == 1) {
            $objective->evaluation = $request->evaluation;
            $objective->comment = $request->comment;
            $objective->mcx_core_values = $request->mcx_core_values;
            $objective->personal_development = $request->personal_development;
        }
        
        $objective->save();

        return view('objectives.show', compact('objective', 'employee'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function show(Objective $objective)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function edit(Objective $objective)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Objective $objective)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function destroy(Objective $objective)
    {
        //
    }
}
