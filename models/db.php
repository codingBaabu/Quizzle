<?php
class Connect{
         function select_as_assoc($conn, $table){
            try {
                $sql= "SELECT * FROM $table";
                $result= mysqli_query($conn, $sql);
                return mysqli_fetch_all($result, MYSQLI_ASSOC);
            } catch(Exception $e) {}
        }

         function select_last($conn, $table, $field){
            try {
                $sql = "SELECT $field FROM $table ORDER BY $field DESC LIMIT 1";
                $result= mysqli_query($this->get_connection(), $sql);
                $idRow = mysqli_fetch_assoc($result);
                return $idRow[$field];
            } catch(Exception $e) {}
        }

        function select_row($conn, $table, $condition, $condition_value){
            try {
                $sql= "SELECT * FROM $table WHERE $condition=$condition_value";
                $result= mysqli_query($conn, $sql);
                return mysqli_fetch_assoc($result);
            } catch(Exception $e) {}
        }

        function get_connection(){
           try {
                $conn = mysqli_connect("localhost", "admin", "", "quizzle");
                if(!$conn){
                    echo mysqli_connect_error();
                }

                return $conn;
            } catch(Exception $e) {}
        }

        function insert($conn, $table, $fields, $values){
            $sql= "INSERT INTO $table ($fields) VALUES ($values)";
            try {
                mysqli_query($conn, $sql);
            } catch(Exception $e) {}
        }

        function insert_where($conn, $table, $fields, $values, $condition, $condition_value){
            $pairs=[];
            for ($i=0; $i<sizeof($fields);$i++){
                $pair="$fields[$i]=$values[$i]";
                array_push( $pairs, $pair);
            }
            $str_pairs=implode(',', $pairs);
            $sql= "UPDATE $table SET $str_pairs WHERE $condition=$condition_value";
            try {
                mysqli_query($conn, $sql);
            } catch(Exception $e) {}
        }

        function insert_where_multiple($conn, $table, $fields, $values, $condition, $condition_value, $condition2, $condition_value2){
            $pairs=[];
            for ($i=0; $i<1;$i++){
                $pair="$fields=$values";
                array_push( $pairs, $pair);
            }
            $str_pairs=implode(',', $pairs);
            $sql= "UPDATE $table SET $str_pairs WHERE $condition=$condition_value AND $condition2=$condition_value2";
            
            try {
                mysqli_query($conn, $sql);
            } catch(Exception $e) {}

        }

        function delete_where($conn, $table, $condition, $condition_value){
            $sql= "DELETE FROM $table WHERE $condition=$condition_value; ";
            try {
                mysqli_query($conn, $sql);
            } catch(Exception $e) {}

            
        }

        function updateDB($conn, $table, $field, $field_value, $condition, $condition_value){
            $sql= "UPDATE $table SET $field=$field_value WHERE $condition=$condition_value; ";
            try {
                mysqli_query($conn, $sql);
            } catch(Exception $e) {}
        }

        function updateMultipleDB($conn, $table, $field, $field_value, $condition, $condition_value, $condition2, $condition_value2){
            $sql= "UPDATE $table SET $field=$field_value WHERE ($condition=$condition_value AND $condition2=$condition_value2); ";
            try {
                mysqli_query($conn, $sql);
                //$_SESSION['test'] = $sql;
            } catch(Exception $e) {}
        }
    }
?>