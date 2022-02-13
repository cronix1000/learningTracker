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
        $valid = true;
        // input validation
        if (empty($link)) {
            echo "Name is required<br />";
            $ok = false;
        }
        else {
            if (!str_contains($link,'http')) {
                echo "The resource must contain an http to be a link";
                $ok = false;
            }
        }

        if (empty($projectId)) {
            echo "A project associated is required<br />";
            $ok = false;
        }
        
        if (empty($hobbyId)) {
            echo "A hobby associated is required<br />";
            $ok = false;
        }
        if($valid == true){
        require 'db.php';
        $sql = "INSERT INTO resources (link, hobbyId, projectId) VALUES (:link, :hobbyId, :projectId)";
        

        $cmd = $db->prepare($sql);
        $cmd->bindParam(':link', $link, PDO::PARAM_STR, 100);
        $cmd->bindParam(':hobbyId', $hobbyId, PDO::PARAM_INT);
        $cmd->bindParam(':projectId', $projectId, PDO::PARAM_INT);

        $cmd->execute();

        $db = null;

        echo "Hobby Saved";
        }
        ?>
    </body>
</html>