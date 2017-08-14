<?php

namespace App\Requests;


use App\Requests\Traits\QueryCreatedDates;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @SWG\Get(
 *      path="/advertisers",
 *      summary="Get a list of advertisers",
 *      tags={"advertisers"},
 *      operationId="GetAdvertisers",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="ids",
 *          in="query",
 *          type="string",
 *          required=false,
 *          description="Advertiser ids"
 *      ),
 *      @SWG\Parameter(ref="#/parameters/created_from"),
 *      @SWG\Parameter(ref="#/parameters/created_to"),
 *      @SWG\Parameter(ref="#/parameters/page"),
 *      @SWG\Parameter(ref="#/parameters/per_page"),
 *      @SWG\Parameter(ref="#/parameters/order_by"),
 *      @SWG\Parameter(ref="#/parameters/direction"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation"
 *      ),
 * )
 */
class GetAdvertisers extends BaseIndexRequest
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
        return 'advertiser.id';
    }

    /**
     * @return array
     */
    public function getOrderByFields()
    {
        return ['advertiser.id', 'advertiser.name', 'advertiser.created_at', 'advertiser.updated_at'];
    }

}