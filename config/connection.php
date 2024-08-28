<?php
   require_once "config.php";
   pristupStranici();
   try{
     // $conn = new PDO("mysql:host=".SERVER.";dbname=".DATABASE.";charset=utf8", USERNAME, PASSWORD);
     $conn = new PDO("mysql:host=localhost;dbname=movie_review;charset=utf8", "root", "");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
   }
   catch(PDOException $ex){
      echo $ex->getMessage();
   }
  
   function executeQuery($query){
      global $conn;
      return $conn->query($query)->fetchAll();
   }
  
   function pristupStranici(){
      @$open = fopen(LOG_FAJL, "a");
      if($open){
          $date = date("d-m-Y H:i:s");
          @fwrite($open, "{$_SERVER['PHP_SELF']}\t{$date}\t{$_SERVER['REMOTE_ADDR']}\n");
          @fclose($open);
      }
   }
   
   function upisGresaka($greska){
      @$open = fopen(GRESKE_FAJL, "a");
      $upis = $greska."\t".date("d-m-Y H:i:s")."\n";
      @fwrite($open,$upis);
      @fclose($open);
   }
   

   /* try{
        $conn = new PDO("mysql:host=localhost;dbname=movie_review;charset=utf8", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);    
    }catch(PDOException $e){
        echo $e->getMessage();
    }*/
