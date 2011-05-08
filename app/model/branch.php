<?php

class Model_Branch extends Model {

	protected $name;
	protected $id;
	protected $description;
	protected $parent;
	
	public function getAll() {
		$result = $this->connector->fetch('SELECT b.id, b.name, count(c.id) AS companies FROM branches AS b, companies AS c WHERE c.branch_id = b.id GROUP BY b.id ORDER BY b.name;');
//		$result = $this->connector->fetch('SELECT b.id, b.name AS companies FROM branches AS b ORDER BY b.name;');
		
		return $result;
	}
	
	public function save() {
		$result = $this->connector->fetch('SELECT count(id) AS count FROM branches WHERE id = ' . $this->id . ';');
		
		if(isset($result->count) && $result->count > 0) {
			$this->connector->query(sprintf(
				'UPDATE branches SET name = "%s", description = "%s", parent = %d WHERE id = %d;',
				$this->name,
				$this->description,
				$this->parent,
				$this->id
			));
		} else {
			$this->connector->query(sprintf(
				'INSERT INTO branches (id, name, description, parent) VALUES(%d, "%s", "%s", %d);',
				$this->id,
				$this->name,
				$this->description,
				$this->parent
			));
		}
	}
	
	public function getName() {
		return $this->name;
	}

	public function getId() {
		return $this->id;
	}

	public function getDescription() {
		return $this->description;
	}

	public function getParent() {
		return $this->parent;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

	public function setParent($parent) {
		$this->parent = $parent;
	}

	
	
	
}

?>