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
 *      parameters={},
 *      @SWG\Parameter(
 *          name="client_id",
 *          in="formData",
 *          description="The generated client Id for your apiKey",
 *          required=true,
 *          type="string"
 *      ),
 *      @SWG\Parameter(
 *          name="client_secret",
 *          in="formData",
 *          description="The generated client secret for your apiKey",
 *          required=true,
 *          type="string"
 *      ),
 *      @SWG\Parameter(
 *          name="grant_type",
 *          in="formData",
 *          description="The type of authentication you want to attempt",
 *          required=true,
 *          type="string",
 *          default="password",
 *          enum={"password"}
 *      ),
 *      @SWG\Parameter(
 *          name="username",
 *          in="formData",
 *          description="The username you are attempting to authenticate with",
 *          required=true,
 *          type="string"
 *      ),
 *      @SWG\Parameter(
 *          name="password",
 *          in="formData",
 *          description="The password you are attempting to authenticate with",
 *          required=true,
 *          type="string"
 *      ),
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/AccessToken")
 *     ),
 *      @SWG\Response(
 *          response=400,
 *          description="Invalid credentials"
 *      ),
 * )
 *
 *
 */



/**
 * @SWG\Definition(
 *         definition="AccessToken",
 *         @SWG\Property(
 *             property="token_type",
 *             type="string",
 *             default="Bearer"
 *         ),
 *         @SWG\Property(
 *             property="expires_in",
 *             type="integer",
 *             default="1296000"
 *         ),
 *          @SWG\Property(
 *             property="access_token",
 *             type="string"
 *         ),
 *          @SWG\Property(
 *             property="refresh_token",
 *             type="string"
 *         )
 *     ),
 */
