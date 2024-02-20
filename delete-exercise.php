<!-- read confirm parameter form url and delete exercise from database -->
<?php
$name = $_GET['name'];
// connect to the data base
$db = new PDO('mysql:host=172.31.22.43;dbname=Rielly200521134', 'Rielly200521134', 'GrvTOXXxP8');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// delete exercise from database
$sql = "DELETE FROM exercises WHERE name = :name";
$cmd = $db->prepare($sql);
$cmd->bindParam(':name', $name);
$cmd->execute();
// disconnect from the database
$db = null;
?>
<!-- after deleting from table, redirect to select-workout -->
<script>
    window.location.href = "select-workout.php";
</script>
