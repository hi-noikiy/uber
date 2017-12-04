<?php

namespace Packages\Uber\Transformers;

use League\Fractal;
use League\Fractal\TransformerAbstract;
use Packages\Uber\Models\Uber;
use Packages\Uber\Transformers\ProfileTransformer;

class UberTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        
    ];

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'profile'
    ];

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
            'user_info'     => $uber->meta,
			'created_at'    => $uber->created_at,
			'updated_at'    => $uber->updated_at
        ];
    }

    public function includeProfile($uber)
    {
        $profile = $uber->profile;

        if($profile) {

            return $this->item($profile, new ProfileTransformer, 'User Profile');
        }
    }
}
