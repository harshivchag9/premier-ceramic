<?php
	
	class mapdata
	{
		private $id;
		private $name;
		private $address;
		private $lat;
		private $lng;
		private $conn;
		private $tablename = "store";
		
		function setId($id) { $this->id = $id; }
		function getId() { return $this->id; }
		function setName($name) { $this->name = $name; }
		function getName() { return $this->name; }
		function setAddress($address) { $this->address = $address; }
		function getAddress() { return $this->address; }
		function setLat($lat) { $this->lat = $lat; }
		function getLat() { return $this->lat; }
		function setLng($lng) { $this->lng = $lng; }
		function getLng() { return $this->lng; }
		
		
		public function __construct() 
		{
			require_once("../database/database.config.php");
            $this->conn = Database::getConnection();
		}
		
		public function getdata(){
			$sql = "SELECT * FROM `Store` WHERE lat IS NULL AND lng IS NULL";
			$response = $this->conn->query($sql);
            $data = $response->fetch_all(MYSQLI_ASSOC);
			return $data;

		}
		public function Allgetdata(){
			
			$sql = "SELECT * FROM `Store`";
			$response = $this->conn->query($sql);
            $data = $response->fetch_all(MYSQLI_ASSOC);
			return $data;
		}
		
		public function updatelatlng() {
			$sql = "UPDATE `store` SET lat = :lat , lng = :lng WHERE id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':lat',$this->lat);
			$stmt->bindParam(':lng',$this->lng);
			$stmt->bindParam(':id',$this->id);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}

	}

?>