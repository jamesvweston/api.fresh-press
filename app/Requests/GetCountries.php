<?php

namespace App\Requests;


class GetCountries extends BaseIndexRequest
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
        return 'country.id';
    }

    /**
     * @return array
     */
    public function getOrderByFields()
    {
        return ['country.id', 'country.name', 'country.code'];
    }

}