<?php namespace Allegro;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $table = 'categories';
	public $subCategories = [];

	public function fillSubCategories()
	{
		$this->subCategories = self::where('category_ID', $this->id)
										->select('name','id')
										->get();
	}

}

