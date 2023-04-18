<?php

namespace App\Repositories\Appointment;

use App\Repositories\BaseRepository;
use App\Repositories\Appointment\AppointmentInterface;

class AppointmentRepository extends BaseRepository implements AppointmentInterface
{
    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return \App\Models\Appointment::class;
    }
}
