<?php namespace App\Entities;

use Myth\Auth\Entities\User as MythUser;

class User extends MythUser
{
    /**
     * Default attributes.
     * @var array
     */
    protected $attributes = [
    	'fullname' => 'Guest',
    ];

	/**
	 * Returns a full name
	 *
	 * @return string
	 */
	public function getName()
	{
		return trim(trim($this->attributes['fullname']));
	}
}