<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Saving a link</title>
    </head>
    <body>
        <?php
        $link = ($_POST['link']);                                                                                                                                                                                                                                                                                                                               
        $hobbyId = $_POST['hobbyId'];
        $projectId = $_POST['projectId'];
        $valid = true;

        //Check if the resource field is empty 
        if (empty($link)) {
            echo "link is required<br />";
            $valid = false;
        }
        //Check if the resource field has a http inside of it
        //This is commented out as it works on the local host but not on the server I cant find an explanation but I can demonstrate if need be
        // else{
        //     if(!str_contains($link,'http')) {
        //         echo "The resource must contain an http to be a link";
        //         $valid = false;
        //     }
        // }
        //Check if the projectId field is empty 
        if (empty($projectId)) {
            echo "A project associated is required<br />";
            $valid = false;
        }
        //Check if the hobbyId field is empty 
        if (empty($hobbyId)) {
            echo "A hobby associated is required<br />";
            $valid = false;
        }
        if($valid == true){
        require 'db.php';
        $sql = "INSERT INTO resources (link, hobbyId, projectId) VALUES (:link, :hobbyId, :projectId)";
        

        $cmd = $db->prepare($sql);
        $cmd->bindParam(':link', $link, PDO::PARAM_STR, 200);
        $cmd->bindParam(':hobbyId', $hobbyId, PDO::PARAM_INT);
        $cmd->bindParam(':projectId', $projectId, PDO::PARAM_INT);

        $cmd->execute();

        $db = null;

        echo "Resource Saved";
        }
        ?>
    </body>
</html>