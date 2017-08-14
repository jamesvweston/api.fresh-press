<?php

/**
 * @SWG\Get(
 *      path="/advertisers",
 *      summary="Get a list of advertisers",
 *      tags={"advertisers"},
 *      operationId="GetAdvertisers",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="ids",
 *          in="query",
 *          type="string",
 *          required=false,
 *          description="Advertiser ids"
 *      ),
 *      @SWG\Parameter(ref="#/parameters/created_from"),
 *      @SWG\Parameter(ref="#/parameters/created_to"),
 *      @SWG\Parameter(ref="#/parameters/page"),
 *      @SWG\Parameter(ref="#/parameters/per_page"),
 *      @SWG\Parameter(ref="#/parameters/order_by"),
 *      @SWG\Parameter(ref="#/parameters/direction"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Definition(
 *              definition="GetAdvertisersResponse",
 *          @SWG\Property(
 *             property="current_page",
 *             type="integer",
 *             example="1"
 *         ),
 *          @SWG\Property(
 *              property="data",
 *              type="array",
 *              @SWG\Items(ref="#/definitions/Advertiser")
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
 *      path="/advertisers/{id}",
 *      summary="Get a Advertiser by it's id",
 *      description="Returns a Advertiser",
 *      tags={"advertisers"},
 *      operationId="ShowAdvertiserRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="id",
 *          in="path",
 *          type="integer",
 *          required=true,
 *          description="Advertiser Id"
 *     ),
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/Advertiser")
 *     ),
 *      @SWG\Response(
 *          response=403,
 *          description="Unauthorized to complete this operation"
 *      ),
 * )
 */


/**
 * @SWG\Get(
 *      path="/advertisers/{id}/campaigns",
 *      summary="Get Campaigns for an Advertiser",
 *      description="Returns Campaigns",
 *      tags={"advertisers"},
 *      operationId="ShowAdvertiserCampaignsRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="id",
 *          in="path",
 *          type="integer",
 *          required=true,
 *          description="Advertiser Id"
 *     ),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(
 *          type="array",
 *          @SWG\Items(ref="#/definitions/Campaign")
 *      )
 *      ),
 *      @SWG\Response(
 *          response=403,
 *          description="Unauthorized to complete this operation"
 *      ),
 * )
 */


/**
 * @SWG\Post(
 *      path="/advertisers/{id}/campaigns",
 *      summary="Create a Campaign for an Advertiser",
 *      description="Create Campaign",
 *      tags={"advertisers"},
 *      operationId="CreateCampaign",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="id",
 *          in="path",
 *          type="integer",
 *          required=true,
 *          description="Advertiser Id"
 *     ),
 *      @SWG\Parameter(
 *          name="body",
 *          in="body",
 *          description="Campaign Object",
 *          required=false,
 *          @SWG\Schema(ref="#/definitions/CreateCampaign")
 *      ),
 *      @SWG\Response(
 *         response=201,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/Campaign")
 *     ),
 *      @SWG\Response(
 *          response=403,
 *          description="Unauthorized to complete this operation"
 *      ),
 * )
 */


/**
 * @SWG\Get(
 *      path="/advertisers/{id}/opportunities",
 *      summary="Get Opportunities for an Advertiser",
 *      description="Returns Opportunities",
 *      tags={"advertisers"},
 *      operationId="ShowAdvertiserOpportunitiesRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="id",
 *          in="path",
 *          type="integer",
 *          required=true,
 *          description="Advertiser Id"
 *     ),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(
 *          type="array",
 *          @SWG\Items(ref="#/definitions/Opportunity")
 *      )
 *      ),
 *      @SWG\Response(
 *          response=403,
 *          description="Unauthorized to complete this operation"
 *      ),
 * )
 */


/**
 * @SWG\Post(
 *      path="/advertisers/{id}/opportunities",
 *      summary="Create a Opportunity for an Advertiser",
 *      description="Create Opportunity",
 *      tags={"advertisers"},
 *      operationId="CreateOpportunity",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="id",
 *          in="path",
 *          type="integer",
 *          required=true,
 *          description="Advertiser Id"
 *     ),
 *      @SWG\Parameter(
 *          name="body",
 *          in="body",
 *          description="Opportunity Object",
 *          required=false,
 *          @SWG\Schema(ref="#/definitions/CreateOpportunity")
 *      ),
 *      @SWG\Response(
 *         response=201,
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
 *      path="/advertisers/{id}/product_lines",
 *      summary="Get ProductLines for an Advertiser",
 *      description="Returns ProductLines",
 *      tags={"advertisers"},
 *      operationId="ShowAdvertiserProductLinesRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="id",
 *          in="path",
 *          type="integer",
 *          required=true,
 *          description="Advertiser Id"
 *     ),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(
 *          type="array",
 *          @SWG\Items(ref="#/definitions/ProductLine")
 *      )
 *      ),
 *      @SWG\Response(
 *          response=403,
 *          description="Unauthorized to complete this operation"
 *      ),
 * )
 */


/**
 * @SWG\Post(
 *      path="/advertisers/{id}/product_lines",
 *      summary="Create a ProductLine for an Advertiser",
 *      description="Create ProductLine",
 *      tags={"advertisers"},
 *      operationId="CreateProductLine",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="id",
 *          in="path",
 *          type="integer",
 *          required=true,
 *          description="Advertiser Id"
 *     ),
 *      @SWG\Parameter(
 *          name="body",
 *          in="body",
 *          description="ProductLine Object",
 *          required=false,
 *          @SWG\Schema(ref="#/definitions/CreateProductLine")
 *      ),
 *      @SWG\Response(
 *         response=201,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/ProductLine")
 *     ),
 *      @SWG\Response(
 *          response=403,
 *          description="Unauthorized to complete this operation"
 *      ),
 * )
 */