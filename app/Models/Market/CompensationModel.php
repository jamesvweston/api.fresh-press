<?php

namespace App\Models\Market;


use Illuminate\Database\Eloquent\Model;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @SWG\Definition()
 *
 * @property    int                             $id
 */
abstract class CompensationModel extends Model
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var Opportunity
     */
    protected $opportunity;


    public function __construct($data = [])
    {
        $this->opportunity              = AU::get($data['opportunity']);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $object['id']                   = $this->getId();
        $object['type']                 = $this->getType();

        return $object;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Opportunity
     */
    public function getOpportunity()
    {
        return $this->opportunity;
    }

    /**
     * @param Opportunity $opportunity
     */
    public function setOpportunity($opportunity)
    {
        $this->opportunity = $opportunity;
    }

    /**
     * @return string
     */
    abstract function getType ();

}