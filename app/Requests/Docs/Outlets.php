<?php


/**
 * @SWG\Get(
 *      path="/outlets",
 *      summary="Get a list of outlets",
 *      tags={"outlets"},
 *      operationId="GetOutlets",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/ids"),
 *      @SWG\Parameter(ref="#/parameters/page"),
 *      @SWG\Parameter(ref="#/parameters/per_page"),
 *      @SWG\Parameter(ref="#/parameters/order_by"),
 *      @SWG\Parameter(ref="#/parameters/direction"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(ref="#/definitions/GetOutlets")
 *     )
 *  )
 *
 *
 *
 * @SWG\Get(
 *      path="/outlets/{id}",
 *      summary="Get a Outlet by it's id",
 *      description="Returns a Outlet",
 *      tags={"outlets"},
 *      operationId="ShowOutlet",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/outlet_id"),
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/Outlet")
 *     ),
 *      @SWG\Response(
 *          response=403,
 *          description="Unauthorized to complete this operation"
 *      )
 * )
 */



/**
 * @SWG\Parameter(
 *      parameter="outlet_id",
 *      description="Outlet Id",
 *      in="path",
 *      name="id",
 *      required=true,
 *      type="integer"
 *  )
 */



/**
 * @SWG\Definition(
 *      definition="GetOutlets",
 *      allOf={@SWG\Schema(ref="#/definitions/PaginatedResults")},
 *      properties={
 *          @SWG\Property(
 *              property="data",
 *              type="array",
 *              @SWG\Items(ref="#/definitions/Outlet")
 *          )
 *      }
 *  )
 *
 *
 * @SWG\Definition(
 *      definition="Outlet",
 *      properties={
 *          @SWG\Property(
 *              property="id",
 *              type="integer",
 *              example=1
 *          ),
 *          @SWG\Property(
 *              property="name",
 *              type="string",
 *              example="Blog"
 *          )
 *      }
 *  )
 */