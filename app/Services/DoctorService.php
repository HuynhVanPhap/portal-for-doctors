<?php

namespace App\Services;

use App\Traits\UploadFile as TraitsUploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DoctorService
{
    use TraitsUploadFile;

    /**
     * Processing data before action
     *
     * @param Request $request
     * @return array|null
     */
    public function processingData(Request $request): array|null {
        $params = $request->only([
            'room_id', 'name', 'phone', 'speciality', 'image'
        ]);

        if (isset($params['image'])) {
            $params['image'] = $this->upload($params['image'], $params['name']);

            return (!is_null($params['image'])) ? $params : null;
        }

        return $params;
    }
}
