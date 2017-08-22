<?php

/**
 * @SWG\Get(
 *      path="/gig_statuses",
 *      summary="Get a list of gig_statuses",
 *      tags={"gig_statuses"},
 *      operationId="GetGigStatuses",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/ids"),
 *      @SWG\Parameter(ref="#/parameters/page"),
 *      @SWG\Parameter(ref="#/parameters/per_page"),
 *      @SWG\Parameter(ref="#/parameters/order_by"),
 *      @SWG\Parameter(ref="#/parameters/direction"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(ref="#/definitions/GetGigStatuses")
 *     )
 *  )
 *
 *
 *
 * @SWG\Get(
 *      path="/gig_statuses/{id}",
 *      summary="Get a GigStatus by it's id",
 *      description="Returns a GigStatus",
 *      tags={"gig_statuses"},
 *      operationId="ShowGigStatusRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/gig_status_id"),
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/GigStatus")
 *     )
 * )
 */



/**
 * @SWG\Parameter(
 *      parameter="gig_status_id",
 *      description="GigStatus Id",
 *      in="path",
 *      name="id",
 *      required=true,
 *      type="integer"
 *  )
 */



/**
 * @SWG\Definition(
 *      definition="GetGigStatuses",
 *      allOf={@SWG\Schema(ref="#/definitions/PaginatedResults")},
 *      properties={
 *          @SWG\Property(
 *              property="data",
 *              type="array",
 *              @SWG\Items(ref="#/definitions/GigStatus")
 *          )
 *      }
 *  )
 *
 *
 * @SWG\Definition(
 *      definition="GigStatus",
 *      properties={
 *          @SWG\Property(
 *              property="id",
 *              type="integer",
 *              example=1
 *          ),
 *          @SWG\Property(
 *              property="name",
 *              type="string",
 *              example="Pending"
 *          )
 *      }
 *  )
 */