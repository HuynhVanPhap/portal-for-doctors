<?php

namespace App\Repositories\Appointment;

use App\Repositories\BaseRepository;
use App\Repositories\Appointment\AppointmentInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class AppointmentRepository extends BaseRepository implements AppointmentInterface
{
    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return \App\Models\Appointment::class;
    }

    /**
     * @inheritdoc
     */
    public function getUserAppointments(int $userId, int $limit = self::LIMIT, array|string $column = '*'): LengthAwarePaginator {
        return $this->model->whereUserId($userId)->select($column)->orderBy('id','DESC')
            ->paginate($limit);
    }
}
