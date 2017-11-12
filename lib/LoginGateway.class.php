<?php

class LoginGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

 protected function getSelectStatement()
 {
 return "select UserID, UserName, Password, Salt, State, DateJoined, DateLastModified from UsersLogin";
 }

 protected function getOrderFields() {
 return 'UserName, UserID';
 }
 protected function getPrimaryKeyName() {
 return "UserID";
 }

}

?>