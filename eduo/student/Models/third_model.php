<?php
    require_once 'get.php';
    /**
    * The home page model
    */
    class ThirdModel 
    {
       function __construct()
       {

       }
        public function getFinal($target,$user_seat) {
			$get = new Get();
            return $get->getFinal($target,$user_seat);	
		}

        public function getUserData($user_seat) {
            $get = new Get();
            return $get->getUserData($user_seat);
        }

    }
?> 