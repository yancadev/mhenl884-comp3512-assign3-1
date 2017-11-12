<?php

class BooksGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

 protected function getSelectStatement()
 {
 return "SELECT BookID, ISBN10, ISBN13, Title, CopyrightYear,
 SubcategoryID, ImprintID, ProductionStatusID, BindingTypeID,
 TrimSize, PageCountsEditorialEst, Description,
 CoverImage FROM Books ";
 }

 protected function getOrderFields() {
 return 'Title, CoverImage';
 }
 protected function getPrimaryKeyName() {
 return "BookID";
 }
 
 
}

?>