<?php

namespace Packages\Uber\Models;

use Illuminate\Database\Eloquent\Model;

class Uber extends Model
{
	protected $table = "uber_users";

	protected $fillable = ['name', 'email', 'address', 'meta'];

	protected $casts = [ 
        'meta' => 'array' 
    ]; 

    public function profile() 
    {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }
}
