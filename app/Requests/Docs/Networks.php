<?php

/**
 * @SWG\Get(
 *      path="/networks",
 *      summary="Get a list of networks",
 *      tags={"networks"},
 *      operationId="GetNetworks",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/ids"),
 *      @SWG\Parameter(ref="#/parameters/page"),
 *      @SWG\Parameter(ref="#/parameters/per_page"),
 *      @SWG\Parameter(ref="#/parameters/order_by"),
 *      @SWG\Parameter(ref="#/parameters/direction"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(ref="#/definitions/GetNetworks")
 *     )
 *  )
 * )
 *
 *
 *
 * @SWG\Get(
 *      path="/networks/{id}",
 *      summary="Get a Network by it's id",
 *      description="Returns a Network",
 *      tags={"networks"},
 *      operationId="ShowNetworkRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/network_id"),
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/Network")
 *     )
 * )
 */


/**
 * @SWG\Parameter(
 *      parameter="network_id",
 *      description="Network Id",
 *      in="path",
 *      name="id",
 *      required=true,
 *      type="integer"
 *  )
 */



/**
 * @SWG\Definition(
 *      definition="GetNetworks",
 *      allOf={@SWG\Schema(ref="#/definitions/PaginatedResults")},
 *      properties={
 *          @SWG\Property(
 *              property="data",
 *              type="array",
 *              @SWG\Items(ref="#/definitions/Network")
 *          )
 *      }
 *  )
 *
 *
 * @SWG\Definition(
 *      definition="Network",
 *      properties={
 *          @SWG\Property(
 *              property="id",
 *              type="integer",
 *              example=1
 *          ),
 *          @SWG\Property(
 *              property="label",
 *              type="string",
 *              example="Commission Junction"
 *          ),
 *          @SWG\Property(
 *              property="shorthand",
 *              type="string",
 *              example="CJ"
 *          )
 *      }
 *  )
 */