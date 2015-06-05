<?php namespace Allegro;

use Illuminate\Database\Eloquent\Model;
use Allegro\WarehouseProduct;

class Product extends Model {

	protected $table = 'products';

	public function getWarehouseQuantity()
	{
		$warehouseProduct = WarehouseProduct::where('product_ID', $this->id)->first();
		if ($warehouseProduct) {
			return $warehouseProduct->quantity;
		} else {
			return 0;
		}
	}


	public function isAvailable()
	{
		return $this->getWarehouseQuantity() > 0;
	}

	public function isAvailableForQuantity($quantity)
	{
		$warehouseProduct = WarehouseProduct::where('product_ID', $this->id)->first();
		if ($warehouseProduct) {
			return $warehouseProduct->quantity >= $quantity;
		} else {
			return false;
		}
	}
}
