<?php
require_once('config/db_connect.php');
 // Recuperer les donnees de GET
 if (isset($_GET['id'])) {

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // enregistrer la requete dans une variable
    $sql = "SELECT * FROM pizzas WHERE id = $id";

    // executer la requetes
    $result = mysqli_query($conn, $sql);

    // Transformer en un tableau associative
    $pizza = mysqli_fetch_assoc($result);

    // Liberer les resultats
    mysqli_free_result($result);

    // fermer la connexion
    mysqli_close($conn);
 }

?>
<!DOCTYPE html>
<html lang="en">
<?php include("templates/header.php") ?>
<div class="container center">
    <h2>Details</h2>
    <?php if ($pizza): ?>
       <h4> <?php echo htmlspecialchars($pizza['title']); ?></h4>
       <p>Created by: <?php echo htmlspecialchars($pizza['email']); ?></p>
       <p>Created at: <?php echo date($pizza['created_at']); ?></p>
    <?php else: ?>
        <p>no data</p>
    <?php endif; ?>
</div>

<?php include("templates/footer.php") ?>
</html>