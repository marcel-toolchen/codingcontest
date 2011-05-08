<?php

class Controller_Company extends Controller {

	public function detail($companyId) {
		$this->getLayout()->setView(null);
		
		$model = new Model_Company($this->connector);
		$company = $model->get($companyId);
		
		$this->set('company', $company);
		$content = $this->render('detail');
		
		print json_encode(array(
			'content' => $content,
			'company' => $company
		));
	}
	
	public function map() {
		$this->getLayout()->setView(null);
		
		$model = new Model_Company($this->connector);
		$companies = $model->getAll();
		$content = $this->render('map');
		
		print json_encode(array(
			'content' => $content,
			'companies' => $companies
		));
	}
	
}

?>