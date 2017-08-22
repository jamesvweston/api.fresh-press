<?php


/**
 * @SWG\Get(
 *      path="/sphere_categories",
 *      summary="Get a list of sphere_categories",
 *      tags={"sphere_categories"},
 *      operationId="GetSphereCategories",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/ids"),
 *      @SWG\Parameter(ref="#/parameters/page"),
 *      @SWG\Parameter(ref="#/parameters/per_page"),
 *      @SWG\Parameter(ref="#/parameters/order_by"),
 *      @SWG\Parameter(ref="#/parameters/direction"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(ref="#/definitions/GetSphereCategories")
 *     )
 * )
 *
 *
 *
 * @SWG\Get(
 *      path="/sphere_categories/{id}",
 *      summary="Get a SphereCategory by it's id",
 *      description="Returns a SphereCategory",
 *      tags={"sphere_categories"},
 *      operationId="ShowSphereCategoryRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/sphere_category_id"),
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/SphereCategory")
 *     )
 * )
 */



/**
 * @SWG\Parameter(
 *      parameter="sphere_category_id",
 *      description="SphereCategory Id",
 *      in="path",
 *      name="id",
 *      required=true,
 *      type="integer"
 *  )
 */



/**
 * @SWG\Definition(
 *      definition="GetSphereCategories",
 *      allOf={@SWG\Schema(ref="#/definitions/PaginatedResults")},
 *      properties={
 *          @SWG\Property(
 *              property="data",
 *              type="array",
 *              @SWG\Items(ref="#/definitions/SphereCategory")
 *          )
 *      }
 *  )
 *
 *
 * @SWG\Definition(
 *      definition="SphereCategory",
 *      properties={
 *          @SWG\Property(
 *              property="id",
 *              type="integer",
 *              example=1
 *          ),
 *          @SWG\Property(
 *              property="name",
 *              type="string",
 *              example="Apparel"
 *          )
 *      }
 *  )
 */