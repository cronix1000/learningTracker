<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Saving what you want to learn</title>
    </head>
    <body>
        <?php
        $project  = $_POST['project'];
        $valid = true;

        if(empty($project)){
            echo "Cannot input an empty project to do";
            $valid = false;
        }


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