<?php


/**
 * @SWG\Post(
 *      path="/oauth/token",
 *      summary="Generate an API token with your username and password",
 *      description="Generate an API token with your username and password",
 *      tags={"oauth"},
 *      operationId="CreateAccessToken",
 *      consumes={"application/json"},
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/client_id"),
 *      @SWG\Parameter(ref="#/parameters/client_secret"),
 *      @SWG\Parameter(ref="#/parameters/grant_type"),
 *      @SWG\Parameter(ref="#/parameters/username"),
 *      @SWG\Parameter(ref="#/parameters/password"),
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/AccessToken")
 *     )
 * )
 */


/**
 * @SWG\Parameter(
 *      parameter="client_id",
 *      description="The generated client Id",
 *      in="formData",
 *      name="client_id",
 *      required=true,
 *      type="integer"
 *  )
 *
 *
 *
 * @SWG\Parameter(
 *      parameter="client_secret",
 *      description="The generated client secret",
 *      in="formData",
 *      name="client_secret",
 *      required=true,
 *      type="string"
 *  )
 *
 *
 *
 * @SWG\Parameter(
 *      parameter="grant_type",
 *      description="The type of authentication",
 *      in="formData",
 *      name="grant_type",
 *      required=true,
 *      type="string",
 *      default="password",
 *      enum={"password"}
 *  )
 *
 *
 *
 * @SWG\Parameter(
 *      parameter="username",
 *      description="Your username",
 *      in="formData",
 *      name="username",
 *      required=true,
 *      type="string"
 *  )
 *
 *
 *
 * @SWG\Parameter(
 *      parameter="password",
 *      description="Your password",
 *      in="formData",
 *      name="password",
 *      required=true,
 *      type="string"
 *  )
 */


/**
 * @SWG\Definition(
 *      definition="AccessToken",
 *      @SWG\Property(
 *          property="token_type",
 *          type="string",
 *          default="Bearer"
 *      ),
 *      @SWG\Property(
 *          property="expires_in",
 *          type="integer",
 *          default="1296000"
 *      ),
 *      @SWG\Property(
 *          property="access_token",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="refresh_token",
 *          type="string"
 *      )
 *  )
 */