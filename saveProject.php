<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Saving your project</title>
    </head>
    <body>
        <?php
        $project  = $_POST['project'];
        $valid = true;

        //Check if the project field is empty 
        if(empty($project)){
            echo "Cannot input an empty project to do";
            $valid = false;
        }

        //If not empty parse data into the database
        if($valid == true){
        require 'db.php';
        $sql = "INSERT INTO projects (project) VALUES (:project)";

        $cmd = $db->prepare($sql);
        $cmd->bindParam(':project', $project, PDO::PARAM_STR, 100);

        $cmd->execute();

        $db = null;
 
        echo "projects saved";
        }
        ?>
    </body>
</html>