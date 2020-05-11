<?php
class brugerskodata 
{
    public function __construct($con) 
    {
        if (!$con) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }
        else 
        {
            $this->connection = $con;
        }
    }
    
    private $Id;
    private $Navn;
    private $Email;
    private $Alder;
    private $Skostørrelse;
    
    public function setId($Id){$this->Id = $Id;}
    public function getId(){return $this->Id;}
    public function setNavn($Navn){$this->Navn = $Navn;}
    public function getNavn(){return $this->Navn;}
    public function setEmail($Email){$this->Email = $Email;}
    public function getEmail(){return $this->Email;}
    public function setAlder($Alder){$this->Alder = $Alder;}
    public function getAlder(){return $this->Alder;}
    public function setSkostørrelse($Skostørrelse){$this->Skostørrelse= $Skostørrelse;}
    public function getSkostørrelse(){return $this->Skostørrelse;}
    
    public function insert() 
    {
        $sql = "INSERT INTO brugerskodata (Navn, Email, Alder, Skostørrelse) VALUES ('".$this->Navn."', '".$this->Email."', '" .$this->Alder . "', '" . $this->Skostørrelse . "')";
        if (mysqli_query($this->connection, $sql)) 
        {
            echo "New record created successfully";
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
        }
    }
    public function update() 
    {
        $sql = "UPDATE brugerskodata SET Navn = '" . $this->Navn . "', Email = '" . $this->Email . "', Alder = '" . $this->Alder . "', Skostørrelse = '" . $this->Skostørrelse. "' WHERE Id = '" . $this->Id . "'";
        if (mysqli_query($this->connection, $sql)) 
        {
            echo "Record updated successfully";
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
        }
    }
    public function read() 
    {
        $dataListe = array();
        $counter = 0;
        $sql = "SELECT Id, Navn, Email, Alder, Skostørrelse FROM brugerskodata";
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
                $tempRow = array($row["Id"], $row["Navn"], $row["Email"], $row["Alder"], $row["Skostørrelse"]);
                for($i = 0; $i < count($tempRow); $i++)
                {
                    $dataListe[$counter][$i] = $tempRow[$i];
                }
                $counter++;
            }
            return $dataListe;
        }
        else
        {
            return false;
        }
    }
    public function readSko() 
    {
        $dataListe = array();
        $counter = 0;
        $sql = "SELECT Skostørrelse FROM brugerskodata";
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
                $dataListe[$counter] = $row["Skostørrelse"];
                $counter++;
            }
            return $dataListe;
        }
        else
        {
            return false;
        }
    }
}
