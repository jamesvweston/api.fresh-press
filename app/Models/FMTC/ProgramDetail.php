<?php

namespace App\Models\FMTC;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property    int                             $nMasterID
 * @property    int                             $nMerchantID
 * @property    int                             $nManagerID
 * @property    string                          $cManagerName
 * @property    string                          $cManagerEmail
 * @property    string                          $cManagerPhone
 */
class ProgramDetail extends Model
{

    protected $connection = 'fmtc';

    protected $table = 'tblProgramDetails';


    protected $primaryKey = 'nMasterID';    //  It's a composite primary with nMasterID & nMerchantID



    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('column_mapping', function (Builder $builder)
        {
            $builder->select(
                [
                    'nMasterID',
                    'nMerchantID',
                    'nManagerID',
                    'cManagerName',
                    'cManagerEmail',
                    'cManagerPhone'
                ]
            );
        });

    }
}