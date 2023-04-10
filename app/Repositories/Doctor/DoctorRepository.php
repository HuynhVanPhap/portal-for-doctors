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
}
