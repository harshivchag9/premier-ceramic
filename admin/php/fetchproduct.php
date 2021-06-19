<?php  
  require_once("../../database/database.config.php");
	$db = new Database();
	$sql = Database::getConnection();
  $query = "SELECT * FROM product_detail ORDER BY product_id DESC";
  $statement = $sql->prepare($query);
  if($statement->execute())
  {
    while($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
      $data[] = $row;
    }
    echo json_encode($data);
  }
?>