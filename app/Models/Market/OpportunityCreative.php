<?php

namespace App\Models\Market;


use Illuminate\Database\Eloquent\Model;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @SWG\Definition()
 *
 * @property    int                             $id
 * @property    string                          $url
 * @property    Opportunity                     $opportunity
 */
class OpportunityCreative extends Model
{

    /**
     * @SWG\Property()
     * @var int
     */
    protected $id;

    /**
     * @SWG\Property()
     * @var string
     */
    protected $url;

    /**
     * @var Opportunity
     */
    protected $opportunity;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->url                      = AU::get($data['url']);
        $this->opportunity              = AU::get($data['opportunity']);
    }

    /**
     * @return array
     */
    public function toArray ()
    {
        $object['id']                   = $this->id;
        $object['url']                  = $this->url;

        return $object;
    }

}