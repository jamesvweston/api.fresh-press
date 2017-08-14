<?php

/**
 * @SWG\Get(
 *      path="/influencers",
 *      summary="Get a list of influencers",
 *      tags={"influencers"},
 *      operationId="GetInfluencers",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="ids",
 *          in="query",
 *          type="string",
 *          required=false,
 *          description="Influencer ids"
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
 *              definition="GetInfluencersResponse",
 *          @SWG\Property(
 *             property="current_page",
 *             type="integer",
 *             example="1"
 *         ),
 *          @SWG\Property(
 *              property="data",
 *              type="array",
 *              @SWG\Items(ref="#/definitions/Influencer")
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
 *      path="/influencers/{id}",
 *      summary="Get a Influencer by it's id",
 *      description="Returns a Influencer",
 *      tags={"influencers"},
 *      operationId="ShowInfluencerRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="id",
 *          in="path",
 *          type="integer",
 *          required=true,
 *          description="Influencer Id"
 *     ),
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/Influencer")
 *     ),
 *      @SWG\Response(
 *          response=403,
 *          description="Unauthorized to complete this operation"
 *      ),
 * )
 */


/**
 * @SWG\Get(
 *      path="/influencers/{id}/billing_address",
 *      summary="Get the billing address for an influencer",
 *      description="Returns the billing address for an Influencer",
 *      tags={"influencers"},
 *      operationId="ShowInfluencerBillingAddressRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="id",
 *          in="path",
 *          type="integer",
 *          required=true,
 *          description="Influencer Id"
 *     ),
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/Address")
 *     ),
 *      @SWG\Response(
 *          response=403,
 *          description="Unauthorized to complete this operation"
 *      ),
 * )
 */

/**
 * @SWG\Get(
 *      path="/influencers/{id}/favorite_merchants",
 *      summary="Get Influencer's favorite merchants",
 *      description="Returns the Influencer's favorite merchants",
 *      tags={"influencers"},
 *      operationId="getInfluencerFavoriteMerchants",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="id",
 *          in="path",
 *          type="integer",
 *          required=true,
 *          description="Influencer Id"
 *     ),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(
 *          type="array",
 *          @SWG\Items(ref="#/definitions/FavoriteMerchant")
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
 *      path="/influencers/{id}/network_connections",
 *      summary="Get Influencer's network connections",
 *      description="Returns the Influencer's network connections",
 *      tags={"influencers"},
 *      operationId="GetInfluencerNetworkConnections",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="id",
 *          in="path",
 *          type="integer",
 *          required=true,
 *          description="Influencer Id"
 *     ),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(
 *          type="array",
 *          @SWG\Items(ref="#/definitions/NetworkConnection")
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
 *      path="/influencers/{id}/spheres",
 *      summary="Get Influencer's spheres",
 *      description="Returns the Influencer's spheres",
 *      tags={"influencers"},
 *      operationId="GetInfluencerSpheres",
 *      produces={"application/json"},
 *      @SWG\Parameter(
 *          name="id",
 *          in="path",
 *          type="integer",
 *          required=true,
 *          description="Influencer Id"
 *     ),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(
 *          type="array",
 *          @SWG\Items(ref="#/definitions/Sphere")
 *      )
 *      ),
 *      @SWG\Response(
 *          response=403,
 *          description="Unauthorized to complete this operation"
 *      ),
 * )
 */