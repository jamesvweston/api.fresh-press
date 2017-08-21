<?php

namespace App\Requests;


class GetAgeRanges extends BaseIndexRequest
{

    public function __construct($data = [])
    {
        parent::__construct($data);
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
        return ['id', 'label', 'min_age', 'max_age'];
    }

}