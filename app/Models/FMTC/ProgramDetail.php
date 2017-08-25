<?php

namespace App\Models\FMTC;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use jamesvweston\Utilities\ArrayUtil AS AU;
use Validator;

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

        static::addGlobalScope('tblProgramDetails_column_mapping', function (Builder $builder)
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function master_merchant ()
    {
        return $this->belongsTo(MasterMerchant::class, 'nMasterID', 'nMasterID');
    }

    /**
     * @param   array   $params
     * @param   bool    $paginate_results
     * @param   bool    $validate
     * @return  \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function search ($params = [], $paginate_results = false, $validate = false)
    {
        if ($validate)
        {
            Validator::make($params, [
                'page'                      => 'nullable|integer|min:1',
                'per_page'                  => 'nullable|integer|min:10',
                'order_by'                  => 'nullable|string|in:id',
                'direction'                 => 'nullable|string|in:asc,desc',
            ])->validate();
        }

        $qb                             = self::query();

        if (!is_null(AU::get($params['ids'])))
            $qb->whereIn('nMasterID', explode(',', AU::get($params['ids'])));

        $qb->orderBy(AU::get($params['order_by'], 'nMasterID'), AU::get($params['direction'], 'asc'));

        if ($paginate_results)
            return $qb->paginate(AU::get($params['per_page'], 20));
        else
            return $qb->get();
    }

}