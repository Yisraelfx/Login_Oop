<?php

class validator {
    private $errors = [];

    public function validateEmpty($value, $fieldName) {
        if(empty($value)) {
            if($fieldName == "fullName") {
                $this->errors[$fieldName] = "Please Enter Full Name";
            }
            elseif($fieldname == "email") {
                $this->errors[$fieldName] = "Please Enter E-Mail";
            }
            elseif($fieldName == "pwd") {
                $this->errors[$fieldName] = "Please Enter Password";
            }
            elseif($fieldName == "confirmPwd") {
                $this->errors[$fieldName] = "Please Confirm Password";
            }
            else {
                $this->errors[$fieldName] = "This Field Is Required";
            }
        }
    }

    public function hasErrors() {
        return !empty($this->errors);
    }

    public function getErrors() {
        return $this->errors;
    }
}

?>