<?php
/**
 * 
 */
class ConfirmationField extends BooleanField {

	function __construct($options = []){
		parent::__construct($options);

		$this->update_message("required", _("Please tick the agreement"));
	}

	function clean($value){
		list($err,$value) = parent::clean($value);
		if(isset($err)){
			return [$err,$value];
		}

		if(!$value && $this->required){
			return [$this->messages["required"],null];
		}

		return [$err,$value];
	}
}
