<?php

namespace App\Services;

use App\Models\Company;
use Broobe\Services\Service;
use Broobe\Services\Traits\{CreateModel, DestroyModel, ReadModel, UpdateModel};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ramsey\Collection\Collection;

final class CompanyService extends Service
{
    use CreateModel, ReadModel, UpdateModel, DestroyModel;
    //
    protected function setModel(): void
    {
        $this->model = Company::class;
    }

    public function all(): Collection
    {
        return $this->model::withTrashed()->get();
    }
    public function restore($id)
    {
        return $this->model::withTrashed()->find($id)->restore();
    }

    public function create(Request $request): Model
    {
        $url = '';
        if($request->hasFile('img')){
            $image = $request->file('img')->store('public/companies');
            $url = Storage::url($image);
        }
        return Company::create(
            [
                'name'          =>$request->get('name'),
                'email'         =>$request->get('email'),
                'web'           =>$request->get('web'),
                'img'           =>$url
            ]
        );
    }

    public function update(Company $model, Request $request): Model
    {
        $updateCompany =  Company::query();
        $updateCompany->where('id',$model->id);
        $updateCompany->update(  [
            'name'          =>$request->get('name'),
            'email'         =>$request->get('email'),
            'web'           =>$request->get('web'),
        ]);

        $url = '';
        if($request->hasFile('img')){
            $image = $request->file('img')->store('public/companies');
            $url = Storage::url($image);
            if($model->img != '')
            {
                unlink(public_path($model->img));
            }
            $updateCompany->update(['img' => $url]);
        }

        return $model;

    }


}
