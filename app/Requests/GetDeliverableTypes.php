<?php

namespace App\Requests;


use jamesvweston\Utilities\ArrayUtil AS AU;

class GetDeliverableTypes extends BaseIndexRequest
{

    /**
     * @var string|null
     */
    protected $labels;


    public function __construct($data = [])
    {
        parent::__construct($data);

        $this->labels                   = AU::get($data['labels']);
    }

    public function validate()
    {
        parent::validate();
    }

    /**
     * @return null|string
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * @param null|string $labels
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;
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
        return ['id', 'label'];
    }

}