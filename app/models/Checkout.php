<?php 

class Checkout extends Eloquent
{
	public function user(){
		return $this->belongsTo('User');
	}
}

?>