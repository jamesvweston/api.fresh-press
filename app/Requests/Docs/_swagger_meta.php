<?php

/**
 * @SWG\Swagger(
 *     schemes={"http", "https"},
 *     consumes={"application/json"},
 *     produces={"application/json"},
 *     @SWG\Info(
 *         title="Fresh Press Media",
 *         description="Swagger Documentation For https://api.freshpress.media",
 *         version="1.0.0",
 *         @SWG\Contact(
 *              name="James Weston",
 *              url="https://www.freshpress.media",
 *              email="dev@freshpress.media"
 *          ),
 *          @SWG\License(
 *              name="Apache 2.0",
 *              url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *          )
 *     ),
 *     @SWG\Definition(
 *         definition="Error",
 *         required={"code", "message"},
 *         @SWG\Property(
 *             property="code",
 *             type="integer",
 *             format="int32"
 *         ),
 *         @SWG\Property(
 *             property="message",
 *             type="string"
 *         )
 *     ),
 *
 *     @SWG\Definition(
 *         definition="UnauthorizedResponse",
 *         type="response",
 *         @SWG\Property(
 *             property="response",
 *             type="integer",
 *             default="403"
 *         ),
 *         @SWG\Property(
 *             property="description",
 *             type="string",
 *             default="Unauthorized to complete this operation"
 *         )
 *     ),
 * )
 *
 * @SWG\Parameter(
 *      description="Advertiser ids",
 *      in="query",
 *      name="advertiser_ids",
 *      required=false,
 *      type="string"
 *     ),
 *
 * @SWG\Parameter(
 *      description="Campaign ids",
 *      in="query",
 *      name="campaign_ids",
 *      required=false,
 *      type="string"
 *     ),
 *
 * @SWG\Parameter(
 *      description="DeliverableType ids",
 *      in="query",
 *      name="deliverable_type_ids",
 *      required=false,
 *      type="string"
 *     ),
 *
 * @SWG\Parameter(
 *      description="ProductLine ids",
 *      in="query",
 *      name="product_line_ids",
 *      required=false,
 *      type="string"
 *     ),
 *
 *
 * @SWG\Parameter(
 *      description="Created From (YYYY-MM-DD)",
 *      in="query",
 *      name="created_from",
 *      required=false,
 *      type="string"
 *     ),
 * @SWG\Parameter(
 *      description="Created To (YYYY-MM-DD)",
 *      in="query",
 *      name="created_to",
 *      required=false,
 *      type="string"
 *     ),
 * @SWG\Parameter(
 *      description="Page",
 *      in="query",
 *      name="page",
 *      required=false,
 *      type="integer"
 *     ),
 * @SWG\Parameter(
 *      description="Per Page",
 *      in="query",
 *      name="per_page",
 *      required=false,
 *      type="integer"
 *     ),
 * @SWG\Parameter(
 *      description="Order By",
 *      in="query",
 *      name="order_by",
 *      required=false,
 *      type="string"
 *     ),
 * @SWG\Parameter(
 *      description="Direction",
 *      in="query",
 *      name="direction",
 *      required=false,
 *      type="string"
 *     ),
 *
 * @SWG\Definition(
 *      definition="DateTime",
 *      @SWG\Property(
 *          property="date",
 *          type="string",
 *          example="2016-04-28 15:10:39.000000"
 *      ),
 *      @SWG\Property(
 *          property="timezone_type",
 *          type="int",
 *          example="3"
 *      ),
 *      @SWG\Property(
 *          property="timezone",
 *          type="string",
 *          example="UTC"
 *      )
 *  )
 *
 */