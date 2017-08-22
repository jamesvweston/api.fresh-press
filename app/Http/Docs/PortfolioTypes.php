<?php


/**
 * @SWG\Get(
 *      path="/portfolio_types",
 *      summary="Get a list of portfolio_types",
 *      tags={"portfolio_types"},
 *      operationId="GetPortfolioTypes",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/ids"),
 *      @SWG\Parameter(ref="#/parameters/page"),
 *      @SWG\Parameter(ref="#/parameters/per_page"),
 *      @SWG\Parameter(ref="#/parameters/order_by"),
 *      @SWG\Parameter(ref="#/parameters/direction"),
 *      @SWG\Response(
 *          response=200,
 *          description="Successful operation",
 *          @SWG\Schema(ref="#/definitions/GetPortfolioTypes")
 *     )
 * )
 *
 *
 *
 * @SWG\Get(
 *      path="/portfolio_types/{id}",
 *      summary="Get a PortfolioType by it's id",
 *      description="Returns a PortfolioType",
 *      tags={"portfolio_types"},
 *      operationId="ShowPortfolioTypeRequest",
 *      produces={"application/json"},
 *      @SWG\Parameter(ref="#/parameters/portfolio_type_id"),
 *      @SWG\Response(
 *         response=200,
 *         description="Successful operation",
 *         @SWG\Schema(ref="#/definitions/PortfolioType")
 *     )
 * )
 */



/**
 * @SWG\Parameter(
 *      parameter="portfolio_type_id",
 *      description="PortfolioType Id",
 *      in="path",
 *      name="id",
 *      required=true,
 *      type="integer"
 *  )
 */



/**
 * @SWG\Definition(
 *      definition="GetPortfolioTypes",
 *      allOf={@SWG\Schema(ref="#/definitions/PaginatedResults")},
 *      properties={
 *          @SWG\Property(
 *              property="data",
 *              type="array",
 *              @SWG\Items(ref="#/definitions/PortfolioType")
 *          )
 *      }
 *  )
 *
 *
 * @SWG\Definition(
 *      definition="PortfolioType",
 *      properties={
 *          @SWG\Property(
 *              property="id",
 *              type="integer",
 *              example=1
 *          ),
 *          @SWG\Property(
 *              property="name",
 *              type="string",
 *              example="Facebook Group"
 *          )
 *      }
 *  )
 */