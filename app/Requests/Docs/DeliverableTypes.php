<?php


/**
 * @SWG\Get(
 *      path="/deliverable_types",
 *      summary="Get a list of deliverable_types",
 *      tags={"deliverable_types"},
 *      operationId="GetDeliverableTypes",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/ids"),
 *      @SWG\Parameter(ref="#/parameters/page"),
 *      @SWG\Parameter(ref="#/parameters/per_page"),
 *      @SWG\Parameter(ref="#/parameters/order_by"),
 *      @SWG\Parameter(ref="#/parameters/direction"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(ref="#/definitions/GetDeliverableTypes")
 *     )
 *  )
 *
 *
 *
 * @SWG\Get(
 *      path="/deliverable_types/{id}",
 *      summary="Get a DeliverableType by it's id",
 *      description="Returns a DeliverableType",
 *      tags={"deliverable_types"},
 *      operationId="ShowDeliverableTypeRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/deliverable_type_id"),
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/DeliverableType")
 *     )
 *  )
 */


/**
 * @SWG\Parameter(
 *      parameter="deliverable_type_id",
 *      description="DeliverableType Id",
 *      in="path",
 *      name="id",
 *      required=true,
 *      type="integer"
 *  )
 */




/**
 * @SWG\Definition(
 *      definition="GetDeliverableTypes",
 *      allOf={@SWG\Schema(ref="#/definitions/PaginatedResults")},
 *      properties={
 *          @SWG\Property(
 *              property="data",
 *              type="array",
 *              @SWG\Items(ref="#/definitions/DeliverableType")
 *          )
 *      }
 *  )
 *
 *
 * @SWG\Definition(
 *      definition="DeliverableType",
 *      properties={
 *          @SWG\Property(
 *              property="id",
 *              type="integer",
 *              example=1
 *          ),
 *          @SWG\Property(
 *              property="name",
 *              type="string",
 *              example="Blog Post w/ Social Shares"
 *          )
 *      }
 *  )
 */
