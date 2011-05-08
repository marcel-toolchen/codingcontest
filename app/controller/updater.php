<?php

class Controller_Updater extends Controller {

	public function companies($limit, $offset) {
		$this->getLayout()->setView(null);
		$companies = Api_Leipzig::getCompanies($limit, $offset);
		
		foreach($companies as $company) {
			$model = new Model_Company($this->connector);
			$model->setId($company->id);
			$model->setName($company->name);
			$model->setStreet($company->street);
			$model->setHousenumber($company->housenumber);
			$model->setCity($company->city);
			$model->setZip($company->postcode);
			$model->setMail($company->email_primary);
			$model->setPhone($company->phone_primary);
			$model->setFax($company->fax_primary);
			$model->setWeb($company->url_primary);
			$model->setMobile($company->mobile_primary);
			$model->setBranchId($company->main_branch_id);
			$model->setLat(0);
			$model->setLon(0);
			$model->save();
		}
	}
	
	public function branches($limit, $offset) {
		$this->getLayout()->setView(null);
		$branches = Api_Leipzig::getBranches($limit, $offset);
		
		foreach($branches as $branch) {
			$model = new Model_Branch($this->connector);
			$model->setId($branch->id);
			$model->setName($branch->name);
			$model->setDescription($branch->description);
			$model->setParent($branch->parent_id);
			$model->save();
		}
	}
	
	public function count() {
		$this->getLayout()->setView(null);
		$companyCount = Api_Leipzig::countCompanies();
		$branchCount = Api_Leipzig::countBranches();
		
		print json_encode(array('companies' => $companyCount, 'branches' => $branchCount));
	}
	
}

?>