<?php

namespace App\Requests;


use App\Requests\Traits\QueryNames;
use jamesvweston\Utilities\ArrayUtil AS AU;

class GetPortfolioTypes extends BaseIndexRequest
{

    use QueryNames;


    public function __construct($data = [])
    {
        parent::__construct($data);

        $this->setNames(AU::get($data['names']));
    }

    public function validate()
    {
        parent::validate();
    }

    /**
     * @return string
     */
    public function getDefaultOrderBy()
    {
        return 'id';
    }

    /**
     * @return array
     */
    public function getOrderByFields()
    {
        return ['id', 'name'];
    }

}