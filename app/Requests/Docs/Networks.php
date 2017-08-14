<?php

/**
 * @SWG\Get(
 *      path="/networks",
 *      summary="Get a list of networks",
 *      tags={"networks"},
 *      operationId="GetNetworks",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="ids",
 *          in="query",
 *          type="string",
 *          required=false,
 *          description="Network ids"
 *      ),
 *      @SWG\Parameter(ref="#/parameters/page"),
 *      @SWG\Parameter(ref="#/parameters/per_page"),
 *      @SWG\Parameter(ref="#/parameters/order_by"),
 *      @SWG\Parameter(ref="#/parameters/direction"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Definition(
 *              definition="GetNetworksResponse",
 *          @SWG\Property(
 *             property="current_page",
 *             type="integer",
 *             example="1"
 *         ),
 *          @SWG\Property(
 *              property="data",
 *              type="array",
 *              @SWG\Items(ref="#/definitions/Network")
 *         ),
 *          @SWG\Property(
 *             property="from",
 *             type="integer",
 *             example="1"
 *         ),
 *          @SWG\Property(
 *             property="last_page",
 *             type="integer",
 *             example="1"
 *         ),
 *          @SWG\Property(
 *             property="next_page_url",
 *             type="string"
 *         ),
 *          @SWG\Property(
 *             property="path",
 *             type="string"
 *         ),
 *          @SWG\Property(
 *             property="per_page",
 *             type="integer",
 *             example="20"
 *         ),
 *          @SWG\Property(
 *             property="prev_page_url",
 *             type="string"
 *         ),
 *          @SWG\Property(
 *             property="to",
 *             type="integer",
 *             example="20"
 *         ),
 *           @SWG\Property(
 *             property="total",
 *             type="integer",
 *             example="100"
 *         ),
 *     ),
 *  ),
 * )
 */


/**
 * @SWG\Get(
 *      path="/networks/{id}",
 *      summary="Get a Network by it's id",
 *      description="Returns a Network",
 *      tags={"networks"},
 *      operationId="ShowNetworkRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="id",
 *          in="path",
 *          type="integer",
 *          required=true,
 *          description="Network Id"
 *     ),
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/Network")
 *     ),
 *      @SWG\Response(
 *          response=403,
 *          description="Unauthorized to complete this operation"
 *      ),
 * )
 */