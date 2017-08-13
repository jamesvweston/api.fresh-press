<?php

namespace DoctrineProxies\__CG__\App\Models\Market;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Opportunity extends \App\Models\Market\Opportunity implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', 'id', 'name', 'cover_photo', 'keywords', 'notes', 'pitch', 'rejected_reason', 'deliverable_deadline_days', 'apply_by', 'published_at', 'closed_at', 'paused_at', 'submitted_at', 'rejected_at', 'advertiser', 'campaign', 'product_line', 'deliverable_type', 'creatives', 'compensation_models', 'bids', 'created_at', 'updated_at', 'deleted_at'];
        }

        return ['__isInitialized__', 'id', 'name', 'cover_photo', 'keywords', 'notes', 'pitch', 'rejected_reason', 'deliverable_deadline_days', 'apply_by', 'published_at', 'closed_at', 'paused_at', 'submitted_at', 'rejected_at', 'advertiser', 'campaign', 'product_line', 'deliverable_type', 'creatives', 'compensation_models', 'bids', 'created_at', 'updated_at', 'deleted_at'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Opportunity $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function jsonSerialize()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'jsonSerialize', []);

        return parent::jsonSerialize();
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', []);

        return parent::getName();
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', [$name]);

        return parent::setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getCoverPhoto()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCoverPhoto', []);

        return parent::getCoverPhoto();
    }

    /**
     * {@inheritDoc}
     */
    public function setCoverPhoto($cover_photo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCoverPhoto', [$cover_photo]);

        return parent::setCoverPhoto($cover_photo);
    }

    /**
     * {@inheritDoc}
     */
    public function getKeywords()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getKeywords', []);

        return parent::getKeywords();
    }

    /**
     * {@inheritDoc}
     */
    public function setKeywords($keywords)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setKeywords', [$keywords]);

        return parent::setKeywords($keywords);
    }

    /**
     * {@inheritDoc}
     */
    public function getNotes()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNotes', []);

        return parent::getNotes();
    }

    /**
     * {@inheritDoc}
     */
    public function setNotes($notes)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNotes', [$notes]);

        return parent::setNotes($notes);
    }

    /**
     * {@inheritDoc}
     */
    public function getPitch()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPitch', []);

        return parent::getPitch();
    }

    /**
     * {@inheritDoc}
     */
    public function setPitch($pitch)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPitch', [$pitch]);

        return parent::setPitch($pitch);
    }

    /**
     * {@inheritDoc}
     */
    public function getRejectedReason()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRejectedReason', []);

        return parent::getRejectedReason();
    }

    /**
     * {@inheritDoc}
     */
    public function setRejectedReason($rejected_reason)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRejectedReason', [$rejected_reason]);

        return parent::setRejectedReason($rejected_reason);
    }

    /**
     * {@inheritDoc}
     */
    public function getDeliverableDeadlineDays()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDeliverableDeadlineDays', []);

        return parent::getDeliverableDeadlineDays();
    }

    /**
     * {@inheritDoc}
     */
    public function setDeliverableDeadlineDays($deliverable_deadline_days)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDeliverableDeadlineDays', [$deliverable_deadline_days]);

        return parent::setDeliverableDeadlineDays($deliverable_deadline_days);
    }

    /**
     * {@inheritDoc}
     */
    public function getApplyBy()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getApplyBy', []);

        return parent::getApplyBy();
    }

    /**
     * {@inheritDoc}
     */
    public function setApplyBy($apply_by)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setApplyBy', [$apply_by]);

        return parent::setApplyBy($apply_by);
    }

    /**
     * {@inheritDoc}
     */
    public function getPublishedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPublishedAt', []);

        return parent::getPublishedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setPublishedAt($published_at)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPublishedAt', [$published_at]);

        return parent::setPublishedAt($published_at);
    }

    /**
     * {@inheritDoc}
     */
    public function getClosedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getClosedAt', []);

        return parent::getClosedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setClosedAt($closed_at)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setClosedAt', [$closed_at]);

        return parent::setClosedAt($closed_at);
    }

    /**
     * {@inheritDoc}
     */
    public function getPausedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPausedAt', []);

        return parent::getPausedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setPausedAt($paused_at)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPausedAt', [$paused_at]);

        return parent::setPausedAt($paused_at);
    }

    /**
     * {@inheritDoc}
     */
    public function getSubmittedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSubmittedAt', []);

        return parent::getSubmittedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setSubmittedAt($submitted_at)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSubmittedAt', [$submitted_at]);

        return parent::setSubmittedAt($submitted_at);
    }

    /**
     * {@inheritDoc}
     */
    public function getRejectedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRejectedAt', []);

        return parent::getRejectedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setRejectedAt($rejected_at)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRejectedAt', [$rejected_at]);

        return parent::setRejectedAt($rejected_at);
    }

    /**
     * {@inheritDoc}
     */
    public function getAdvertiser()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAdvertiser', []);

        return parent::getAdvertiser();
    }

    /**
     * {@inheritDoc}
     */
    public function setAdvertiser($advertiser)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAdvertiser', [$advertiser]);

        return parent::setAdvertiser($advertiser);
    }

    /**
     * {@inheritDoc}
     */
    public function getCampaign()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCampaign', []);

        return parent::getCampaign();
    }

    /**
     * {@inheritDoc}
     */
    public function setCampaign($campaign)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCampaign', [$campaign]);

        return parent::setCampaign($campaign);
    }

    /**
     * {@inheritDoc}
     */
    public function getProductLine()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductLine', []);

        return parent::getProductLine();
    }

    /**
     * {@inheritDoc}
     */
    public function setProductLine($product_line)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductLine', [$product_line]);

        return parent::setProductLine($product_line);
    }

    /**
     * {@inheritDoc}
     */
    public function getDeliverableType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDeliverableType', []);

        return parent::getDeliverableType();
    }

    /**
     * {@inheritDoc}
     */
    public function setDeliverableType($deliverable_type)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDeliverableType', [$deliverable_type]);

        return parent::setDeliverableType($deliverable_type);
    }

    /**
     * {@inheritDoc}
     */
    public function getBids()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBids', []);

        return parent::getBids();
    }

    /**
     * {@inheritDoc}
     */
    public function addBid(\App\Models\Market\Bid $bid)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addBid', [$bid]);

        return parent::addBid($bid);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatives()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatives', []);

        return parent::getCreatives();
    }

    /**
     * {@inheritDoc}
     */
    public function addCreative(\App\Models\Market\OpportunityCreative $creative)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addCreative', [$creative]);

        return parent::addCreative($creative);
    }

    /**
     * {@inheritDoc}
     */
    public function getCompensationModels()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCompensationModels', []);

        return parent::getCompensationModels();
    }

    /**
     * {@inheritDoc}
     */
    public function addCompensationModel(\App\Models\Market\CompensationModel $compensation_model)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addCompensationModel', [$compensation_model]);

        return parent::addCompensationModel($compensation_model);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', []);

        return parent::getCreatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedAt', []);

        return parent::getUpdatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function getDeletedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDeletedAt', []);

        return parent::getDeletedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setDeletedAt($deleted_at)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDeletedAt', [$deleted_at]);

        return parent::setDeletedAt($deleted_at);
    }

}
