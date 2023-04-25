<?php

namespace App\Repositories\Appointment;

use Illuminate\Pagination\LengthAwarePaginator;

interface AppointmentInterface {

    /**
     * Get the user's appointment
     *
     * @param int $userId
     * @param int $limit
     * @param array|string $column
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function getUserAppointments(int $userId, int $limit, array|string $column): LengthAwarePaginator;
}

