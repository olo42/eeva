<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Get all eomployees for autocomplete.
     *
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        $employees = \DB::table('employees')->where('email', 'like', $request->email . '%')->get();
        return $employees->toJson();;
    }
}
