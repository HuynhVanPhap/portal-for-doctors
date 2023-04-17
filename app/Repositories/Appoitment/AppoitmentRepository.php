<?php

namespace App\Repositories\Appoitment;

use App\Repositories\BaseRepository;
use App\Repositories\Appoitment\AppoitmentInterface;

class AppoitmentRepository extends BaseRepository implements AppoitmentInterface
{
    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return \App\Models\Appointment::class;
    }
}
