<?php

namespace App\Models\CMS;


use App\Models\Contracts\Validatable;
use App\Models\Market\Campaign;
use App\Models\Market\Opportunity;
use App\Models\Market\ProductLine;
use App\Models\Traits\Deletable;
use App\Models\Traits\TimeStamps;
use Doctrine\Common\Collections\ArrayCollection;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @SWG\Definition()
 */
class Advertiser implements \JsonSerializable, Validatable
{

    use TimeStamps, Deletable;


    /**
     * @SWG\Property()
     * @var int
     */
    protected $id;

    /**
     * @SWG\Property()
     * @var string|null
     */
    protected $name;

    /**
     * @var User
     */
    protected $user;

    /**
     * @var ArrayCollection
     */
    protected $campaigns;

    /**
     * @var ArrayCollection
     */
    protected $opportunities;

    /**
     * @var ArrayCollection
     */
    protected $product_lines;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->name                     = AU::get($data['name']);
        $this->user                     = AU::get($data['user']);
        $this->campaigns                = AU::get($data['campaigns'], new ArrayCollection());
        $this->opportunities            = AU::get($data['opportunities'], new ArrayCollection());
        $this->product_lines            = AU::get($data['product_lines'], new ArrayCollection());
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
        $object['name']                 = $this->getName();

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
     * @return null|string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return Opportunity[]
     */
    public function getOpportunities ()
    {
        return $this->opportunities->toArray();
    }

    public function addOpportunity (Opportunity $opportunity)
    {
        $opportunity->setAdvertiser($this);
        $this->opportunities->add($opportunity);
    }

    /**
     * @return ProductLine[]
     */
    public function getProductLines ()
    {
        return $this->product_lines->toArray();
    }

    /**
     * @param ProductLine $product_line
     */
    public function addProductLine (ProductLine $product_line)
    {
        $product_line->setAdvertiser($this);
        $this->product_lines->add($product_line);
    }

    /**
     * @return Campaign[]
     */
    public function getCampaigns ()
    {
        return $this->campaigns->toArray();
    }

    /**
     * @param Campaign $campaign
     */
    public function addCampaign (Campaign $campaign)
    {
        $campaign->setAdvertiser($this);
        $this->campaigns->add($campaign);
    }

}