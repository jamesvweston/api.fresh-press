<?php


/**
 * @SWG\Definition(
 *          definition="CreateProductLine",
 *          allOf={@SWG\Schema(ref="#/definitions/BaseProductLine")},
 *          required={"name", "description", "logo"},
 *          properties={
 *              @SWG\Property(
 *                  property="description",
 *                  type="string"
 *              )
 *          }
 *     )
 *
 *
 *
 * @SWG\Definition(
 *          definition="BaseProductLine",
 *          properties={
 *              @SWG\Property(
 *                  property="name",
 *                  type="string"
 *              ),
 *              @SWG\Property(
 *                  property="alias",
 *                  type="string"
 *              ),
 *              @SWG\Property(
 *                  property="description",
 *                  type="string"
 *              ),
 *              @SWG\Property(
 *                  property="logo",
 *                  type="string"
 *              ),
 *              @SWG\Property(
 *                  property="website",
 *                  type="string"
 *              ),
 *              @SWG\Property(
 *                  property="facebook",
 *                  type="string"
 *              ),
 *              @SWG\Property(
 *                  property="twitter",
 *                  type="string"
 *              ),
 *              @SWG\Property(
 *                  property="instagram",
 *                  type="string"
 *              ),
 *              @SWG\Property(
 *                  property="news_url",
 *                  type="string"
 *              ),
 *              @SWG\Property(
 *                  property="keywords",
 *                  type="string"
 *              )
 *          }
 *     )
 *
 *
 *
 * @SWG\Definition(
 *          definition="ProductLine",
 *          allOf={@SWG\Schema(ref="#/definitions/BaseProductLine")},
 *          properties={
 *              @SWG\Property(
 *                  property="id",
 *                  type="integer"
 *              )
 *          }
 *     )
 */