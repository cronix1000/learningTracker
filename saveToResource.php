<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Saving what you want to learn</title>
    </head>
    <body>
        <?php
        $link = ($_POST['link']);                                                                                                                                                                                                                                                                                                                               
        $hobbyId = $_POST['hobbyId'];
        $projectId = $_POST['projectId'];
        

        //Validation

        require 'db.php';
        $sql = "INSERT INTO resources (link, hobbyId, projectId) VALUES (:link, :hobbyId, :projectId)";
        

        $cmd = $db->prepare($sql);
        $cmd->bindParam(':link', $link, PDO::PARAM_STR, 100);
        $cmd->bindParam(':hobbyId', $hobbyId, PDO::PARAM_INT);
        $cmd->bindParam(':projectId', $projectId, PDO::PARAM_INT);

        $cmd->execute();

        $db = null;

        echo "Hobby Saved";
        ?>
    </body>
</html>