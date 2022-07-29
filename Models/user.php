<?php

class User 
{

    private  $id;
    private $firstName;
	private $lastName;
    private $username;
    private $password;
    private $roleid;
	/**
	 * 
	 * @return mixed
	 */
	function getId() {
		return $this->id;
	}
	
	/**
	 * 
	 * @param mixed $id 
	 * @return User
	 */
	function setId($id): self {
		$this->id = $id;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getFirstName() {
		return $this->firstName;
	}
	
	/**
	 * 
	 * @param mixed $firstName 
	 * @return User
	 */
	function setFirstName($firstName): self {
		$this->firstName = $firstName;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getLastName() {
		return $this->lastName;
	}
	
	/**
	 * 
	 * @param mixed $lastName 
	 * @return User
	 */
	function setLastName($lastName): self {
		$this->lastName = $lastName;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getUsername() {
		return $this->username;
	}
	
	/**
	 * 
	 * @param mixed $username 
	 * @return User
	 */
	function setUsername($username): self {
		$this->username = $username;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getPassword() {
		return $this->password;
	}
	
	/**
	 * 
	 * @param mixed $password 
	 * @return User
	 */
	function setPassword($password): self {
		$this->password = $password;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getRoleid() {
		return $this->roleid;
	}
	
	/**
	 * 
	 * @param mixed $roleid 
	 * @return User
	 */
	function setRoleid($roleid): self {
		$this->roleid = $roleid;
		return $this;
	}
}
  
?> 