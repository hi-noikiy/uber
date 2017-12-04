<?php

namespace Packages\Uber\Transformers;

use League\Fractal;
use League\Fractal\TransformerAbstract;
use Packages\Uber\Models\Profile;

class ProfileTransformer extends TransformerAbstract
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
    public function transform(Profile $profile)
    {
        return [
            'id'            => (int) $profile->id,
            'user_id'       => $profile->user_id,
            'phone'    		=> $profile->phone,
            'uid'    		=> $profile->uid,
			'created_at'    => $profile->created_at,
			'updated_at'    => $profile->updated_at
        ];
    }
}
