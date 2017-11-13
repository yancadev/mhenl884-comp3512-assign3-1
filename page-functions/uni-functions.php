<?php
include 'includes/book-config.inc.php';

try{
    $db = new UniversitiesGateway($connection);
    $result = $db-> limitBy(20);
    
    //list universities
    $string = "";
    $string3 = "";
    foreach ($result as $row){
       $string .= createList($row);
    }
    
    //list States
    $db2=new StatesGateway($connection);
    $string1="";
    
    $result1 = $db2->findAll();
    foreach ($result1 as $row){
        $string1.= createStates($row);
    }
    
    $sql = "select UniversityID, Name, Address, City, State, Zip, Longitude, Latitude, Website from Universities";
    if(isset($_GET['id'])){
        $result2 = $db-> runDifferentSelect($sql, "State", $_GET['id'], 20);
        $string="";
        foreach($result2 as $row){
             $string .= createList($row);
        }
        
    }
    
    if(isset($_GET['id'])){
        $result3 = $db-> runDifferentSelect($sql, "UniversityID", $_GET['id'],1);
        foreach($result3 as $row){
            $string3 .=  outputDetails($row);
            $db = new UniversitiesGateway($connection);
            $result4 = $db-> limitBy(20);
            foreach ($result as $row){
                $string .= createList($row);
            };
        }
    }

    if(!isset($_GET['UniversityID'])){
        $id = '126182';
    }else{
        $id = $_GET['UniversityID'];
    }
}
catch (PDOException $e) {
    die($e->getMessage());
}

function createStates($rows)
{
    return '<option value="'.$rows['StateName'].'">'.$rows['StateName'].'</option>';
    
}

function createList($rows){
   return  "<li><a href='?id=".$rows['UniversityID']."'> ".$rows['Name']."</a></li>";
}

function outputDetails($rows){
  return "<h2>". $rows["Name"]."</h2>". "<p>" .$rows["Address"]. "<br>" . $rows["City"] . ", " . $rows["State"] . "  ". $rows["Zip"]. 
  "<br> Longitude: " . $rows["Longitude"] . " || Latitude: " .$rows["Latitude"]. "<br>" . $rows["Website"] . "</p>";
}
?>