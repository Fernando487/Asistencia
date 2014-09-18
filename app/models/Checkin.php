<?php 

class Checkin extends Eloquent
{
	public function user(){
		return $this->belongsTo('User');
	}
}

?>