<?php

namespace App\Requests\Traits;


use jamesvweston\Utilities\BooleanUtil AS BU;
use jamesvweston\Utilities\DateUtil;
use jamesvweston\Utilities\InputUtil;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

trait RequestValidation
{

    /**
     * @param   $value
     * @return  bool|null
     */
    protected function getBoolean ($value)
    {
        if (is_null($value))
            return null;
        else
            return BU::getBooleanValue($value);
    }

    /**
     * @param   string|null $direction
     * @return  string|null
     */
    public function validateDirection ($direction)
    {
        if (is_null($direction))
            return null;

        if (!in_array(strtoupper($direction), ['ASC', 'DESC']))
            throw new BadRequestHttpException('direction must be either ASC or DESC');

        return strtoupper($direction);
    }

    /**
     * @param   string|null     $values
     * @param   string          $fieldName
     * @return  string|null
     */
    public function validateIds ($values, $fieldName)
    {
        if (is_null($values))
            return null;

        $values                         = explode(',', $values);
        $newValues                      = '';
        foreach ($values AS $item)
        {
            $id                         = InputUtil::getInt(trim($item));
            if (is_null($id))
                throw new BadRequestHttpException($fieldName . ' must be comma separated integers');

            $newValues                  .= $id . ',';
        }

        return rtrim($newValues, ',');
    }

    /**
     * @param   int|null    $value
     * @param   string      $field
     * @throws  BadRequestHttpException
     * @return  int|null
     */
    protected function validateInteger ($value, $field)
    {
        if (is_null($value))
            return null;
        else if (is_null($value = InputUtil::getInt($value)))
            throw new BadRequestHttpException($field . ' must be integer');
        else
            return $value;
    }

    /**
     * @param   array   $array
     * @param   string  $key
     * @param   string  $field
     * @param   bool    $case_sensitive
     * @throws  BadRequestHttpException
     */
    protected function validateInArray ($array, $key, $field, $case_sensitive = true)
    {
        $found                          = false;
        foreach ($array AS $item)
        {
            if ($case_sensitive)
            {
                if ($item == $key)
                    $found              = true;
            }
            else
            {
                if (strtolower($item) == $key)
                    $found              = true;
            }
        }
        if (!$found)
            throw new BadRequestHttpException($field . ' must be one of: ' . implode(',', $array));

    }

    /**
     * @param   string|bool|null    $value
     * @param   string              $fieldName
     * @return  bool|null
     */
    protected function validateBoolean ($value, $fieldName)
    {
        if (is_null($value))
            return null;

        $value                          = $this->getBoolean($value);

        if (is_null($value))
            throw new BadRequestHttpException($fieldName . ' must be boolean value');

        return $value;
    }

    /**
     * @param   string|bool|null    $value
     * @param   string              $fieldName
     * @return  string|null
     */
    protected function validateDate ($value, $fieldName)
    {
        if (is_null($value))
            return null;

        if (DateUtil::validate($value, 'YYYY-MM-DD') == false)
            throw new BadRequestHttpException($fieldName . ' must be formatted as YYYY-MM-DD');

        return $value;
    }

}