<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */

    private $id;
 
    public function authenticate()
    {
        	
	$record= TLogin::model()->findByAttributes(array('username'=>$this->username));
        if($record===null){
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        }elseif($record->password!==md5($this->password)){
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }else{
            if($record->status == 'A'){
                    $this->id=$record->id;                    
                    $this->setState('userid', $record->userid);
                    //$this->setState('role_code', $record->role_code);
                    $this->errorCode=self::ERROR_NONE;
            }elseif($record->status == 'B'){
                     echo "<div style='width: 100%; padding: 5px; background-color: #ff0000; color: #fff;'>LOGIN DENIED !!!, You Have No Rights,Please Contact IT Personel $ Try Again </div>"; 
//                    echo "<script>alert('LOGIN DENIED !!!, Your Role is not enabled');</script>";
//                    echo "<script>alert('LOGIN DENIED !!!, Your Role is not ACTIVATED, Contact Your Administrator'); window.location = './index.php?r=site/login';</script>";
            }
        }
        return !$this->errorCode;	
    }
 
    public function getId(){
        return $this->id;
    }
    
}