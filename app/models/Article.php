<?php

class Article extends Eloquent {

	protected $fillable = array(
    	'title', 'content', 'author_name'
    );

	public static $rules = array(
		'title' => 'required',
		'content' => 'required'
		);

    public function comments()
	{
		return $this->hasMany('Comment');
	}

}
