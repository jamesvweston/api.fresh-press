<?php

/**
 * @SWG\Get(
 *      path="/advertisers",
 *      summary="Get a list of advertisers",
 *      tags={"advertisers"},
 *      operationId="GetAdvertisers",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/ids"),
 *      @SWG\Parameter(ref="#/parameters/created_from"),
 *      @SWG\Parameter(ref="#/parameters/created_to"),
 *      @SWG\Parameter(ref="#/parameters/page"),
 *      @SWG\Parameter(ref="#/parameters/per_page"),
 *      @SWG\Parameter(ref="#/parameters/order_by"),
 *      @SWG\Parameter(ref="#/parameters/direction"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(ref="#/definitions/GetAdvertisers")
 *      )
 * )
 *
 *
 *
 * @SWG\Get(
 *      path="/advertisers/{id}",
 *      summary="Get a Advertiser by it's id",
 *      description="Returns a Advertiser",
 *      tags={"advertisers"},
 *      operationId="ShowAdvertiserRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/advertiser_id"),
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/Advertiser")
 *     )
 * )
 *
 *
 *
 * @SWG\Get(
 *      path="/advertisers/{id}/campaigns",
 *      summary="Get Campaigns for an Advertiser",
 *      description="Returns Campaigns",
 *      tags={"advertisers"},
 *      operationId="ShowAdvertiserCampaignsRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/advertiser_id"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(
 *              type="array",
 *              @SWG\Items(ref="#/definitions/Campaign")
 *          )
 *      )
 * )
 *
 *
 *
 * @SWG\Post(
 *      path="/advertisers/{id}/campaigns",
 *      summary="Create a Campaign for an Advertiser",
 *      description="Create Campaign",
 *      tags={"advertisers"},
 *      operationId="CreateCampaign",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/advertiser_id"),
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
 *      )
 * )
 *
 *
 *
 * @SWG\Put(
 *      path="/advertisers/{id}/campaigns/{campaign_id}",
 *      summary="Update a Campaign for an Advertiser",
 *      description="Update Campaign",
 *      tags={"advertisers"},
 *      operationId="UpdateCampaign",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/advertiser_id"),
 *      @SWG\Parameter(ref="#/parameters/campaign_id"),
 *      @SWG\Parameter(
 *          name="body",
 *          in="body",
 *          description="Campaign Object",
 *          required=false,
 *          @SWG\Schema(ref="#/definitions/UpdateCampaign")
 *      ),
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/Campaign")
 *     )
 * )
 *
 *
 *
 * @SWG\Get(
 *      path="/advertisers/{id}/opportunities",
 *      summary="Get Opportunities for an Advertiser",
 *      description="Returns Opportunities",
 *      tags={"advertisers"},
 *      operationId="ShowAdvertiserOpportunitiesRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/advertiser_id"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(
 *              type="array",
 *              @SWG\Items(ref="#/definitions/Opportunity")
 *          )
 *      )
 * )
 *
 *
 *
 * @SWG\Post(
 *      path="/advertisers/{id}/opportunities",
 *      summary="Create a Opportunity for an Advertiser",
 *      description="Create Opportunity",
 *      tags={"advertisers"},
 *      operationId="CreateOpportunity",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/advertiser_id"),
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
 *     )
 * )
 *
 *
 *
 * @SWG\Get(
 *      path="/advertisers/{id}/product_lines",
 *      summary="Get ProductLines for an Advertiser",
 *      description="Returns ProductLines",
 *      tags={"advertisers"},
 *      operationId="ShowAdvertiserProductLinesRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/advertiser_id"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(
 *              type="array",
 *              @SWG\Items(ref="#/definitions/ProductLine")
 *          )
 *      )
 * )
 *
 *
 *
 * @SWG\Post(
 *      path="/advertisers/{id}/product_lines",
 *      summary="Create a ProductLine for an Advertiser",
 *      description="Create ProductLine",
 *      tags={"advertisers"},
 *      operationId="CreateProductLine",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/advertiser_id"),
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
 *      )
 * )
 *
 *
 *
 *
 * @SWG\Put(
 *      path="/advertisers/{id}/product_lines/{product_line_id}",
 *      summary="Update a ProductLine for an Advertiser",
 *      description="Update ProductLine",
 *      tags={"advertisers"},
 *      operationId="UpdateProductLine",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/advertiser_id"),
 *      @SWG\Parameter(ref="#/parameters/product_line_id"),
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
 *      )
 * )
 */



/**
 * @SWG\Parameter(
 *      parameter="advertiser_id",
 *      description="Advertiser Id",
 *      in="path",
 *      name="id",
 *      required=true,
 *      type="integer"
 *  )
 *
 *
 *
 * @SWG\Parameter(
 *      parameter="campaign_id",
 *      description="Campaign Id",
 *      in="path",
 *      name="campaign_id",
 *      required=true,
 *      type="integer"
 *  )
 *
 *
 *
 * @SWG\Parameter(
 *      parameter="product_line_id",
 *      description="ProductLine Id",
 *      in="path",
 *      name="product_line_id",
 *      required=true,
 *      type="integer"
 *  )
 */



/**
 * @SWG\Definition(
 *      definition="GetAdvertisers",
 *      allOf={@SWG\Schema(ref="#/definitions/PaginatedResults")},
 *      properties={
 *          @SWG\Property(
 *              property="data",
 *              type="array",
 *              @SWG\Items(ref="#/definitions/Advertiser")
 *          )
 *      }
 *  )
 *
 *
 *
 * @SWG\Definition(
 *         definition="CreateCampaign",
 *         required={"name", "description"},
 *         @SWG\Property(
 *             property="name",
 *             type="string"
 *         ),
 *         @SWG\Property(
 *             property="description",
 *             type="string"
 *         )
 *     )
 *
 *
 *
 * @SWG\Definition(
 *      definition="Advertiser",
 *      properties={
 *          @SWG\Property(
 *              property="id",
 *              type="integer",
 *              example=1
 *          ),
 *          @SWG\Property(
 *              property="name",
 *              type="string",
 *              example="Company Name, LLC"
 *          )
 *      }
 *  )
 *
 *
 * @SWG\Definition(
 *         definition="Campaign",
 *          @SWG\Property(
 *             property="id",
 *             type="integer",
 *             example=1
 *         ),
 *         @SWG\Property(
 *             property="name",
 *             type="string",
 *             example="My campaign"
 *         ),
 *         @SWG\Property(
 *             property="description",
 *             type="string",
 *             example="Notes about my campaign"
 *         )
 *     )
 *
 *
 * @SWG\Definition(
 *         definition="UpdateCampaign",
 *         @SWG\Property(
 *             property="name",
 *             type="string",
 *             example="My campaign"
 *         ),
 *         @SWG\Property(
 *             property="description",
 *             type="string",
 *             example="Notes about my campaign"
 *         )
 *     )
 *
 *
 *
 * @SWG\Definition(
 *      definition="CreateOpportunity",
 *      required={"name", "description"},
 *      properties={
 *          @SWG\Property(
 *              property="name",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="cover_photo",
 *              type="string"
 *          )
 *      }
 *  )
 */