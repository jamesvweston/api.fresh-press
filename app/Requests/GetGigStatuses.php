<?php

namespace App\Requests;


use App\Requests\Traits\QueryNames;
use jamesvweston\Utilities\ArrayUtil AS AU;


class GetGigStatuses extends BaseIndexRequest
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
        return 'gig_status.id';
    }

    /**
     * @return array
     */
    public function getOrderByFields()
    {
        return ['gig_status.id', 'gig_status.name'];
    }

}