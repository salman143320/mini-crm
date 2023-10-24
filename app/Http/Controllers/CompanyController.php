<?php
namespace App\Http\Controllers;
require 'vendor/autoload.php';

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Mailgun\Mailgun;
use Mail;

class CompanyController extends Controller
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
        // $company = $this->company::all();
        $company = $this->company::paginate(10);
        return view('company.company',['company'=> $company]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $company = $this->company::pluck('name','id');
        return view('company.add-company',['company'=> $company]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r){
        $this->sendmail($r->name);
        die;
        $filename = '';
        $this->validate($r, ['name' => 'required'],['name.required' => 'Company Name required']);
        if($r->file('logo')){
            $file = $r->file('logo');
            $filename = $file->getClientOriginalName();
            $destinationPath = storage_path('/app/public');
            $file->move($destinationPath,$file->getClientOriginalName()); 
        }
        $this->company->name = $r->name;
        $this->company->email = $r->email;
        $this->company->logo = $filename;
        $this->company->website = $r->website;
        $this->company->save();
        return redirect('/company')->with('message',"Company Added Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = $this->company::find($id);
        return view('company.edit-company',['company'=> $company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
        $filename = '';
        $this->validate($r, ['name' => 'required'],['name.required' => 'Company Name required']);
        $company = $this->company::find($id);
        if($r->file('logo')){
            $file = $r->file('logo');
            $filename = $file->getClientOriginalName();
            $company->logo = $filename;
            $destinationPath = storage_path('/app/public');
            $file->move($destinationPath,$file->getClientOriginalName()); 
        }
        $company->name = $r->name;
        $company->email = $r->email;
        $company->website = $r->website;
        $company->save();
        return redirect('/company')->with('message',"Company Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = $this->company::find($id);
        $company->delete();
        return redirect('/company')->with('message',"Company Deleted Successfully");
    }

    public function sendmail($name){
        


# Instantiate the client.
$mgClient = new Mailgun('86b0418789d35a4f02d5c780cb269926-324e0bb2-0b8c2d9c');
$domain = "sandboxabafa48c6dc94180ac97b8eb7fe24c40.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage("$domain",
    array('from'    => 'Mailgun Sandbox <postmaster@sandboxabafa48c6dc94180ac97b8eb7fe24c40.mailgun.org>',
          'to'      => 'salman khan <salmannexusfleck@gmail.com>',
          'subject' => 'Hello salman khan',
          'text'    => 'Congratulations salman khan, you just sent an email with Mailgun!  You are truly awesome! '));













//         $data = [];
//         $data['name'] = $name;
//         Mail::send('mail', $data, function($message) {
//     $message->to('sameer143320@gmail.com',  'salman');
//     $message->from('salmannexusfleck@gmail.com', 'dsfd'); 
//     $message->subject('Hi there');
// });


    }
}