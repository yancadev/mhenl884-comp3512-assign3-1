<?php

class EmployeesGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

 protected function getSelectStatement()
 {
 return "SELECT EmployeeID, FirstName, LastName, Address, City,
 Region, Country, Postal, Email FROM Employees ";
 }

 protected function getOrderFields() {
 return 'LastName, FirstName';
 }
 protected function getPrimaryKeyName() {
 return "EmployeeID";
 }

function outputAddresses($rows){
    $output='<br>';
    $output.="<font size='7 pt'>" . $rows['FirstName']." ".$rows['LastName']. "</font size>";
    $output.='<br>';
    $output.=$rows['Address'];
    $output.='<br>';
    $output.=$rows['City'] . " ";
    $output.=$rows['Region'] . '<br>';
    $output.=$rows['Country'] . " ";
    $output.= $rows['Postal'] . '<br>';
    $output.=$rows['Email'];
    return $output;
}
}

?>