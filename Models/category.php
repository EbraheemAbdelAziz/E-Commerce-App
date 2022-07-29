<?php
class category {
	
    private $id;
    private $name;

	function getName() {
		return $this->name;
	}

	function setName($name): self {
		$this->name = $name;
		return $this;
	}

	function getId() {
		return $this->id;
	}

	function setId($id): self {
		$this->id = $id;
		return $this;
	}
}
?>