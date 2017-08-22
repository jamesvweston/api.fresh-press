<?php


/**
 * @SWG\Get(
 *      path="/age_ranges",
 *      summary="Get a list of age_ranges",
 *      tags={"age_ranges"},
 *      operationId="GetAgeRanges",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/ids"),
 *      @SWG\Parameter(ref="#/parameters/page"),
 *      @SWG\Parameter(ref="#/parameters/per_page"),
 *      @SWG\Parameter(ref="#/parameters/order_by"),
 *      @SWG\Parameter(ref="#/parameters/direction"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(ref="#/definitions/GetAgeRanges")
 *      )
 *  )
 *
 *
 *
 * @SWG\Get(
 *      path="/age_ranges/{id}",
 *      summary="Get a AgeRange by it's id",
 *      description="Returns a AgeRange",
 *      tags={"age_ranges"},
 *      operationId="ShowAgeRangeRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/age_range_id"),
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/AgeRange")
 *     )
 *  )
 */



/**
 * @SWG\Parameter(
 *      parameter="age_range_id",
 *      description="AgeRange Id",
 *      in="path",
 *      name="id",
 *      required=true,
 *      type="integer"
 *  )
 */



/**
 * @SWG\Definition(
 *      definition="GetAgeRanges",
 *      allOf={@SWG\Schema(ref="#/definitions/PaginatedResults")},
 *      properties={
 *          @SWG\Property(
 *              property="data",
 *              type="array",
 *              @SWG\Items(ref="#/definitions/AgeRange")
 *          )
 *      }
 *  )
 *
 *
 * @SWG\Definition(
 *      definition="AgeRange",
 *      properties={
 *          @SWG\Property(
 *              property="id",
 *              type="integer",
 *              example=1
 *          ),
 *          @SWG\Property(
 *              property="min",
 *              type="integer",
 *              example=13
 *          ),
 *          @SWG\Property(
 *              property="max",
 *              type="integer",
 *              example=17
 *          )
 *      }
 *  )
 */