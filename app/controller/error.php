<?php

class Controller_Error extends Controller {

	public function error($error = '') {
		if($error == '') {
			return $this->render('error');
		} else {
			return $this->render($error);
		}
	}
	
}

?>