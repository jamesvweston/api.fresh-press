<?php


/**
 * @SWG\Get(
 *      path="/campaigns",
 *      summary="Get a list of campaigns",
 *      tags={"campaigns"},
 *      operationId="GetCampaigns",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="ids",
 *          in="query",
 *          type="string",
 *          required=false,
 *          description="Campaign ids"
 *      ),
 *      @SWG\Parameter(ref="#/parameters/page"),
 *      @SWG\Parameter(ref="#/parameters/per_page"),
 *      @SWG\Parameter(ref="#/parameters/order_by"),
 *      @SWG\Parameter(ref="#/parameters/direction"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Definition(
 *              definition="GetCampaignsResponse",
 *          @SWG\Property(
 *             property="current_page",
 *             type="integer",
 *             example="1"
 *         ),
 *          @SWG\Property(
 *              property="data",
 *              type="array",
 *              @SWG\Items(ref="#/definitions/Campaign")
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
 *      path="/campaigns/{id}",
 *      summary="Get a Campaign by it's id",
 *      description="Returns a Campaign",
 *      tags={"campaigns"},
 *      operationId="ShowCampaignRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="id",
 *          in="path",
 *          type="integer",
 *          required=true,
 *          description="Campaign Id"
 *     ),
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/Campaign")
 *     ),
 *      @SWG\Response(
 *          response=403,
 *          description="Unauthorized to complete this operation"
 *      ),
 * )
 */