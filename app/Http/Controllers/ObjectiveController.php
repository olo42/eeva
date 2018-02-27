<?php

namespace App\Http\Controllers;

use App\Objective;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ObjectiveAdded;
use App\Mail\ObjectiveEvaluated;


class ObjectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Employee $employee)
    {
        $objectives = $employee->objectives->where('user_id', \Auth::user()->id);

        return view('objectives.index', compact('objectives', 'employee'));
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

        $last_objective = $employee->objectives->where('user_id', \Auth::user()->id)->where('is_evaluated', '=', 0)->last();

        if(!empty($last_objective)) {
            return redirect()->action('ObjectiveController@edit', ['employee' => $employee, 'objective' => $last_objective]);
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
        $objective->save();

        $recipients = array(\Auth::user()->email);
        if($request->send_objectives_to_employee == "yes"){
            array_push($recipients,$employee->email);
        }
        // Mail::to($recipients)->cc("HRinfo@maritzcx.com")->send(new ObjectiveAdded($objective));
        Mail::to($recipients)->cc("karel.mette@maritzcx.com")->send(new ObjectiveAdded($objective));

        if($request->evaluate == 1) {
            return redirect()->action('ObjectiveController@edit', ['employee' => $employee, 'objective' => $objective]);
        }
        
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
        $employee = $objective->employee;
        return view('objectives.show', compact('objective', 'employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee, Objective $objective)
    {
        return view('objectives.edit', compact('employee','objective'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee, Objective $objective)
    {
        $objective->evaluation = $request->evaluation;
        $objective->comment = $request->comments;
        $objective->mcx_core_values = $request->mcx_core_values;
        $objective->personal_development = $request->personal_development;
        $objective->is_evaluated = true;
        $objective->save();

        $recipients = array(\Auth::user()->email);
        if($request->send_evaluation_to_employee == "yes"){
            array_push($recipients,$employee->email);
        }
        // Mail::to($recipients)->cc("HRinfo@maritzcx.com")->send(new ObjectiveEvaluated($objective));
        Mail::to($recipients)->cc("karel.mette@maritzcx.com")->send(new ObjectiveEvaluated($objective));

        return view('objectives.show', compact('objective', 'employee'));
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
