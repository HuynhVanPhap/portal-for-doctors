<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * Class BaseRepository
 * @package App\Repositories
 */

abstract class BaseRepository implements RepositoryInterface
{
    /**
     * @var Illuminate\Database\Eloquent\Model $model
     */
    protected $model;

    const LIMIT = 10;

    public function __construct()
    {
        $this->setModel();
    }

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Get Model
     */
    abstract public function getModel();

    /**
     * @inheritdoc
     */
    public function getList(...$column): Collection
    {
        return $this->model->select(...$column)->get();
    }

    /**
     * @inheritdoc
     */
    public function update($id, $params): bool
    {
        return $this->model->where('id', $id)
            ->update($params);
    }

    public function getListPaginates($limit = self::LIMIT)
    {
        return $this->model->select()->orderBy('id','DESC')
            ->paginate($limit);
    }

    /**
     * @inheritdoc
     */
    public function create($params): Model
    {
        return $this->model->create($params);
    }

    /**
     * @inheritdoc
     */
    public function delete($id): bool
    {
        return $this->model->destroy($id);
    }

    /**
     * @inheritdoc
     */
    public function getById($id): Model
    {
        return $this->model->where('id', $id)
            ->first();
    }

    public function inserts($params)
    {
        return $this->model->insert($params);
    }

    public function getListByTake($take)
    {
        $data = $this->model
            ->orderBy('id', 'DESC')
            ->take($take)
            ->get();

        return $data;
    }

    public function getListDESC($limit = self::LIMIT)
    {
        return $this->model->orderBy('id', 'DESC')->limit($limit)->get();
    }

    public function getListByArrIds($params)
    {
        return $this->model->whereIn('id',$params)->get();
    }

    public function countNewToday()
    {
        return $this->model->whereDate('created_at', Carbon::now('Asia/Ho_Chi_Minh')->toDateString())->count();
    }
}
