<?php

/**
 * @SWG\Definition(
 *      definition="BaseAddress",
 *      properties={
 *          @SWG\Property(
 *              property="street1",
 *              type="string",
 *              example="24 John Doe Lane"
 *          ),
 *          @SWG\Property(
 *              property="street2",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="city",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="postal_code",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="phone",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="state_province",
 *              type="string"
 *          )
 *      }
 *  )
 *
 *
 *
 * @SWG\Definition(
 *      definition="Address",
 *      allOf={@SWG\Schema(ref="#/definitions/BaseAddress")},
 *      properties={
 *          @SWG\Property(
 *              property="id",
 *              type="integer",
 *              example=1
 *          ),
 *          @SWG\Property(
 *              property="country",
 *              ref="#/definitions/Country"
 *          )
 *      }
 *  )
 *
 *
 * @SWG\Definition(
 *      definition="UpdateAddress",
 *      allOf={@SWG\Schema(ref="#/definitions/BaseAddress")},
 *      properties={
 *          @SWG\Property(
 *              property="country_id",
 *              type="integer",
 *              example=233
 *          )
 *      }
 *  )
 */