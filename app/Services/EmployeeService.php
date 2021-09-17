<?php

namespace App\Services;

use App\Models\Company;
use App\Models\Employee;
use Broobe\Services\Service;
use Broobe\Services\Traits\{CreateModel, DestroyModel, ReadModel, UpdateModel};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

final class EmployeeService extends Service
{
    use CreateModel, ReadModel, UpdateModel, DestroyModel;

    /**
     * Set model class name.
     *
     * @return void
     */
    protected function setModel(): void
    {
        $this->model = Employee::class;
    }

    public function create(Request $request): Model
    {
        $createEmployee = Employee::create([
            'name'              =>$request->get('name'),
            'lastname'  =>$request->get('lastname'),
            'email'       =>$request->get('email'),
            'phone'        =>$request->get('phone'),
        ]);

        $createEmployee->company()->associate(Company::find($request->get('company_id')));
        $createEmployee->save();
        return $createEmployee;

    }

    public function update(Employee $model, Request $request): Model
    {
        $updateEmployee = Employee::query();
            $updateEmployee->where('id',$model->id);
        $updateEmployee->update([
            'name'              =>$request->get('name'),
            'lastname'  =>$request->get('lastname'),
            'email'       =>$request->get('email'),
            'phone'        =>$request->get('phone'),
        ]);
        return $this->save($model,$request);
    }
    public function save(Model $employee, Request $request)
    {
        $employee->company()->associate(Company::find($request->get('company_id')));
        $employee->save();

        return $employee;

    }
}
