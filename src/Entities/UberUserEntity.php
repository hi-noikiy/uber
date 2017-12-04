<?php
namespace Packages\Uber\Entities;

class UberUserEntity 
{
    protected $id;
    protected $name;
    protected $email;
    protected $address;
    protected $meta;
    protected $phone;
    protected $uid;
    protected $user_id;

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
     * set name of user.
     * 
     * @param $value: string name.
     */
    public function setName($value)
    {
    	$this->name = $value;
    	return $this;
    }

    /**
     * get name of user.
     * 
     * @return string name.
     */
    public function getName()
    {
    	return $this->name;
    }

    /**
     * set email of user.
     * 
     * @param $value: string email.
     */
    public function setEmail($value)
    {
    	$this->email = $value;
    	return $this;
    }

    /**
     * get email of user.
     * 
     * @return string email.
     */
    public function getEmail()
    {
    	return $this->email;
    }

     /**
     * set address of user.
     * 
     * @param $value: string address.
     */
    public function setAddress($value)
    {
    	$this->address = $value;
    	return $this;
    }

    /**
     * get address of user.
     * 
     * @return string address.
     */
    public function getAddress()
    {
    	return $this->address;
    }

     /**
     * set meta of user.
     * 
     * @param $value: string meta.
     */
    public function setMeta($value)
    {
        $this->meta = $value;
        return $this;
    }

    /**
     * get meta of user.
     * 
     * @return string meta.
     */
    public function getMeta()
    {
        return $this->meta;
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

     /**
     * set user id of user.
     * 
     * @param $value: string user id.
     */
    public function setUserId($value)
    {
        $this->user_id = $value;
        return $this;
    }

    /**
     * get user id of user.
     * 
     * @return string user id.
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /** 
     * set payload field for saving.
     * 
     * @param $item: model item object.
     */
    public function setPayload()
    {
        return [
            'name'      => $this->getName(),
            'email'     => $this->getEmail(),
            'address'   => $this->getAddress(),
            'meta'      => $this->getMeta(),
        ];
    }
}