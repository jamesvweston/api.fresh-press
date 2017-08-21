<?php

namespace App\Models\CMS;


use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use jamesvweston\Utilities\ArrayUtil AS AU;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @SWG\Definition()
 *
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

    use HasTimestamps, Notifiable, SoftDeletes;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->first_name               = AU::get($data['first_name']);
        $this->last_name                = AU::get($data['last_name']);
        $this->email                    = AU::get($data['email']);
        $this->password                 = AU::get($data['password']);
        $this->email_is_verified        = AU::get($data['email_is_verified'], false);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $object['id']                   = $this->getId();
        $object['first_name']           = $this->getFirstName();
        $object['last_name']            = $this->getLastName();
        $object['email']                = $this->getEmail();

        return $object;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return bool
     */
    public function getEmailIsVerified()
    {
        return $this->email_is_verified;
    }

    /**
     * @param bool $email_is_verified
     */
    public function setEmailIsVerified($email_is_verified)
    {
        $this->email_is_verified = $email_is_verified;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles ()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id');
    }

}