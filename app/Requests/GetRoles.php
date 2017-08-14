<?php

namespace App\Requests;


use App\Requests\Traits\QueryNames;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @SWG\Get(
 *      path="/roles",
 *      summary="Get a list of roles",
 *      tags={"roles"},
 *      operationId="GetRoles",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="ids",
 *          in="query",
 *          type="string",
 *          required=false,
 *          description="Role ids"
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
class GetRoles extends BaseIndexRequest
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
        return 'role.id';
    }

    /**
     * @return array
     */
    public function getOrderByFields()
    {
        return ['role.id', 'role.name'];
    }

}