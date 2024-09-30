<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees=Employee::paginate(15);
        return view('index')->with('employees',$employees);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
            'name' => 'required|string|max:255',
            'joining_date' => 'required|date',
            'job_title' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'email' => 'required|email|unique:employees,email',
            'mobile_no' => 'required|string|max:20',
            'address' => 'required|string|max:255'
        ]);
        $employ= Employee::create($request->all());
        // dd($employ);
        $employ->save();
        return redirect()->route('employees.show',$employ->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee, $id)
    {
        $employs=Employee::find($id);
       return View('show')->with('employs',$employs);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee,$id)
    {
         $employs=Employee::find($id);
        //  dd($employs->mobile_no);
       return View('edit')->with('employs',$employs);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        // dd($id);
         $request->validate([
            'name' => 'required|string|max:255',
            'joining_date' => 'required|date',
            'job_title' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'email' => 'required|email|unique:employees,email,' . $id,
            'mobile_no' => 'required|string|max:20',
            'address' => 'required|string|max:255'
        ]);
        // $employees=Employee::find($request->id);
       $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->mobile_no = $request->mobile_no;
        $employee->address = $request->address;
        $employee->joining_date = $request->joining_date;
        $employee->salary = $request->salary;
        $employee->job_title = $request->job_title;
        $employee->save();
        // $employees->save();

        return redirect()->route('employees.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee,$id)
    {
       $employee= Employee::find($id);
       $employee->delete();
       return redirect()->route('employees.index');
    }
    public function search(Request $request){
        $search = $request->input('search');
        $employees= Employee::where('name','like','%'.$search.'%')
        
        ->paginate(10);
        
        return View('index')->with('employees',$employees);
    }

}
