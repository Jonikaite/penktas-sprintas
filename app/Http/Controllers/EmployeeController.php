<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('employees.index',['employees' => Employee::orderBy('name')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = \App\Models\Employee::orderBy('name')->get();
        $projects = \App\Models\Project::orderBy('name')->get();
        return view('employees.create', ['employees' => $employees], ['projects' => $projects]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){           
        $this->validate($request, [
        'name' => 'required|unique:employees,name|max:50',
       ]);

        $employee = new Employee();
        $employee->fill($request->all());
        return ($employee->save() !==1) ?
            redirect('/employee')->with('status_success', 'Employee created!') : 
            redirect('/employee')->with('status_error', 'Employee was not created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $projects = \App\Models\Project::orderBy('name')->get();
        return view('employees.edit', ['employee' => $employee], ['projects' => $projects]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {

        // $this->validate($request, [
        //     "name" => "required|max:30",
        //     "surname" => "required|max:30",
        //     "phone" => 'required|unique:employees,phone,'.$employee->id|"max:14",
        //     "email" => 'required|unique:employees,email,'.$employee->id|"max:30"]);

        $employee->fill($request->all());
        return ($employee->save() !==1) ?
            redirect('/employee')->with('status_success', 'Employee updated!') : 
            redirect('/employee')->with('status_error', 'Employee was not updated!');
        return redirect()->route('employee.index');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        return ($employee->delete() !==1) ?
            redirect('/employee')->with('status_success', 'Employee deleted!') : 
            redirect('/employee')->with('status_error', 'Employee was not deleted!');
    }
}