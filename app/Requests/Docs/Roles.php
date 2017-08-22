<?php

/**
 * @SWG\Get(
 *      path="/roles",
 *      summary="Get a list of roles",
 *      tags={"roles"},
 *      operationId="GetRoles",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/ids"),
 *      @SWG\Parameter(ref="#/parameters/page"),
 *      @SWG\Parameter(ref="#/parameters/per_page"),
 *      @SWG\Parameter(ref="#/parameters/order_by"),
 *      @SWG\Parameter(ref="#/parameters/direction"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(ref="#/definitions/GetRoles")
 *     )
 * )
 *
 *
 *
 * @SWG\Get(
 *      path="/roles/{id}",
 *      summary="Get a Role by it's id",
 *      description="Returns a Role",
 *      tags={"roles"},
 *      operationId="ShowRoleRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/role_id"),
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/Role")
 *     )
 * )
 */



/**
 * @SWG\Parameter(
 *      parameter="role_id",
 *      description="Role Id",
 *      in="path",
 *      name="id",
 *      required=true,
 *      type="integer"
 *  )
 */



/**
 * @SWG\Definition(
 *      definition="GetRoles",
 *      allOf={@SWG\Schema(ref="#/definitions/PaginatedResults")},
 *      properties={
 *          @SWG\Property(
 *              property="data",
 *              type="array",
 *              @SWG\Items(ref="#/definitions/Role")
 *          )
 *      }
 *  )
 *
 *
 * @SWG\Definition(
 *      definition="Role",
 *      properties={
 *          @SWG\Property(
 *              property="id",
 *              type="integer",
 *              example=1
 *          ),
 *          @SWG\Property(
 *              property="name",
 *              type="string",
 *              example="Admin"
 *          )
 *      }
 *  )
 */