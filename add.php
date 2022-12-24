<?php

$errors = array('email'=> '',
                'title'=>'',
                'ingredients'=>'');
if(isset($_POST['submit'])){
    // echo htmlspecialchars($_POST['email']);
    if(empty($_POST['email'])){
        $errors['email'] = 'Email field is required!';
    }else{
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email']="email must be a valide email.";
        }
    }

    if(empty($_POST['title'])){
        $errors['title'] = 'title field is required!';
    }else{
        $title = $_POST['title'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
            $errors['title'] = "title must be letters and spaces.";
        }
    }

    if(empty($_POST['ingredients'])){
        $errors['ingredients']=  'ingredients field is required!';
    }else{
        $ingredients = $_POST['ingredients'];
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
            $errors['ingredients']=  "ingerdients must be letters and spaces and comma separated.";
        }
    }
    
    if (array_filter($errors)) {
        //echo "il y a des errors...";
    }else{
        //echo "c'est bien...";
        // redirect
        header('Location: index.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include("templates/header.php") ?>

<section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <form action="add.php" class="white" method="post">
        <label for="email">Email:</label>
        <input type="text" name="email">
        <div class="red-text"> <?php echo $errors['email']; ?></div>
        <label for="title">Pizza title:</label>
        <input type="text" name="title">
        <div class="red-text"> <?php echo $errors['title']; ?></div>
        <label for="ingredients">Ingredients (comma separated):</label>
        <input type="text" name="ingredients">
        <div class="red-text"> <?php echo $errors['ingredients']; ?></div>
        <div class="center">
            <input type="submit" value="submit" name="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>

<?php include("templates/footer.php") ?>
    
</html>