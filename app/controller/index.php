<?php

class Controller_Index extends Controller {

	public function index() {
		$model = new Model_Branch($this->connector);
		$branches = $model->getAll();
		$this->set('branches', $branches);
		
		return $this->render('index');
	}
	
}

?>