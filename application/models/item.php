<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Item extends CI_Model {

	public function add_to_cart($meal, $quantity)
	{
		$data = array(
			'id'=> $meal['meal_id'],
			'qty'	 => $quantity,
			'price'	 => $meal['price'],
			'name' 	=> $meal['name'],
			'location' => $meal['location'],
			'mead_date' => $meal['meal_date'],
			'meal_images' => $meal['meal_images']
			);
		$this->cart->insert($data);
		return TRUE;
	}
	public function update_meal($meal_id)
	{
		
	}
	public function remove_meal($meal_id)
	{
		
	}


}