<?php

/**
 * @SWG\Get(
 *      path="/users",
 *      summary="Get a list of users",
 *      tags={"users"},
 *      operationId="GetUsers",
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
 *          @SWG\Schema(ref="#/definitions/GetUsers")
 *     )
 * )
 *
 *
 *
 * @SWG\Get(
 *      path="/users/me",
 *      summary="Get your user",
 *      description="Returns your User",
 *      tags={"users"},
 *      operationId="GetMeRequest",
 *      produces={"application/json"},
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/User")
 *     )
 * )
 *
 *
 *
 * @SWG\Get(
 *      path="/users/{id}",
 *      summary="Get a User by it's id",
 *      description="Returns a User",
 *      tags={"users"},
 *      operationId="ShowUserRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/user_id"),
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/User")
 *     )
 * )
 *
 *
 *
 * @SWG\Get(
 *      path="/users/{id}/roles",
 *      summary="Get Roles for an User",
 *      description="Returns Roles",
 *      tags={"users"},
 *      operationId="ShowUserRolesRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/user_id"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(
 *              type="array",
 *              @SWG\Items(ref="#/definitions/Role")
 *          )
 *      )
 * )
 */



/**
 * @SWG\Parameter(
 *      parameter="user_id",
 *      description="User Id",
 *      in="path",
 *      name="id",
 *      required=true,
 *      type="integer"
 *  )
 */



/**
 * @SWG\Definition(
 *      definition="GetUsers",
 *      allOf={@SWG\Schema(ref="#/definitions/PaginatedResults")},
 *      properties={
 *          @SWG\Property(
 *              property="data",
 *              type="array",
 *              @SWG\Items(ref="#/definitions/User")
 *          )
 *      }
 *  )
 *
 *
 * @SWG\Definition(
 *      definition="User",
 *      properties={
 *          @SWG\Property(
 *              property="id",
 *              type="integer",
 *              example=1
 *          ),
 *          @SWG\Property(
 *              property="first_name",
 *              type="string",
 *              example="John"
 *          ),
 *          @SWG\Property(
 *              property="last_name",
 *              type="string",
 *              example="Doe"
 *          ),
 *          @SWG\Property(
 *              property="email",
 *              type="string",
 *              example="john.doe@domain.com"
 *          )
 *      }
 *  )
 */