<?php

namespace App\Requests;


/**
 * @SWG\Get(
 *      path="/countries",
 *      summary="Get a list of countries",
 *      tags={"countries"},
 *      operationId="GetCountries",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="ids",
 *          in="query",
 *          type="string",
 *          required=false,
 *          description="Country ids"
 *      ),
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