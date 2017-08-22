<?php

/**
 * @SWG\Get(
 *      path="/opportunities",
 *      summary="Get a list of opportunities",
 *      tags={"opportunities"},
 *      operationId="GetOpportunities",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/ids"),
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
 *          @SWG\Schema(ref="#/definitions/GetOpportunities")
 *     )
 *  )
 * )
 *
 *
 *
 * @SWG\Get(
 *      path="/opportunities/{id}",
 *      summary="Get a Opportunity by it's id",
 *      description="Returns a Opportunity",
 *      tags={"opportunities"},
 *      operationId="ShowOpportunityRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/opportunity_id"),
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/Opportunity")
 *     )
 * )
 *
 *
 *
 * @SWG\Get(
 *      path="/opportunities/{id}/bids",
 *      summary="Get Opportunity's bids",
 *      description="Returns the Opportunity's bids",
 *      tags={"opportunities"},
 *      operationId="GetOpportunityBids",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/opportunity_id"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(
 *              type="array",
 *              @SWG\Items(ref="#/definitions/Bid")
 *          )
 *      )
 * )
 *
 *
 *
 * @SWG\Get(
 *      path="/opportunities/{id}/compensation_models",
 *      summary="Get Opportunity's compensation_models",
 *      description="Returns the Opportunity's compensation_models",
 *      tags={"opportunities"},
 *      operationId="GetOpportunityCompensationModels",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/opportunity_id"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(
 *              type="array",
 *              @SWG\Items(ref="#/definitions/CompensationModel")
 *          )
 *      )
 * )
 *
 *
 *
 * @SWG\Get(
 *      path="/opportunities/{id}/creatives",
 *      summary="Get Opportunity's creatives",
 *      description="Returns the Opportunity's creatives",
 *      tags={"opportunities"},
 *      operationId="GetOpportunityCreatives",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/opportunity_id"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(
 *              type="array",
 *              @SWG\Items(ref="#/definitions/OpportunityCreative")
 *          )
 *      )
 * )
 */


/**
 * @SWG\Parameter(
 *      parameter="opportunity_id",
 *      description="Opportunity Id",
 *      in="path",
 *      name="id",
 *      required=true,
 *      type="integer"
 *  )
 */


/**
 * @SWG\Definition(
 *      definition="GetOpportunities",
 *      allOf={@SWG\Schema(ref="#/definitions/PaginatedResults")},
 *      properties={
 *          @SWG\Property(
 *              property="data",
 *              type="array",
 *              @SWG\Items(ref="#/definitions/Opportunity")
 *          )
 *      }
 *  )
 */