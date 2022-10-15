<?php
    require_once 'get.php';
    /**
    * The home page model
    */
    class FirstModel 
    {
       function __construct()
       {

       }
        public function validate($seatNumber , $username)
        {
			$get = new Get();
            return $get->checkUser($seatNumber , $username);		
		}
    }
?> 