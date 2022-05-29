<?php
class database{
    public $connection=null;
    function __construct()
    {
       $this->ConnectionwithDb();
    }
    //property

    function ConnectionwithDb(){
        $this->connection=mysqli_connect("localhost","root","","project1");
    }

    function Insert($tableName,$post){
        $columns = implode(',',array_keys($post));
        $sql = "INSERT INTO $tableName (";
        $vals = implode("','",array_values($post));
        $sql.= $columns .") VALUES('";
        $sql.= $vals ."')";
        //echo $sql;
        // try{
        //     $result=mysqli_query($this->connection,$sql);
        // }catch(Exception $e){
        //     echo $e;
        // }
        $result=mysqli_query($this->connection,$sql);
       
if($result)
{
    echo "sucessful";

}
else 
{
    echo "not sucessful";

}
mysqli_close($this->connection);
        
    }
    function Select($tableName,$all="*",$criteria="",$criteriaValue="",$clause=""){
        
        $sql = "SELECT $all FROM $tableName";
        if($criteria!=""){
            $sql.=" WHERE $criteria = '$criteriaValue'";
        } 
        if($clause!=""){
            $sql.=$clause;
        }

        //  echo $sql;
        //  echo "<br>";
         
        $result=mysqli_query($this->connection,$sql);
        return $result;
    }

    function delete($tableName,$criteria,$criteriaValue) {
        $sql="delete from $tableName where $criteria = $criteriaValue";
        $result=mysqli_query($this->connection,$sql);
        // echo $sql;
    }
    function update($tableName,$datas,$criteria,$criteriaValue){
        $sql="UPDATE $tableName SET ";
        foreach($datas as $key=>$value){
            $sql.="$key ='$value',";
        }
        $sql=substr($sql, 0, -1);
        $sql.=" WHERE $criteria=$criteriaValue";
        //  echo $sql;
        $Result = mysqli_query($this->connection,$sql);
    }
       
    
}
        
$obj = new database();