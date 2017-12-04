<?php

namespace Packages\Uber\Repositories;

use Packages\Uber\Models\Uber;
use Packages\Uber\Models\Profile;
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
    public function save($entity,$request)
    {
        // dd($entity);
        $payload = $entity->setPayload($entity);

        $userData = $this->model->create($payload);

        $userProfile = new Profile([
            'user_id'   => $userData->id,
            'phone'     => $request->get('phone'),
            'uid'       => $request->get('uid'),
        ]);

        $userData->profile()->save($userProfile);

  		if(!$userData) {
            
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
    public function update($entity, $request)
    {
        $payload = $entity->setPayload($entity);

        $model = $this->model->findOrFail($entity->getKey());

        $model->fill($payload);

        $model->profile()->update([
            'phone'     => $request->get('phone'),
            'uid'       => $request->get('uid'),
        ]);
        // $model->save();

        return $model;
    } 
}