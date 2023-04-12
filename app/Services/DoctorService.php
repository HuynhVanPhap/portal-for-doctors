<?php

namespace App\Services;

use App\Traits\UploadFile as TraitsUploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DoctorService
{
    use TraitsUploadFile;

    /**
     * Handle data before create
     *
     * @param Request $request
     * @return array|null
     */
    public function handleCreateData(Request $request): array|null {
        $params = $request->only([
            'roomId', 'name', 'phone', 'speciality', 'image'
        ]);

        $params['image'] = $this->upload($params['image'], $params['name']);

        return (!is_null($params['image'])) ? $params : null;
    }
}
