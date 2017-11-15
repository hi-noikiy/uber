<?php

namespace Packages\Uber\Transformers;

use League\Fractal;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Packages\Uber\Models\Uber;

class UberTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [];

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [];

    /**
     * Transform object into a generic array
     *
     * @var $resource
     * @return array
     */
    public function transform(Uber $uber)
    {
        return [
            'id'            => (int) $uber->id,
            'name'        	=> $uber->name,
            'address'    	=> $uber->address,
            'meta'          => $uber->meta
			// 'created_at'    => $uber->created_at,
			// 'updated_at'    => $uber->updated_at
        ];
    }
}
