<?php

include_once '/protected/models/Admin.php';

class UserIdentity extends CUserIdentity
{
    private $_id;
    public function authenticate()
    {
        $record= Admin::model()->findByAttributes(array('login'=>$this->username));
        
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        //else if($record->pass!==crypt($this->password,$record->pass))
        else if($record->pass!==$this->password)
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id=$record->id;
            $this->setState('title', $record->name);
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
 
    public function getId()
    {
        return $this->_id;
    }
}
?>
