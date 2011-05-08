<?php

class Model_Company extends Model {

	protected $id;
	protected $name;
	protected $street;
	protected $housenumber;
	protected $city;
	protected $zip;
	protected $mail;
	protected $phone;
	protected $fax;
	protected $web;
	protected $mobile;
	protected $branchId;
	protected $lat;
	protected $lon;
	
	public function save() {
		$result = $this->connector->fetch('SELECT count(id) AS count FROM companies WHERE id = ' . $this->id . ';');
		$this->getGeocodes();
		
		if(isset($result[0]->count) && $result[0]->count > 0) {
			$this->connector->query(sprintf(
				'UPDATE companies SET name = "%s", street = "%s", housenumber = "%s", city = "%s", zip = "%s", mail = "%s", phone = "%s", fax = "%s", web = "%s", mobile = "%s", branch_id = %d, lat = %f, lon = %f WHERE id = %d;',
				$this->name,
				$this->street,
				$this->housenumber,
				$this->city,
				$this->zip,
				$this->mail,
				$this->phone,
				$this->fax,
				$this->web,
				$this->mobile,
				$this->branchId,
				$this->lat,
				$this->lon,
				$this->id
			));
		} else {
			$this->connector->query(sprintf(
				'INSERT INTO companies (id, name, street, housenumber, city, zip, mail, phone, fax, web, mobile, branch_id, lat, lon) VALUES(%d, "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", %d, %f, %f);',
				$this->id,
				$this->name,
				$this->street,
				$this->housenumber,
				$this->city,
				$this->zip,
				$this->mail,
				$this->phone,
				$this->fax,
				$this->web,
				$this->mobile,
				$this->branchId,
				$this->lat,
				$this->lon
			));
		}
	}
	
	public function get($id) {
		$result = $this->connector->fetch('SELECT * FROM companies WHERE id = ' . $id . ';');
		
		return $result[0];
	}
	
	public function getAll() {
		$result = $this->connector->fetch('SELECT * FROM companies;');
		
		return $result;
	}
	
	protected function getGeocodes() {
		$coordinates = Api_GoogleMap::getCoordinates($this->street . ' ' . $this->housenumber . ',' . $this->zip . ' ' . $this->city);
		$this->lat = $coordinates['lat'];
		$this->lon = $coordinates['lon'];
	}
	
	public function byBranchId($branchId) {
		return $this->connector->fetch('SELECT * FROM companies WHERE branch_id = ' . $branchId . ';');
	}
	
	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}

	public function getStreet() {
		return $this->street;
	}

	public function getHousenumber() {
		return $this->housenumber;
	}

	public function getCity() {
		return $this->city;
	}

	public function getZip() {
		return $this->zip;
	}

	public function getMail() {
		return $this->mail;
	}

	public function getPhone() {
		return $this->phone;
	}

	public function getFax() {
		return $this->fax;
	}

	public function getWeb() {
		return $this->web;
	}

	public function getMobile() {
		return $this->mobile;
	}

	public function getBranchId() {
		return $this->branchId;
	}

	public function getLat() {
		return $this->lat;
	}

	public function getLon() {
		return $this->lon;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function setStreet($street) {
		$this->street = $street;
	}

	public function setHousenumber($housenumber) {
		$this->housenumber = $housenumber;
	}

	public function setCity($city) {
		$this->city = $city;
	}

	public function setZip($zip) {
		$this->zip = $zip;
	}

	public function setMail($mail) {
		$this->mail = $mail;
	}

	public function setPhone($phone) {
		$this->phone = $phone;
	}

	public function setFax($fax) {
		$this->fax = $fax;
	}

	public function setWeb($web) {
		$this->web = $web;
	}

	public function setMobile($mobile) {
		$this->mobile = $mobile;
	}

	public function setBranchId($branchId) {
		$this->branchId = $branchId;
	}

	public function setLat($lat) {
		$this->lat = $lat;
	}

	public function setLon($lon) {
		$this->lon = $lon;
	}
	
}

?>