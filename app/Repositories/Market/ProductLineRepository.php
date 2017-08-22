<?php

namespace App\Repositories\Market;


use App\Models\Market\ProductLine;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryContract;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductLineRepository extends BaseRepository implements RepositoryContract
{

    /**
     * @param   array $params
     * @param   bool $paginate_results
     * @return  ProductLine[]|LengthAwarePaginator
     */
    public function where ($params = [], $paginate_results = false)
    {

    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getQuery ()
    {
        return ProductLine::query()->with($this->with());
    }

    /**
     * @return array
     */
    public function with ()
    {
        return [];
    }

    /**
     * @param   int $id
     * @return  ProductLine|null
     */
    public function find($id)
    {
        return ProductLine::query()->with($this->with())->find($id);
    }

}