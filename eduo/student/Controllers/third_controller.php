<?php
    require_once "student/Models/third_model.php";
    /**
     * MODELS_ROOT.
    * The home page controller
    */
    class ThirdController
    {
        function __construct()
        {  
        }
        public function getFinal($target,$user_seat) {
            $controller = new ThirdModel();
            return $controller->getFinal($target,$user_seat);
        }

        public function getUserData($user_seat) {
            $controller = new ThirdModel();
            return $controller->getUserData($user_seat);
        }

    }
?>
