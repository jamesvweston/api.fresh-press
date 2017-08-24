<?php

namespace App\Models\FMTC;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property    int                             $id
 * @property    int                             $merchant_id
 * @property    int                             $manager_id
 * @property    string                          $manager_name
 * @property    string                          $manager_email
 * @property    string                          $manager_phone
 */
class ProgramDetail extends Model
{

    protected $connection = 'fmtc';

    protected $table = 'tblProgramDetails';

    protected $primaryKey = 'nMasterID';


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('column_mapping', function (Builder $builder)
        {
            $builder->select(
                [
                    'nMasterID AS id',
                    'nMerchantID AS merchant_id',
                    'nManagerID AS manager_id',
                    'cManagerName AS manager_name',
                    'cManagerEmail AS manager_email',
                    'cManagerPhone AS manager_phone'
                ]
            );
        });

    }
}