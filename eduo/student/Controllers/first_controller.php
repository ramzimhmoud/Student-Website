<?php
    require_once "student/Models/first_model.php";
    /**
     * MODELS_ROOT.
    * The home page controller
    */
    class FirstController
    {
        function __construct()
        {  
        }
        public function validate($seatNumber , $username)
        {
            $controller = new FirstModel();
            return $controller->validate($seatNumber , $username);
        }
    }
?>