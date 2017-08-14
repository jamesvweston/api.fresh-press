<?php

namespace App\Requests;


use App\Requests\Traits\RequestValidation;
use jamesvweston\Utilities\ArrayUtil AS AU;


abstract class BaseIndexRequest
{

    use RequestValidation;

    /**
     * @var int
     */
    protected $page;

    /**
     * @var int
     */
    protected $per_page;

    /**
     * @var string
     */
    protected $order_by;

    /**
     * @var string
     */
    protected $direction;

    /**
     * @var string|null
     */
    protected $ids;


    /**
     * BaseGetRequest constructor.
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->page                     = AU::get($data['page'], 1);
        $this->per_page                 = AU::get($data['per_page'], 20);
        $this->order_by                 = AU::get($data['order_by'], $this->getDefaultOrderBy());
        $this->direction                = AU::get($data['direction'], 'ASC');
        $this->ids                      = AU::get($data['ids']);
    }

    public function validate ()
    {
        $this->page                     = $this->validateInteger($this->page, 'page');
        $this->per_page                 = $this->validateInteger($this->per_page, 'per_page');
        $this->validateInArray($this->getOrderByFields(), $this->order_by, 'order_by');
        $this->direction                = $this->validateDirection($this->direction);
        $this->ids                      = $this->validateIds($this->ids, 'ids');
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param int $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * @return int
     */
    public function getPerPage()
    {
        return $this->per_page;
    }

    /**
     * @param int $per_page
     */
    public function setPerPage($per_page)
    {
        $this->per_page = $per_page;
    }

    /**
     * @return string
     */
    public function getOrderBy()
    {
        return $this->order_by;
    }

    /**
     * @param string $order_by
     */
    public function setOrderBy($order_by)
    {
        $this->order_by = $order_by;
    }

    /**
     * @return string
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * @param string $direction
     */
    public function setDirection($direction)
    {
        $this->direction = $direction;
    }

    /**
     * @return null|string
     */
    public function getIds()
    {
        return $this->ids;
    }

    /**
     * @param null|string $ids
     */
    public function setIds($ids)
    {
        $this->ids = $ids;
    }

    /**
     * @return string
     */
    abstract function getDefaultOrderBy ();

    /**
     * @return array
     */
    abstract function getOrderByFields ();

}