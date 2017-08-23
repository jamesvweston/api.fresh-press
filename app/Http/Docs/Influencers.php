<?php

/**
 * @SWG\Get(
 *      path="/influencers",
 *      summary="Get a list of influencers",
 *      tags={"influencers"},
 *      operationId="GetInfluencers",
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
 *          @SWG\Schema(ref="#/definitions/GetInfluencers")
 *     )
 *  )
 *
 *
 *
 * @SWG\Get(
 *      path="/influencers/{id}",
 *      summary="Get a Influencer by it's id",
 *      description="Returns a Influencer",
 *      tags={"influencers"},
 *      operationId="ShowInfluencerRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/influencer_id"),
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/Influencer")
 *     )
 * )
 *
 *
 *
 * @SWG\Get(
 *      path="/influencers/{id}/billing_address",
 *      summary="Get the billing address for an influencer",
 *      description="Returns the billing address for an Influencer",
 *      tags={"influencers"},
 *      operationId="ShowInfluencerBillingAddressRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/influencer_id"),
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/Address")
 *     )
 * )
 *
 *
 *
 * @SWG\Put(
 *      path="/influencers/{id}/billing_address",
 *      summary="Update the Influencer's billing address",
 *      description="Update billing address",
 *      tags={"influencers"},
 *      operationId="UpdateInfluencerBillingAddress",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/influencer_id"),
 *      @SWG\Parameter(
 *          name="body",
 *          in="body",
 *          description="Address Object",
 *          required=false,
 *          @SWG\Schema(ref="#/definitions/UpdateAddress")
 *      ),
 *      @SWG\Response(
 *         response=201,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/Address")
 *     )
 * )
 *
 *
 *
 * @SWG\Get(
 *      path="/influencers/{id}/favorite_merchants",
 *      summary="Get Influencer's favorite merchants",
 *      description="Returns the Influencer's favorite merchants",
 *      tags={"influencers"},
 *      operationId="getInfluencerFavoriteMerchants",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/influencer_id"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(
 *              type="array",
 *              @SWG\Items(ref="#/definitions/FavoriteMerchant")
 *          )
 *      )
 * )
 *
 *
 *
 * @SWG\Post(
 *      path="/influencers/{id}/favorite_merchants/{fmtc_master_merchant_id}",
 *      summary="Create a favorite merchant",
 *      description="Create a favorite merchant",
 *      tags={"influencers"},
 *      operationId="CreateFavoriteMerchant",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/influencer_id"),
 *      @SWG\Parameter(ref="#/parameters/fmtc_master_merchant_id"),
 *      @SWG\Response(
 *         response=201,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/FavoriteMerchant")
 *     )
 * )
 *
 *
 *
 * @SWG\Delete(
 *      path="/influencers/{id}/favorite_merchants/{fmtc_master_merchant_id}",
 *      summary="Delete a favorite merchant",
 *      description="Delete a favorite merchant",
 *      tags={"influencers"},
 *      operationId="deleteFavoriteMerchant",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/influencer_id"),
 *      @SWG\Parameter(ref="#/parameters/fmtc_master_merchant_id"),
 *      @SWG\Response(
 *          response=204,
 *          description="Successful operation"
 *      )
 * )
 *
 *
 *
 * @SWG\Get(
 *      path="/influencers/{id}/network_connections",
 *      summary="Get Influencer's network connections",
 *      description="Returns the Influencer's network connections",
 *      tags={"influencers"},
 *      operationId="GetInfluencerNetworkConnections",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/influencer_id"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(
 *              type="array",
 *              @SWG\Items(ref="#/definitions/NetworkConnection")
 *          )
 *      )
 *  )
 *
 *
 *
 * @SWG\Get(
 *      path="/influencers/{id}/network_connections/{network_connection_id}/fields",
 *      summary="Get NetworkConnectionFields",
 *      description="Returns NetworkConnectionFields",
 *      tags={"influencers"},
 *      operationId="GetNetworkConnectionFields",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/influencer_id"),
 *      @SWG\Parameter(ref="#/parameters/network_connection_id"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(
 *              type="array",
 *              @SWG\Items(ref="#/definitions/NetworkConnectionField")
 *          )
 *      )
 *  )
 *
 *
 *
 * @SWG\Post(
 *      path="/influencers/{id}/network_connections",
 *      summary="Create a NetworkConnection for the Influencer",
 *      description="Create NetworkConnection",
 *      tags={"influencers"},
 *      operationId="CreateNetworkConnection",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/influencer_id"),
 *      @SWG\Parameter(
 *          name="body",
 *          in="body",
 *          description="Sphere Object",
 *          required=false,
 *          @SWG\Schema(ref="#/definitions/CreateNetworkConnection")
 *      ),
 *      @SWG\Response(
 *         response=201,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/NetworkConnection")
 *     )
 * )
 *
 *
 *
 * @SWG\Put(
 *      path="/influencers/{id}/network_connections/{network_connection_id}",
 *      summary="Update a NetworkConnection for the Influencer",
 *      description="Update NetworkConnection",
 *      tags={"influencers"},
 *      operationId="UpdateNetworkConnection",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/influencer_id"),
 *      @SWG\Parameter(ref="#/parameters/network_connection_id"),
 *      @SWG\Parameter(
 *          name="body",
 *          in="body",
 *          description="NetworkConnection Object",
 *          required=false,
 *          @SWG\Schema(ref="#/definitions/UpdateNetworkConnection")
 *      ),
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/Sphere")
 *     )
 * )
 *
 *
 *
 * @SWG\Get(
 *      path="/influencers/{id}/spheres",
 *      summary="Get Influencer's spheres",
 *      description="Returns the Influencer's spheres",
 *      tags={"influencers"},
 *      operationId="GetInfluencerSpheres",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/influencer_id"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(
 *              type="array",
 *              @SWG\Items(ref="#/definitions/Sphere")
 *          )
 *      )
 *  )
 *
 *
 *
 * @SWG\Post(
 *      path="/influencers/{id}/spheres",
 *      summary="Create a Sphere for the Influencer",
 *      description="Create Sphere",
 *      tags={"influencers"},
 *      operationId="CreateSphere",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/influencer_id"),
 *      @SWG\Parameter(
 *          name="body",
 *          in="body",
 *          description="Sphere Object",
 *          required=false,
 *          @SWG\Schema(ref="#/definitions/CreateSphere")
 *      ),
 *      @SWG\Response(
 *         response=201,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/Sphere")
 *     )
 * )
 *
 *
 *
 * @SWG\Put(
 *      path="/influencers/{id}/spheres/{sphere_id}",
 *      summary="Update a Sphere for the Influencer",
 *      description="Update Sphere",
 *      tags={"influencers"},
 *      operationId="UpdateSphere",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/influencer_id"),
 *      @SWG\Parameter(ref="#/parameters/sphere_id"),
 *      @SWG\Parameter(
 *          name="body",
 *          in="body",
 *          description="Sphere Object",
 *          required=false,
 *          @SWG\Schema(ref="#/definitions/UpdateSphere")
 *      ),
 *      @SWG\Response(
 *         response=201,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/Sphere")
 *     )
 * )
 */



/**
 * @SWG\Parameter(
 *      parameter="fmtc_master_merchant_id",
 *      description="FMTC Master Merchant Id",
 *      in="path",
 *      name="fmtc_master_merchant_id",
 *      required=true,
 *      type="integer"
 *  )
 *
 *
 *
 * @SWG\Parameter(
 *      parameter="influencer_id",
 *      description="Influencer Id",
 *      in="path",
 *      name="id",
 *      required=true,
 *      type="integer"
 *  )
 *
 *
 *
 * @SWG\Parameter(
 *      parameter="network_connection_id",
 *      description="NetworkConnection Id",
 *      in="path",
 *      name="network_connection_id",
 *      required=true,
 *      type="integer"
 *  )
 *
 *
 * @SWG\Parameter(
 *      parameter="sphere_id",
 *      description="Sphere Id",
 *      in="path",
 *      name="sphere_id",
 *      required=true,
 *      type="integer"
 *  )
 */



/**
 * @SWG\Definition(
 *      definition="GetInfluencers",
 *      allOf={@SWG\Schema(ref="#/definitions/PaginatedResults")},
 *      properties={
 *          @SWG\Property(
 *              property="data",
 *              type="array",
 *              @SWG\Items(ref="#/definitions/Influencer")
 *          )
 *      }
 *  )
 *
 *
 *
 * @SWG\Definition(
 *      definition="CreateNetworkConnection",
 *      properties={
 *          @SWG\Property(
 *              property="id",
 *              type="integer"
 *          )
 *      }
 *  )
 *
 *
 * @SWG\Definition(
 *      definition="CreateSphere",
 *      properties={
 *          @SWG\Property(
 *              property="id",
 *              type="integer",
 *              example=1
 *          )
 *      }
 *  )
 *
 *
 * @SWG\Definition(
 *      definition="UpdateSphere",
 *      properties={
 *          @SWG\Property(
 *              property="id",
 *              type="integer",
 *              example=1
 *          )
 *      }
 *  )
 *
 *
 * @SWG\Definition(
 *      definition="UpdateNetworkConnection",
 *      properties={
 *          @SWG\Property(
 *              property="id",
 *              type="integer",
 *              example=1
 *          )
 *      }
 *  )
 *
 *
 *
 * @SWG\Definition(
 *      definition="Influencer",
 *      properties={
 *          @SWG\Property(
 *              property="id",
 *              type="integer",
 *              example=1
 *          )
 *      }
 *  )
 *
 *
 * @SWG\Definition(
 *      definition="FavoriteMerchant",
 *      properties={
 *          @SWG\Property(
 *              property="id",
 *              type="integer",
 *              example=1
 *          ),
 *          @SWG\Property(
 *              property="fmtc_master_merchant_id",
 *              type="integer",
 *              example=1
 *          )
 *      }
 *  )
 */