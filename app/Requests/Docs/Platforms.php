<?php


/**
 * @SWG\Get(
 *      path="/platforms",
 *      summary="Get a list of platforms",
 *      tags={"platforms"},
 *      operationId="GetPlatforms",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/ids"),
 *      @SWG\Parameter(ref="#/parameters/page"),
 *      @SWG\Parameter(ref="#/parameters/per_page"),
 *      @SWG\Parameter(ref="#/parameters/order_by"),
 *      @SWG\Parameter(ref="#/parameters/direction"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(ref="#/definitions/GetPlatforms")
 *     )
 *  )
 *
 *
 *
 * @SWG\Get(
 *      path="/platforms/{id}",
 *      summary="Get a Platform by it's id",
 *      description="Returns a Platform",
 *      tags={"platforms"},
 *      operationId="ShowPlatformRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/platform_id"),
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/Platform")
 *     )
 *  )
 */



/**
 * @SWG\Parameter(
 *      parameter="platform_id",
 *      description="Platform Id",
 *      in="path",
 *      name="id",
 *      required=true,
 *      type="integer"
 *  )
 */



/**
 * @SWG\Definition(
 *      definition="GetPlatforms",
 *      allOf={@SWG\Schema(ref="#/definitions/PaginatedResults")},
 *      properties={
 *          @SWG\Property(
 *              property="data",
 *              type="array",
 *              @SWG\Items(ref="#/definitions/Platform")
 *          )
 *      }
 *  )
 *
 *
 * @SWG\Definition(
 *      definition="Platform",
 *      properties={
 *          @SWG\Property(
 *              property="id",
 *              type="integer",
 *              example=1
 *          ),
 *          @SWG\Property(
 *              property="name",
 *              type="string",
 *              example="Our website / shopping cart"
 *          )
 *      }
 *  )
 */