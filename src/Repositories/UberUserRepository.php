<?php

namespace Packages\Uber\Repositories;

use Packages\Uber\Models\Uber;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UberUserRepository 
{
	protected $model;

    public function __construct(Uber $model)
    {
        $this->model = $model;
    }

     /**
     * save user .
     * 
     * @param  $item: model object.
     * @return response.
     */
    public function save($entity)
    {
        $payload = $entity->setPayload($entity);

  		if(!$userData = $this->model->create($payload)) {
            
            throw new \Exception(trans('packages::messages.not_saved'), Response::HTTP_BAD_REQUEST);
        }

        return $userData;
    }

    /**
     * update user detail.
     * 
     * @param  $item: model object.
     * @return response.
     */
    public function update($entity)
    {
        $payload = $entity->setPayload($entity);

        $model = $this->model->findOrFail($entity->getKey());

        $model->fill($payload);
        $model->save();

        return $model;
    } 
}