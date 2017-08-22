<?php

/**
 * @SWG\Get(
 *      path="/countries",
 *      summary="Get a list of countries",
 *      tags={"countries"},
 *      operationId="GetCountries",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/ids"),
 *      @SWG\Parameter(ref="#/parameters/page"),
 *      @SWG\Parameter(ref="#/parameters/per_page"),
 *      @SWG\Parameter(ref="#/parameters/order_by"),
 *      @SWG\Parameter(ref="#/parameters/direction"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(ref="#/definitions/GetCountries")
 *     )
 *  )
 *
 *
 *
 * @SWG\Get(
 *      path="/countries/{id}",
 *      summary="Get a Country by it's id",
 *      description="Returns a Country",
 *      tags={"countries"},
 *      operationId="ShowCountryRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/country_id"),
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/Country")
 *     )
 * )
 */


/**
 * @SWG\Parameter(
 *      parameter="country_id",
 *      description="Country Id",
 *      in="path",
 *      name="id",
 *      required=true,
 *      type="integer"
 *  )
 */



/**
 * @SWG\Definition(
 *      definition="GetCountries",
 *      allOf={@SWG\Schema(ref="#/definitions/PaginatedResults")},
 *      properties={
 *          @SWG\Property(
 *              property="data",
 *              type="array",
 *              @SWG\Items(ref="#/definitions/Country")
 *          )
 *      }
 *  )
 *
 *
 * @SWG\Definition(
 *      definition="Country",
 *      properties={
 *          @SWG\Property(
 *              property="id",
 *              type="integer",
 *              example=233
 *          ),
 *          @SWG\Property(
 *              property="name",
 *              type="string",
 *              example="United States"
 *          ),
 *          @SWG\Property(
 *              property="code",
 *              type="string",
 *              example="US"
 *          )
 *      }
 *  )
 */