<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Saving what you want to learn</title>
    </head>
    <body>
        <?php
        $toLearn  = $_POST['toLearn'];
        $valid = true;

        if(empty($toLearn)){
            echo "Cannot input an empty subject to learn";
            $valid = false;
        }


        if($valid == true){
        require 'db.php';
        $sql = "INSERT INTO hobbies (hobby) VALUES (:toLearn)";

        $cmd = $db->prepare($sql);
        $cmd->bindParam(':toLearn', $toLearn, PDO::PARAM_STR, 100);

        $cmd->execute();

        $db = null;
 
        echo "Hobby Saved";
        }
        ?>
    </body>
</html>