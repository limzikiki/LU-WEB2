<?php

class db
{
    private $myconn;
    private $servername = "database";
    private $username = "root";
    private $password = "tiger";
    private $database = "lab2_lt21026";

    public function __construct()
    {
        // this code is automatically executed when an instance of the object is created
        $this->myconn = new mysqli(
            $this->servername,
            $this->username, $this->password,
            $this->database);
    }

    public function printAllRecords()
    {
        // Your code is here
        $sql = "SELECT * FROM AdministrativeUnits;";
        $results = $this->myconn->query($sql);
        if ($results->num_rows > 0) {
            while ($record = $results->fetch_assoc()) {
                echo "Id is <b>" . $record["id"] . "</b>, title is <b>" . $record['title'] . "</b>,  center is <b>" . $record['center'] . "</b>, population is <b>" . $record['population'] . "</b>, area is <b>" . $record['area'] . "</b><br>";
            }
        }
        echo "<br>";
    }

    public function addNewRecord($title, $center, $population=0, $area=0, $id = NULL)
    {

        if($id == NULL){
            $sql = "INSERT INTO AdministrativeUnits (title, center, population, area) VALUES ('{$title}', '{$center}', '{$population}', '{$area}');";
        }else{
            $sql = "INSERT INTO AdministrativeUnits (id, title, center, population, area) VALUES ('{$id}', '{$title}', '{$center}', '{$population}', '{$area}');";
        }
        return $this->myconn->query($sql);
    }

    public function deleteRecord($id)
    {
        $sql = "DELETE FROM AdministrativeUnits WHERE id={$id};";
        return $this->myconn->query($sql);

    }

    public function updateRecord($id, $title=null, $center=null, $population=null, $area=null)
    {
        $sql = "UPDATE AdministrativeUnits SET";
        $wasAdded = false;
        if($title!=null){
            $sql = $sql . " title='".$title."'";
            $wasAdded = true;
        }
        if($center!=null){
            if($wasAdded){
                $sql = $sql.",";
            }
            $sql = $sql . " center='".$center."'";
            $wasAdded = true;
        }
        if($population!=null){
            if($wasAdded){
                $sql = $sql.",";
            }
            $sql = $sql . " population='".$population."'";
            $wasAdded = true;
        }
        if($area!=null){
            if($wasAdded){
                $sql = $sql.",";
            }
            $sql = $sql . " area='".$area."'";
            $wasAdded = true;
        }
        $sql = $sql . " WHERE id='".$id."';";
        $this->myconn->query($sql);
        echo $this->myconn->error;
    }
}

// Here is how to use our object
$mydb = new db();
$mydb->printAllRecords();
echo $mydb->addNewRecord( "Krzysztof", "Kieslowski", 0,0,7);
echo $mydb->addNewRecord( "Krzysztof", "Kieslowski", 0,0,6);
$mydb->printAllRecords();
$mydb->deleteRecord(6);
$mydb->updateRecord(7, "Valentina", "Tereshkova");
$mydb->printAllRecords();
$mydb->deleteRecord(7);

