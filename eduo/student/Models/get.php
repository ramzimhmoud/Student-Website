<?php
    /**
	 *  class to insert , retrive and update data to database
	 */
	class Get{		 	
		public $conn;
		public $targets=[];
		public function connection(){
			include 'connection.php';
		 	$conn = new mysqli($host, $user, $password, $dbname);
			 $conn->set_charset('utf8');
		 	$this->conn = $conn;
		 	// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}
		}
		//select data from database


		public function getData($user_seat,$percent){
		 	$this->connection();
			$get_id = "SELECT * FROM `student` WHERE `Sitting_number` = '$user_seat'";
			$id = $this->conn->query($get_id);
			$student_id = 0;
			foreach ($id as $row) :
				$student_id=$row['ID'];
			endforeach;
			$query = "SELECT * FROM `certificate_result` WHERE `student_id` = '$student_id' AND `Result` = '$percent'";
			$result = $this->conn->query($query);	
			if(mysqli_num_rows($result) == 0){
			echo '<script type = "text/javascript">';
			echo 'alert("النسبة خاطئه..الرجاء إدخال نسبتك المسجلة")';
			echo '</script>';
			}else{
			return $result;
			}
		} 

		public function getPercent($studentResult){
			$this->connection();
		   $query = "SELECT * FROM `admission_guide` WHERE `Percent` <= '$studentResult' ORDER BY `Percent` DESC LIMIT 10";	   
		   $result = $this->conn->query($query);
		   //$ret = [];
		   //var_dump($result);
		 //  while($obj = mysqli_fetch_object($result)){
			
			//   $ret=$obj;
		   //}
		   return $result;
	   	} 

		public function getFinal($target,$user_seat){
			$this->connection();
			//var_dump($this->targets);
			$qur= "DELETE FROM `desires` WHERE `Desire` = '$target'";
			$query = "SELECT * FROM `desires` WHERE `student_id` <= '$user_seat";	   
			$res = $this->conn->query($qur);
			$result = $this->conn->query($query);
			return $result;
	   } 

	   public function getUserData($user_seat){
		$this->connection();
		$get_id = "SELECT * FROM `student` WHERE `Sitting_number` = '$user_seat'";
		$id = $this->conn->query($get_id);
		$student_id = 0;
		foreach ($id as $row) :
			$student_id=$row['ID'];
		endforeach;
		$query = "SELECT * FROM `desires` WHERE `student_id` = '$student_id'";	   
		$result = $this->conn->query($query);
		return $result;
   } 

	   
	   public function addDesire($user_seat, $results){
		$this->connection();

			//die($percent);
			$get_id = "SELECT * FROM `student` WHERE `Sitting_number` = '$user_seat'";
			$id = $this->conn->query($get_id);
			$student_id = 0;
			foreach ($id as $row) :
				$student_id=$row['ID'];
			endforeach;
			foreach($results as $raw ){
				$uni = $raw['University'];
				//die($uni);
				$coll = $raw['College'];
				$maj = $raw['University major'];
		   	$query = "INSERT INTO `desires` (`Desire`,`Collage`, `Presentation_type`, `Enterprise_type`, `University_name`, `student_id`) VALUES ('$maj','$coll','تقديم لبكالريوس','تعليم عالي','$uni','$student_id')";
			   $result = $this->conn->query($query);   
		}
		
		   //	$query2 = "INSERT INTO `number_of_desires` (`desires`, `seatNumber`) VALUES ('$desiresNumber','$user_seat')";
		  
		   //	$result2 = $this->conn->query($query2);
		   	return $result;
	   } 
	   
        public function checkUser($seatNumber , $username){	 
			//$check = false;		
		 	$this->connection();
			$get_id = "SELECT * FROM `student` WHERE `Sitting_number` = '$seatNumber' AND `Student_name` = '$username'";
			$id = $this->conn->query($get_id);
			$student_id = 0;
			foreach ($id as $row) :
				$student_id=$row['ID'];
			endforeach;
			$registerd = "SELECT * FROM `desires` WHERE `student_id` = '$student_id'";
			$res = $this->conn->query($registerd);
			if(mysqli_num_rows($id) == 0){
				echo '<script type = "text/javascript">';
				echo 'alert("عفواً..معلومات التسجيل غير صحيحه")';
				echo '</script>';
			}elseif(mysqli_num_rows($res) == 0){
			 	$query = "SELECT * FROM `student`";
				$this->conn->query($query);
				if($this->conn->query($query)){
			    $result = $this->conn->query($query);
				foreach ($result as $row) :
				if($row['Sitting_number'] == $seatNumber){
					//$check = true;
                    $data = "SELECT * FROM `student` WHERE `Sitting_number` = '$seatNumber'";
				}
				endforeach;
						return $data;	
				}
			}else{
			echo '<script type = "text/javascript">';
			echo 'alert("عفواً..لقد قمت بالتسجيل مسبقاً")';
			echo '</script>';
			}
	}
}
?>