<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    
    public function index()
    {
        $employees=Employee::paginate(15);
        return view('index')->with('employees',$employees);
    }

    public function destroy($id)
    {
       $employee= Employee::find($id);
       $employee->delete();
       return redirect()->route('employees.index');
    }

    public function show($id)
    {
        $employs=Employee::find($id);
       return View('show')->with('employs',$employs);
    }

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
        $employ->save();
        return redirect()->route('employees.show',$employ->id);
    }


    public function search(Request $request){
        $search = $request->input('search');
        $employees= Employee::where('name','like','%'.$search.'%')
        
        ->paginate(10);
        
        return View('index')->with('employees',$employees);
    }

   
    public function edit(Employee $employee,$id)
    {
         $employs=Employee::find($id);
        //  dd($employs->mobile_no);
       return View('edit')->with('employs',$employs);
    }

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
       
       $employee = Employee::find($id);
        // $employee->update([
        //     'name'=> $request->name,
        //     'email'=> $request->email,
        //     'mobile_no'=> $request->mobile_no ,
        //     'address'=>$request->address,
        //     'joining_date'=>$request->joining_date,
        //     'salary'=>$request->salary,
        //     'job_title'=>$request->job_title
        //     ]);
        $employee->fill($request->only([
            'name',
            'email',
            'mobile_no',
            'address',
            'joining_date',
            'salary',
            'job_title'
        ]));
        $employee->save();
            


        return redirect()->route('employees.index');

    }

    

}
