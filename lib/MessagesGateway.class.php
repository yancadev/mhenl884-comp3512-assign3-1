<?php

class EmployeesGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

 protected function getSelectStatement()
 {
 return "select  employ.EmployeeID, message.EmployeeID, message.MessageDate, message.Category, message.Content, 
        message.ContactID, contact.ContactID from Employees employ, EmployeeMessages message, Contacts contact
        where employ.EmployeeID = message.EmployeeID and message.ContactID=contact.ContactID and employ.EmployeeID=:id";
 }

 protected function getOrderFields() {
 return 'LastName, FirstName';
 }
 protected function getPrimaryKeyName() {
 return "EmployeeID";
 }

}

?>