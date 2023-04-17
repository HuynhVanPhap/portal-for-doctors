<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppoitmentService
{
    public function processingData(Request $request): array|null {
        $params = $request->only([
            'name', 'email', 'date', 'doctor_id', 'phone', 'message'
        ]);

        if (Auth::id() && (int) Auth::user()->usertype === 0) {
            $params['user_id'] = Auth::user()->id;
        }

        return $params;
    }
}
