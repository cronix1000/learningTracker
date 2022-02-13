<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Saving what you want to learn</title>
    </head>
    <body>
        <?php
        $link = trim($_POST['link']);                                                                                                                                                                                                                                                                                                                               
        $hobbyId = $_POST['hobbyId'];
        

        //Validation

        require 'db.php';
        $sql = "INSERT INTO resources (link, hobbyId) VALUES (:link, :hobbyId)";
        

        $cmd = $db->prepare($sql);
        $cmd->bindParam(':link', $link, PDO::PARAM_STR, 100);
        $cmd->bindParam(':hobbyId', $hobbyId, PDO::PARAM_INT);

        $cmd->execute();

        $db = null;

        echo "Hobby Saved";
        ?>
    </body>
</html>