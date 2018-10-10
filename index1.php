<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
         $watestdb = new PDO('mysql:host=127.0.0.1;dbname=register', 'WATestUser1', 'WATestPwd1');
         
         print "Person's name is ".htmlspecialchars($_POST["name"]).".<br>" ;
         $insert = $watestdb->prepare("insert into people (name) values (:name)");
         $insert->bindValue(":name", $_POST["name"]);
         $insert->execute();
         
         $sql = "SELECT id FROM people WHERE name = '". $_POST["name"]."'";
         $result = $watestdb->query($sql);
            for ($i = 0; $i < $result->rowCount(); $i++)
            {
            $row = $result->fetch();
            $personid = $row["id"];
            }
            $result->closeCursor();
            

                  
         print " Person's job is ".htmlspecialchars($_POST["title"]).".<br>" ;
         print " Start of person's job ".htmlspecialchars($_POST["startdate"]).".<br>" ;
         print " End of person's job ".htmlspecialchars($_POST["enddate"])."." ;
         $insert = $watestdb->prepare("insert into jobs (personid,startdate, enddate, title) values (:personid,:startdate, :enddate, :title)");
         $insert->bindValue(":personid", $personid);
         $insert->bindValue(":startdate", $_POST["startdate"]);
         $insert->bindValue(":enddate", $_POST["enddate"]);
         $insert->bindValue(":title", $_POST["title"]);
         $insert->execute();
         
         
         
         print " Person's mother name is ".htmlspecialchars($_POST["mothername"])."." ;
         $insert = $watestdb->prepare("insert into people (name) values (:name)");
         $insert->bindValue(":name", $_POST["mothername"]);
         $insert->execute();
          
         $sql = "SELECT id FROM people WHERE name = '". $_POST["mothername"]."'";
         $result = $watestdb->query($sql);
            for ($i = 0; $i < $result->rowCount(); $i++)
            {
            $row = $result->fetch();
            $motherid = $row["id"];
            }
            $result->closeCursor();
            
         
         
         print " Person's father name is ".htmlspecialchars($_POST["fathername"]).".<br>" ;
         $insert = $watestdb->prepare("insert into people (name) values (:name)");
         $insert->bindValue(":name", $_POST["fathername"]);
         $insert->execute();
         
         $sql = "SELECT id FROM people WHERE name = '". $_POST["fathername"]."'";
         $result = $watestdb->query($sql);
            for ($i = 0; $i < $result->rowCount(); $i++)
            {
            $row = $result->fetch();
            $fatherid = $row["id"];
            }
            $result->closeCursor();
           
            
            
         $insert = $watestdb->prepare("insert into child (childid, motherid, fatherid) values (:personid, :motherid, :fatherid)");
         $insert->bindValue(":personid", $personid);
         $insert->bindValue(":motherid", $motherid);
         $insert->bindValue(":fatherid", $fatherid);
         $insert->execute();
         $insert=NULL;
         
        
        ?>
    </body>
</html>
