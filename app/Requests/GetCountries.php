<?php

namespace App\Requests;


use jamesvweston\Utilities\ArrayUtil AS AU;

class GetCountries extends BaseIndexRequest
{

    /**
     * @var string|null
     */
    protected $codes;

    public function __construct($data = [])
    {
        parent::__construct($data);

        $this->codes                    = AU::get($data['codes']);
    }

    public function validate()
    {
        parent::validate();
    }

    /**
     * @return null|string
     */
    public function getCodes()
    {
        return $this->codes;
    }

    /**
     * @param null|string $codes
     */
    public function setCodes($codes)
    {
        $this->codes = $codes;
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
        return ['id', 'name', 'code'];
    }

}