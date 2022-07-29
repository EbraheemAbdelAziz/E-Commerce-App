<?php
    class role 
    {
        private $id;
        private $role;

    	
	function getId() {
		return $this->id;
	}
	
	function setId($id): self {
		$this->id = $id;
		return $this;
	}
	
	function getRole() {
		return $this->role;
	}
	
	function setRole($role): self {
		$this->role = $role;
		return $this;
	}
}






?>