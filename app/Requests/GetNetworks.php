<?php

namespace App\Requests;


use jamesvweston\Utilities\ArrayUtil AS AU;

class GetNetworks extends BaseIndexRequest
{

    /**
     * @var string|null
     */
    protected $labels;

    /**
     * @var string|null
     */
    protected $shorthands;


    public function __construct($data = [])
    {
        parent::__construct($data);

        $this->labels                   = AU::get($data['labels']);
        $this->shorthands               = AU::get($data['shorthands']);
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
     * @return null|string
     */
    public function getShorthands()
    {
        return $this->shorthands;
    }

    /**
     * @param null|string $shorthands
     */
    public function setShorthands($shorthands)
    {
        $this->shorthands = $shorthands;
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
        return ['id', 'label',  'shorthand', 'order'];
    }

}