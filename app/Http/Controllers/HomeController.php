<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function addCompany(){
        return view('add-company');
    }

    public function saveCompany(Request $r){
        $com = new Company;
        $com->name = $r->name;
        $com->email  = $r->email;
        $com->logo  = $r->file;
        $com->website  = $r->website;
        $com->save();
        return redirect('/show-company');
    }

    public function showCompany(){
        $company = Company::all();
        return view('show-company',['company'=> $company]);
    }

    public function editCompany(Request $r){
        $company = Company::all();
        return view('edit-company',['company'=> $company]);
    }  

    // employee start
    public function addEmployee()
    {
        return view('add-employee');
    }

    public function editEmployee()
    {
        return view('edit-employee');
    }
}
