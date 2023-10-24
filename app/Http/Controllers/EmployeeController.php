<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function  __construct(){
        $this->company = new Company();
        $this->employee = new Employee();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = Company::join('employees', 'companies.id', '=', 'employees.company')
            ->paginate(10);
       
        return view('employee.employee',['employee'=> $employee]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $company = $this->company::pluck('name','id');
        return view('employee.add-employee',['company'=> $company]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {

        $this->validate($r, ['fname' => 'required','lname' => 'required'],['fname.required' => 'First Name required','lname.required' => 'Last Name required']);
        
       
        $this->employee->fname = $r->fname;
        $this->employee->lname = $r->lname;
        $this->employee->company = $r->company;
        $this->employee->email = $r->email;
        $this->employee->phone = $r->phone;
        $this->employee->save();
        return redirect('/employee')->with('message',"Employee Added Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        die("2");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $employee = $this->employee::find($id);
        $company = $this->company::pluck('name','id');
        return view('employee.edit-employee',['employee'=> $employee,'company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
        $employee = $this->employee::find($id);
        $employee->fname = $r->fname;
        $employee->lname = $r->lname;
        $employee->company = $r->company;
        $employee->email = $r->email;
        $employee->phone = $r->phone;
        $employee->save();
        return redirect('/employee')->with('message',"Employee Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = $this->employee::find($id);
        $employee->delete();
        return redirect('/employee')->with('message',"Employee Deleted Successfully");
    }
}