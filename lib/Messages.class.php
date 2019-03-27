<?php
class Messages {
	private $errors = array ();
	private $infos = array ();
	private $num = 0;

    //function to assign errors to array
	public function addError($message) {
        $this->errors[] = $message;
        //increase counter
		$this->num ++;
	}

    //function to assign infos to array
	public function addInfo($message) {
		$this->infos[] = $message;
		$this->num ++;
	}

	public function isEmpty() {
        //if == 0 TRUE, else FALSE
		return $this->num == 0;
	}
	
	public function isError() {
        //if count > 0 TRUE, else FALSE
		return count ( $this->errors ) > 0;
	}
	
	public function isInfo() {
		return count ( $this->infos ) > 0;
	}
	
	public function getErrors() {
        //returns an array
		return $this->errors;
	}
	
	public function getInfos() {
		return $this->infos;
	}
	
	public function clear() {
        //clear everything
		$this->errors = array ();
		$this->infos = array ();
		$this->num = 0;
		$this->error = false;
	}
}