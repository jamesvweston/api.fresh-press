<?php

namespace App\Models\CMS;


use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use jamesvweston\Utilities\ArrayUtil AS AU;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

/**
 * @property    int                             $id
 * @property    string                          $first_name
 * @property    string                          $last_name
 * @property    string                          $email
 * @property    string                          $password
 * @property    bool                            $email_is_verified
 * @property    Role[]                          $roles
 */
class User extends Authenticatable
{

    use HasApiTokens, HasTimestamps, Notifiable, SoftDeletes;


    /**
     * @return array
     */
    public function toArray()
    {
        $object['id']                   = $this->id;
        $object['first_name']           = $this->first_name;
        $object['last_name']            = $this->last_name;
        $object['email']                = $this->email;

        return $object;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles ()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id');
    }

    /**
     * @param array $params
     * @param bool $paginate_results
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function search ($params = [], $paginate_results = false)
    {
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