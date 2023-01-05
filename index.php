<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "pizzas";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

// enregistrer la requete dans une variable
$sql = 'SELECT title, ingredients, id FROM pizzas';

// executer la requetes
$results = mysqli_query($conn, $sql);

// Transformer en un tableau associative
$pizzas = mysqli_fetch_all($results, MYSQLI_ASSOC);

// Liberer les resultats
mysqli_free_result($results);

// fermer la connexion
mysqli_close($conn);



?>

<!DOCTYPE html>
<html lang="en">

<?php include("templates/header.php") ?>

<h4 class="center grey-text">Pizzas!</h4>

<div class="container">
    <div class="row">
        <?php foreach($pizzas as $pizza){?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6>
                            <?php echo htmlspecialchars($pizza['title']); ?>
                        </h6>
                        <ul>
                            <?php foreach(explode(',', $pizza['ingredients']) as $ing) {?>
                                <li> <?php htmlspecialchars($ing); ?></li>
                            <?php }?>
                        </ul>
                    </div>
                    <div class="card-action right-align">
                        <a href="#" class="brand-text">Plus d'informations...</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php include("templates/footer.php") ?>
    
</html>