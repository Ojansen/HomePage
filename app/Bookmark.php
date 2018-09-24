<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
	protected $table = 'bookmarks';
	protected $primaryKey = 'userId';
	
    protected $fillable = [
    	'id','userId','label','href','target','category',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User', 'id', 'userId');
    }
}
