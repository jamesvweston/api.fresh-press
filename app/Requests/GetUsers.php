<?php

namespace App\Requests;


use App\Requests\Traits\QueryCreatedDates;
use jamesvweston\Utilities\ArrayUtil AS AU;


class GetUsers extends BaseIndexRequest
{

    use QueryCreatedDates;


    public function __construct($data = [])
    {
        parent::__construct($data);

        $this->setCreatedFrom(AU::get($data['created_from']));
        $this->setCreatedTo(AU::get($data['created_to']));
    }

    public function validate()
    {
        parent::validate();

        $this->validateCreatedDates();
    }

    /**
     * @return string
     */
    public function getDefaultOrderBy()
    {
        return 'user.id';
    }

    /**
     * @return array
     */
    public function getOrderByFields()
    {
        return ['user.id', 'user.email'];
    }

}