<?php
use Illuminate\Database\Eloquent\Model as Eloquent;
Class User extends Eloquent
{
	public $name;
	
	protected $fillable = ['username','email'];
}