<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use App\Services\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    private $employeeService;
    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index(Request $request)
    {
        $name = $request->get('name');
        $employees = Employee::names($name)->paginate(10);

        return view('employees.index',compact('employees'));
    }

    public function create()
    {
        $action =  route("admin.employees.store");
        $method = 'POST';
        $companies = Company::all();

        return view('employees.create_edit',compact('action','method','companies'));
    }

    public function store(EmployeeRequest $request)
    {

        $this->employeeService->create($request);
        return redirect()->route('admin.employees.index');
    }


    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employees.show', compact('employee'));
    }


    public function edit(Employee $employee)
    {

        $action = route("admin.employees.update",[$employee->id]);
        $method = 'PUT';
        $companies = Company::all();
        return view('employees.create_edit', compact('employee','action','method','companies'));
    }


    public function update(Request $request,Employee $employee)
    {
        $this->employeeService->update($employee,$request);
        return redirect()->route('admin.employees.index');
    }


    public function destroy(Employee $employee)
    {
        $this->employeeService->destroy($employee);
        return redirect()->route('admin.employees.index');
    }
}
