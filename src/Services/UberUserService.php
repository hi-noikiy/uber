<?php

namespace Packages\Uber\Services;

use Packages\Uber\Repositories\UberUserRepository;

class UberUserService 
{
	public function __construct(UberUserRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
	 * create user.
	 * 
	 * @param  $item: model object.
	 * @return created model object.
	 */
	public function save($data)
	{
		return $this->repository->save($data);
	}

	/**
	 * update user.
	 * 
	 * @param  $item: model object.
	 * @return updated model object.
	 */
	public function update($data)
	{
		return $this->repository->update($data);
	}
}