<!DOCTYPE html>
<html lang="en">
    <!-- basic head -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exercises</title>
    </head>
    <body>
        <h1>Exercises</h1>
        <?php
        // connect to the data base 
        $db = new PDO('mysql:host=172.31.22.43;dbname=Rielly200521134', 'Rielly200521134', 'GrvTOXXxP8');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //capture selected dropdown options 
        $upperBody = $_POST['upper-body'];
        $lowerBody = $_POST['lower-body'];
        $cardio = $_POST['cardio'];
        //use a bound parameter for each to pass the selected option as part of WHERE clause in a sql select statement
        $sql = "SELECT name FROM exercises WHERE name = :upperBody  Or name = :lowerBody OR name = :cardio";
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':upperBody', $upperBody);
        $cmd->bindParam(':lowerBody', $lowerBody);
        $cmd->bindParam(':cardio', $cardio);
        $cmd->execute();
        $exercises = $cmd->fetchAll();
        // loop through the results and display each exercise name in a unordered / bulleted list 
        echo "<h2>Selected Workout</h2>";
        echo "<ul>";
        foreach ($exercises as $exercise) {
            echo "<li><a href='delete-exercise.php?name=$exercise[0]'>$exercise[0]</a></li>";
        }
        // JS delete option for each exercise
        echo "<script>
            document.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', event => {
                    if (!confirm('Are you sure you want to delete this exercise?')) {
                        event.preventDefault();
                    }
                })
            })
        </script>";
        echo "</ul>";
        // disconnect
        $db = null;
        ?>

    </body>