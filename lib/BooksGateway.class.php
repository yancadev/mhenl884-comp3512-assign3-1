<?php

/**
 *This class helps with connecting the application to access the Books Database.
 */
class BooksGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

/**
 *Returns the following select statement in the Books table.
 * @return      the result of the query.
 */
 protected function getSelectStatement()
 {
 return "SELECT BookID, ISBN10, ISBN13, Title, CopyrightYear,
         SubcategoryID, ImprintID, ProductionStatusID, BindingTypeID,
         TrimSize, PageCountsEditorialEst, Description,
         CoverImage FROM Books ";
 }

/** 
* Returns the following fields and primary key
* @return      The title, cover image and bookID
*/
 protected function getOrderFields() {
 return 'Title, CoverImage';
 }
 
 protected function getPrimaryKeyName() {
 return "BookID";
 }
 
 
}

?>