<?php

namespace App\Models\CMS;


use App\Models\Market\Campaign;
use App\Models\Market\Opportunity;
use App\Models\Market\ProductLine;
use App\Models\Traits\DBTransactions;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use jamesvweston\Utilities\ArrayUtil AS AU;
use Validator;


/**
 * @property    int                             $id
 * @property    string                          $name
 * @property    User                            $user
 * @property    Campaign[]                      $campaigns
 * @property    Opportunity[]                   $opportunities
 * @property    ProductLine[]                   $product_lines
 * @property    \Carbon\Carbon                  $created_at
 * @property    \Carbon\Carbon                  $updated_at
 * @property    \Carbon\Carbon|null             $deleted_at
 */
class Advertiser extends Model
{

    use HasTimestamps, SoftDeletes, DBTransactions;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->name                     = AU::get($data['name']);
        $this->user                     = AU::get($data['user']);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $object['id']                   = $this->id;
        $object['name']                 = $this->name;

        return $object;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function campaigns ()
    {
        return $this->hasMany(Campaign::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product_lines ()
    {
        return $this->hasMany(ProductLine::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function opportunities()
    {
        return $this->hasMany(Opportunity::class);
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
                'created_from'              => 'nullable|date_format:Y-m-d',
                'created_to'                => 'nullable|date_format:Y-m-d',
                'page'                      => 'nullable|integer|min:1',
                'per_page'                  => 'nullable|integer|min:10',
                'order_by'                  => 'nullable|string|in:id,name,created_at',
                'direction'                 => 'nullable|string|in:asc,desc',
            ])->validate();
        }

        $qb                             = self::query();

        if (!is_null(AU::get($params['ids'])))
            $qb->whereIn('id', explode(',', AU::get($params['ids'])));

        if (!is_null(AU::get($params['created_from'])))
            $qb->where('created_at', '>=', new \Carbon\Carbon($params['created_from']));

        if (!is_null(AU::get($params['created_to'])))
            $qb->where('created_at', '<=', new \Carbon\Carbon($params['created_to']));

        $qb->orderBy(AU::get($params['order_by'], 'id'), AU::get($params['direction'], 'asc'));

        if ($paginate_results)
            return $qb->paginate(AU::get($params['per_page'], 20));
        else
            return $qb->get();
    }
}