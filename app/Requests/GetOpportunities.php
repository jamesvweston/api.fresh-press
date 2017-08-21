<?php

namespace App\Requests;


use App\Requests\Traits\QueryCreatedDates;
use jamesvweston\Utilities\ArrayUtil AS AU;

class GetOpportunities extends BaseIndexRequest
{

    use QueryCreatedDates;


    /**
     * @var string|null
     */
    protected $advertiser_ids;

    /**
     * @var string|null
     */
    protected $campaign_ids;

    /**
     * @var string|null
     */
    protected $deliverable_type_ids;

    /**
     * @var string|null
     */
    protected $product_line_ids;


    public function __construct($data = [])
    {
        parent::__construct($data);

        $this->setCreatedFrom(AU::get($data['created_from']));
        $this->setCreatedTo(AU::get($data['created_to']));

        $this->advertiser_ids           = AU::get($data['advertiser_ids']);
        $this->campaign_ids             = AU::get($data['campaign_ids']);
        $this->deliverable_type_ids     = AU::get($data['deliverable_type_ids']);
        $this->product_line_ids         = AU::get($data['product_line_ids']);
    }

    public function validate()
    {
        parent::validate();

        $this->validateCreatedDates();

        $this->advertiser_ids           = $this->validateIds($this->advertiser_ids, 'advertiser_ids');
        $this->campaign_ids             = $this->validateIds($this->campaign_ids, 'campaign_ids');
        $this->deliverable_type_ids     = $this->validateIds($this->deliverable_type_ids, 'deliverable_type_ids');
        $this->product_line_ids         = $this->validateIds($this->product_line_ids, 'product_line_ids');
    }

    /**
     * @return null|string
     */
    public function getAdvertiserIds()
    {
        return $this->advertiser_ids;
    }

    /**
     * @param null|string $advertiser_ids
     */
    public function setAdvertiserIds($advertiser_ids)
    {
        $this->advertiser_ids = $advertiser_ids;
    }

    /**
     * @return null|string
     */
    public function getCampaignIds()
    {
        return $this->campaign_ids;
    }

    /**
     * @param null|string $campaign_ids
     */
    public function setCampaignIds($campaign_ids)
    {
        $this->campaign_ids = $campaign_ids;
    }

    /**
     * @return null|string
     */
    public function getDeliverableTypeIds()
    {
        return $this->deliverable_type_ids;
    }

    /**
     * @param null|string $deliverable_type_ids
     */
    public function setDeliverableTypeIds($deliverable_type_ids)
    {
        $this->deliverable_type_ids = $deliverable_type_ids;
    }

    /**
     * @return null|string
     */
    public function getProductLineIds()
    {
        return $this->product_line_ids;
    }

    /**
     * @param null|string $product_line_ids
     */
    public function setProductLineIds($product_line_ids)
    {
        $this->product_line_ids = $product_line_ids;
    }

    /**
     * @return string
     */
    public function getDefaultOrderBy()
    {
        return 'id';
    }

    /**
     * @return array
     */
    public function getOrderByFields()
    {
        return ['id', 'email'];
    }

}