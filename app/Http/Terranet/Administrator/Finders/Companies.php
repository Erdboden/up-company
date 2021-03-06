<?php

namespace App\Http\Terranet\Administrator\Finders;

use Terranet\Administrator\Services\Finder;

class Companies extends Finder
{
    /**
     * Fetch all items from repository
     *
     * @return mixed
     */
    public function fetchAll()
    {
        return $this->getQuery()->paginate($this->perPage());
    }

    /**
     * Find a record by id
     *
     * @param       $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = ['*'])
    {
        $this->model = $this->model->newQueryWithoutScopes()->findOrFail($id, $columns);

        return $this->model;
    }
    public function getQuery()
    {
        return parent::getQuery()
            ->with('portfolio');
    }
}