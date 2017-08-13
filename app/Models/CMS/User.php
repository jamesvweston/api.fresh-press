<?php

namespace App\Models\CMS;


use App\Models\Contracts\Validatable;
use App\Models\Traits\Deletable;
use App\Models\Traits\TimeStamps;
use Doctrine\Common\Collections\ArrayCollection;
use jamesvweston\Utilities\ArrayUtil AS AU;

abstract class User implements \JsonSerializable, Validatable
{

    use TimeStamps, Deletable;


    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $first_name;

    /**
     * @var string
     */
    protected $last_name;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var bool
     */
    protected $email_is_verified;

    /**
     * @var ArrayCollection
     */
    protected $roles;


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
        $this->roles                    = AU::get($data['roles'], new ArrayCollection());
    }

    public function validate()
    {
        
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['id']                   = $this->getId();
        $object['first_name']           = $this->getFirstName();
        $object['last_name']            = $this->getLastName();
        $object['email']                = $this->getEmail();

        return $object;
    }

    /**
     * This is temporarily in place to support Bugsnag's error reporting
     * @return array
     */
    public function toArray ()
    {
        return $this->jsonSerialize();
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
     * @return Role[]
     */
    public function getRoles ()
    {
        return $this->roles->toArray();
    }

    public function addRole (Role $role)
    {
        $this->roles->add($role);
    }

}