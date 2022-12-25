<?php
class dbServices{
    private $hostName;
    private $userName;
    private $password;
    private $dbName;
    private $dbcon;
    function __construct($hostName,$userName,$password,$dbName)
    {
        $this->hostName = $hostName;
        $this->userName = $userName;
        $this->password = $password;
        $this->dbName = $dbName;
    }
    function dbConnect(){
        $dbcon = new mysqli($this->hostName,$this->userName,$this->password,$this->dbName);
        if($dbcon->connect_error){
            return false;
        }
        $this->dbcon = $dbcon;
        return $dbcon;
    }
    function closeDb(){
        $this->dbcon->close();
    }
    function insert($tbName,$valuesArray,$fieldArray=null){
        if($fieldArray!=null){
            $fields = "(".implode(',',$fieldArray).")";
            // echo $fields;
        }else{
            $fields = '';
        }
        $values = implode(',',$valuesArray);
        $insertCmd = "INSERT IGNORE INTO $tbName $fields VALUES ($values)";
        if($this->dbcon->query($insertCmd) === TRUE){
            return true;
        }
        return false;
    }
    function delete($date){
        // $where = "WHERE date = '2022-12-27'";
        // $deleteCmd = "DELETE FROM appo_tb WHERE date = '2022-12-27'";
        $deleteCmd = "DELETE FROM appo_tb WHERE date = '".$date."'";
        if($this->dbcon->query($deleteCmd) === TRUE){
            return true;
        }
        return false;
    }
    
    function update($tbName,$updateFields, $conditionArray, $operator=null){
        $updateFieldStr = "";
        foreach($updateFields as $field=>$val){
            $updateFieldStr .= "$field=$val";
            if($field!=array_key_last($updateFields)){
                $updateFields .= ",";
            }
        }
        $where = "WHERE ";
        foreach($conditionArray as $key=>$value){
            $where .= "$key=$value";
            if($key!=array_key_last($conditionArray)){
                $where .= " $operator ";
            }
        }
        $updateQuery = "UPDATE $tbName SET $updateFieldStr $where";
        if($this->dbcon->query($updateQuery)===TRUE){
            return true;
        }else{
            return false;
        }
    }
    function select($tbName,$conditionArray=null,$operator=null,$fieldArray=null){
        if($fieldArray!=null){
            $fields = implode(',',$fieldArray);
        }else{
            $fields = "*";
        }
        if($conditionArray!=null){
            $where = "WHERE ";
            foreach($conditionArray as $key=>$value){
                $where .= "$key=$value";
                if($key!=array_key_last($conditionArray)){
                    $where .= " $operator ";
                }
            }
        }else{
            $where = '';
        }
        $selectCmd = "SELECT $fields FROM $tbName $where";
        $result = $this->dbcon->query($selectCmd);        
        return $result;
    }
}
?>