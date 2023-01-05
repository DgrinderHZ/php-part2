<?php
require_once('config/db_connect.php');
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
        <?php foreach($pizzas as $pizza): ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6>
                            <?php echo htmlspecialchars($pizza['title']); ?>
                        </h6>
                        <ul>
                            <?php foreach(explode(',', $pizza['ingredients']) as $ing): ?>
                                <li> <?php htmlspecialchars($ing); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card-action right-align">
                        <a href="details.php?id=<?php echo htmlspecialchars($pizza['id']); ?>" class="brand-text">Plus d'informations...</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <?php if (count($pizzas) >= 3) : ?>
            <p>fgjfdhg</p>
        <?php else: ?>
            <p>fgjkfdhg</p>
        <?php endif; ?>
        
    </div>
</div>

<?php include("templates/footer.php") ?>
    
</html>