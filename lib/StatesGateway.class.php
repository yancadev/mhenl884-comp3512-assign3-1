<?php

class StatesGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

 protected function getSelectStatement()
 {
 return "select StateID, StateAbbr, StateName from States order by StateName";
 }

 protected function getOrderFields() {
 return 'StateName';
 }
 protected function getPrimaryKeyName() {
 return "StateID";
 }
}

?>