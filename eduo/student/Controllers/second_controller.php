<?php
    require_once "student/Models/second_model.php";
    /**
     * MODELS_ROOT.
    * The home page controller
    */
    class SecondController
    {
        function __construct()
        {  
        }
       /* public function desireAdd($user_seat,$desiresNumber,$presentation_type,$enterprise_type,$university_name,$desire)
        {
            $controller = new SecondModel();
            return $controller->desireAdd($user_seat,$desiresNumber,$presentation_type,$enterprise_type,$university_name,$desire);
        }*/

        public function show($user_seat,$percent){
            $controller = new SecondModel();
            return $controller->show($user_seat,$percent);
        }

        public function percentage($studentResult){

            $controller = new SecondModel();
            return $controller->Percentage($studentResult);
        }
        
        public function addDesire($user_seat,$result1){

            $controller = new SecondModel();
            return $controller->addDesire($user_seat,$result1);
        }
    }

    
?>