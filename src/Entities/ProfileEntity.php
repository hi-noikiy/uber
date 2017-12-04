<?php
namespace Packages\Uber\Entities;

class ProfileEntity 
{
    protected $id;
    protected $phone;
    protected $uid;

    /**
     * set id of contract.
     * 
     * @param $value: integer id.
     */
    public function setKey($value)
    {
        $this->id = $value;
        return $this;
    }

    /**
     * get id of contract.
     * 
     * @return integer id.
     */
    public function getKey()
    {
        return $this->id;
    }

	/**
     * set phone of user.
     * 
     * @param $value: string phone.
     */
    public function setPhone($value)
    {
    	$this->phone = $value;
    	return $this;
    }

    /**
     * get phone of user.
     * 
     * @return string phone.
     */
    public function getPhone()
    {
    	return $this->phone;
    }

    /**
     * set uid of user.
     * 
     * @param $value: string uid.
     */
    public function setUid($value)
    {
    	$this->uid = $value;
    	return $this;
    }

    /**
     * get uid of user.
     * 
     * @return string uid.
     */
    public function getUid()
    {
    	return $this->uid;
    }