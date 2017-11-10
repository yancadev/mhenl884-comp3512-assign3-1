<?php

class UniHelper
{
    protected $connection; //PDO object
    protected $uniClassObject; //PaintingsDB class object
     
/**
     * This is the constructor for the class
     * @oaram       The POD class object
     * @oarma       The UniversitiesDB class boject
     */
    function __construct (DBhelper $connection, UniversitiesDB $uniClassObject)
    {
        $this->connection = $connection;
        $this->uniClassObject = $uniClassObject;
    }
    
     /**
     * This method creates the drop-down list for the different university to filter through
     * @result       The html for the drop-down list
     */
    function printUniList()
    {
        $result = $this->uniClassObject->getUniListOrderedByAlphabet();
        foreach($result as $row)
        {
            echo '<option value="'. $row['UniversityID']."|" .$row['Name'].'">' . utf8_encode($row['Name']) . '</option>';
        }
    }
    
    
}








?>