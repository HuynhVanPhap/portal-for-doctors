<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    /**
     * Get all data
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getList(...$column): Collection;

    /**
     * Create new Model
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function create(array $params): Model;

    /**
     * Update by Id
     *
     * @return boolean
     */
    public function update(int $id, array $params): bool;

    /**
     * Delete by Id
     *
     * @return boolean
     */
    public function delete(int $id): bool;

    /**
     * Get Model by Id
     *
     * @return Illuminate\Database\Eloquent\Model`
     */
    public function getById(int $id): Model;
}
