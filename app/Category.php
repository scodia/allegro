<?php namespace Allegro;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $table = 'categories';
	public $subCategories = [];


	private function _fillSubCategories($id)
	{
		$this->subCategories = self::where('category_ID', $id)
										->select('name','id')
										->get();
	}

	public function fillSubCategories()
	{
		$this->_fillSubCategories($this->id);
	}

	public function fillMainCategories()
	{
		$this->_fillSubCategories(0);
	}
	
}

