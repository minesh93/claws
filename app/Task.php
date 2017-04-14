<?php

namespace Claws;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	use ModelValidation;
    protected $fillable = [];
    protected $hidden = [];
    protected static $rules = [
    	'name' => 'required',
    	'description' => 'required',
    ];

    protected static $dirtyRules = [];

    protected static $messages = [
    	'name.required' => 'This Task needs a name!',
    	'description.required' => 'This Task needs a description!'
    ];

    protected $with = [
        'user',
    ];

    public function user(){
    	return $this->belongsTo('Claws\User');
    }

	function __construct($name = '',$description = '',$attributes = array())
	{
	    parent::__construct($attributes);
	    $this->name = $name;
	    $this->description = $description;
	}

}
