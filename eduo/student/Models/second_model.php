<?php
    require_once 'get.php';
    /**
    * The home page model
    */
    class SecondModel 
    {
       function __construct()
       {

       }
       /* public function desireAdd($user_seat,$desiresNumber,$presentation_type,$enterprise_type,$university_name,$desire)
        {
			$get = new Get();
            return $get->desireAdd($user_seat,$desiresNumber,$presentation_type,$enterprise_type,$university_name,$desire);		
		}*/

        public function show($user_seat,$percent){

            $get = new Get();
            return $get->getData($user_seat,$percent);
        }

        public function Percentage($studentResult){

            $get = new Get();
            return $get->getPercent($studentResult);
        }
        
        public function addDesire($user_seat,$result1){
            $get = new Get();
            return $get->addDesire($user_seat,$result1);
        } 
    }
?> 