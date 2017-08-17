<?php

/**
 * @SWG\Get(
 *      path="/opportunities",
 *      summary="Get a list of opportunities",
 *      tags={"opportunities"},
 *      operationId="GetOpportunities",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="ids",
 *          in="query",
 *          type="string",
 *          required=false,
 *          description="Opportunity ids"
 *      ),
 *      @SWG\Parameter(ref="#/parameters/advertiser_ids"),
 *      @SWG\Parameter(ref="#/parameters/campaign_ids"),
 *      @SWG\Parameter(ref="#/parameters/deliverable_type_ids"),
 *      @SWG\Parameter(ref="#/parameters/product_line_ids"),
 *      @SWG\Parameter(ref="#/parameters/page"),
 *      @SWG\Parameter(ref="#/parameters/per_page"),
 *      @SWG\Parameter(ref="#/parameters/order_by"),
 *      @SWG\Parameter(ref="#/parameters/direction"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Definition(
 *              definition="GetOpportunitiesResponse",
 *          @SWG\Property(
 *             property="current_page",
 *             type="integer",
 *             example="1"
 *         ),
 *          @SWG\Property(
 *              property="data",
 *              type="array",
 *              @SWG\Items(ref="#/definitions/Opportunity")
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
 *      path="/opportunities/{id}",
 *      summary="Get a Opportunity by it's id",
 *      description="Returns a Opportunity",
 *      tags={"opportunities"},
 *      operationId="ShowOpportunityRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="id",
 *          in="path",
 *          type="integer",
 *          required=true,
 *          description="Opportunity Id"
 *     ),
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/Opportunity")
 *     ),
 *      @SWG\Response(
 *          response=403,
 *          description="Unauthorized to complete this operation"
 *      ),
 * )
 */


/**
 * @SWG\Get(
 *      path="/opportunities/{id}/bids",
 *      summary="Get Opportunity's bids",
 *      description="Returns the Opportunity's bids",
 *      tags={"opportunities"},
 *      operationId="GetOpportunityBids",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="id",
 *          in="path",
 *          type="integer",
 *          required=true,
 *          description="Opportunity Id"
 *     ),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(
 *          type="array",
 *          @SWG\Items(ref="#/definitions/Bid")
 *      )
 *      ),
 *      @SWG\Response(
 *          response=403,
 *          description="Unauthorized to complete this operation"
 *      ),
 * )
 */


/**
 * @SWG\Get(
 *      path="/opportunities/{id}/compensation_models",
 *      summary="Get Opportunity's compensation_models",
 *      description="Returns the Opportunity's compensation_models",
 *      tags={"opportunities"},
 *      operationId="GetOpportunityCompensationModels",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="id",
 *          in="path",
 *          type="integer",
 *          required=true,
 *          description="Opportunity Id"
 *     ),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(
 *          type="array",
 *          @SWG\Items(ref="#/definitions/CompensationModel")
 *      )
 *      ),
 *      @SWG\Response(
 *          response=403,
 *          description="Unauthorized to complete this operation"
 *      ),
 * )
 */


/**
 * @SWG\Get(
 *      path="/opportunities/{id}/creatives",
 *      summary="Get Opportunity's creatives",
 *      description="Returns the Opportunity's creatives",
 *      tags={"opportunities"},
 *      operationId="GetOpportunityCreatives",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="id",
 *          in="path",
 *          type="integer",
 *          required=true,
 *          description="Opportunity Id"
 *     ),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(
 *          type="array",
 *          @SWG\Items(ref="#/definitions/OpportunityCreative")
 *      )
 *      ),
 *      @SWG\Response(
 *          response=403,
 *          description="Unauthorized to complete this operation"
 *      ),
 * )
 */