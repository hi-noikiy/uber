<?php

namespace Packages\Uber\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $table = "user_profile";

	protected $fillable = ['phone', 'uid', 'user_id'];

	public function uber() 
    {
        return $this->belongsTo(Uber::class);
    }
}
