<?php

class UniversitiesGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

 protected function getSelectStatement()
 {
 return "select UniversityID, Name, Address, City, State, Zip, Longitude, Latitude, Website from Universities";
 }

 protected function getOrderFields() {
 return 'Name';
 }
 protected function getPrimaryKeyName() {
 return "UniversityId";
 }
 
 public function outputDetails($id){
  $sql = $this->getSelectStatement() . ' WHERE ' . $this->getPrimaryKeyName() . '=:id';
  $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':id' => $id));
  $statement->fetch();
  $output = "";
  foreach($statement as $rows){
   $output .= "<h2>". $rows["Name"]."</h2>"; 
   $output .= "<p><br>" .$rows["Address"];
   $output .= "<br>" . $rows["City"] . ", " . $rows["State"] . "  ". $rows["Zip"];
   $output .= "<br> Longitude: " . $rows["Longitude"] . " || Latitude: " .$rows["Latitude"];
   $output .= "<br>" . $rows["Website"] . "</p>";
  }
  return $output;
 }
}
?>