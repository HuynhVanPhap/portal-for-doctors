<?php

namespace App\Repositories\Doctor;

use App\Repositories\BaseRepository;
use App\Repositories\Doctor\DoctorInterface;
use App\Traits\UploadFile as TraitsUploadFile;
use App\Models\Doctor;
use Illuminate\Support\Facades\Session;

class DoctorRepository extends BaseRepository implements DoctorInterface
{
    use TraitsUploadFile;

    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return \App\Models\Doctor::class;
    }

    public function createDoctor(array $params): void {
        $params['image'] = $this->upload($params['image'], $params['name']);

        if ($this->model->create($params)) {
            Session::flash('success', 'A new doctor is created successfully !');
        }

        Session::flash('fail', 'Create new is fail !');
    }
}
