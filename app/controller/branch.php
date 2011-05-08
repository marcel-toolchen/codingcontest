<?php

class Controller_Branch extends Controller {

	public function companies($branchId) {
		$this->getLayout()->setView(null);
		
		$model = new Model_Company($this->connector);
		$companies = $model->byBranchId($branchId);
		$this->set('companies', $companies);
		print $this->render('companies');
	}
	
}

?>