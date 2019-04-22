<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Employee;

class CompanyEmployeesController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Company $company)
    {
        return view('companies.employees.create',compact('company'));
    }

    public function store(Request $request,Company $company)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'email' => 'required|string|min:3',
            'phone' => 'required|string|min:3'
        ]);

        $validated['company_id'] = $company->id;

        Employee::create($validated);

        return redirect('/companies/'.$company->id);
    }

    public function edit(Company $company,Employee $employee) 
    {
        return view('companies.employees.edit',compact('company','employee'));
    }

    public function update(Request $request,Company $company,Employee $employee)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'email' => 'required|string|min:3',
            'phone' => 'required|string|min:3'
        ]); 

        Employee::whereId($employee->id)->update($validated);

        return redirect()->route('companies.show',compact('company'));
    }
    public function destroy(Company $company,Employee $employee) 
    {
        $employee->delete();
        
        return redirect()->route('companies.show',compact('company'));
    }
}
