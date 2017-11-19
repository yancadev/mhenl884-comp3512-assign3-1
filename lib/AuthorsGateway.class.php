<?php

/**
 * This is one of the extensions of the database library class
 * This class helps with connecting the application to access the Authors Database.
 */
class AuthorsGateway extends TableDataGateway {
public function __construct($connect) {
       parent::__construct($connect);
 }

/**
 * Returns the select statements to retrieve information about the books.
 * @return      the query results
 */
 protected function getSelectStatement() {
 return "SELECT BookID, ISBN10, ISBN13, Title, CopyrightYear, TrimSize, PageCountsEditorialEst
        as PageCount, Description, CoverImage, Status , Subcategories.SubcategoryID, SubcategoryName, Imprints.ImprintID, Imprint, BindingType from Books
        join Statuses on (Books.ProductionStatusID = Statuses.StatusID) join Subcategories on 
        (Books.SubcategoryID = Subcategories.SubcategoryID) join Imprints using (ImprintID) join BindingTypes using (BindingTypeID)";
 }

/* Returns the following fields and primary key
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