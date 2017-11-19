<?php
/**
 * This class helps with connecting the application to access the Books and Statuses Database.
 */
class ImprintsGateway extends TableDataGateway {
 public function __construct($connect) {
        parent::__construct($connect);
 }

/**
 * Returns the select statements to retrieve information about the books.
 * @return      the query results
 */
 protected function getSelectStatement()
 {
 return "SELECT BookID, ISBN10, ISBN13, Title, CopyrightYear, TrimSize, PageCountsEditorialEst
        as PageCount, Description, CoverImage, Status, Subcategories.SubcategoryID, SubcategoryName, Imprints.ImprintID, Imprint, BindingType FROM Books
        JOIN Statuses ON (Books.ProductionStatusID = Statuses.StatusID) JOIN Subcategories ON 
        (Books.SubcategoryID = Subcategories.SubcategoryID) JOIN Imprints USING (ImprintID) JOIN BindingTypes USING (BindingTypeID)";
 }

/** 
* Returns the following fields and primary key
* @return      The title, cover image and bookID.
*/
 protected function getOrderFields() {
 return 'Title, CoverImage';
 }
 
 protected function getPrimaryKeyName() {
 return "BookID";
 }
}

?>