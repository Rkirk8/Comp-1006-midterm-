<!DOCTYPE html>
<html lang="en">
    <!-- basic head -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workout Selection</title>
</head>
<body>
    <h1>Choose a workout</h1>
    <!-- form -->
    <form method="post" action="exercises.php" >
        <!-- dynamic dropdowns populated from mysql-->
        <!-- Upper Body-->
        <fieldset class="Upper-Body">
            <label for="upper-body">Upper-Body</label>
            <select name="upper-body" id="upper-body" required>
                <?php
                // connect to the data base and test connection
                $db = new PDO('mysql:host=172.31.22.43;dbname=Rielly200521134', 'Rielly200521134', 'GrvTOXXxP8');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // set up query and run it
                $sql = "SELECT name FROM exercises WHERE workout = 'Upper Body'";
                $cmd = $db->prepare($sql);
                $cmd->execute();
                $upperBody = $cmd->fetchAll();
                // loop through the results and add them to the dropdown
                foreach ($upperBody as $upperBody) {
                    echo "<option value='$upperBody[0]'>$upperBody[0]</option>";
                }
                ?>
            </select>
        </fieldset>
        <!-- Lower Body-->
        <fieldset class="Lower-Body">
            <label for="lower-body">Lower-Body</label>
            <select name="lower-body" id="lower-body" required>
                <?php
                // set up new query and run it 
                $sql = "SELECT name FROM exercises WHERE workout = 'Lower Body'";
                $cmd = $db->prepare($sql);
                $cmd->execute();
                $lowerBody = $cmd->fetchAll();
                // loop through the results and add them to the dropdown
                foreach ($lowerBody as $lowerBody) {
                    echo "<option value='$lowerBody[0]'>$lowerBody[0]</option>";
                }
                ?>
            </select>
        </fieldset>
        <!-- Cardio-->
        <fieldset class="Cardio">
            <label for="cardio">Cardio</label>
            <select name="cardio" id="cardio" required>
                <?php
                // set up new query and run it
                $sql = "SELECT name FROM exercises WHERE workout = 'Cardio'";
                $cmd = $db->prepare($sql);
                $cmd->execute();
                $cardio = $cmd->fetchAll();
                // loop through the results and add them to the dropdown
                foreach ($cardio as $cardio) {
                    echo "<option value='$cardio[0]'>$cardio[0]</option>";
                }
                // disconnect from the database
                $db = null;
                ?>
            </select>
        </fieldset>
        <!-- "get workout" button -->
        <button type="submit">Get Workout</button>
    </form>
</body>
</html>
