
<?php
require_once "functions/app_functions.php";
build_header("Login Page");
?>





<div class="container">
    <h2>Login</h2>
    <form action="jeux-multiplication.php" method="post">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Entre votre email" name="email">
        </div>
        <div class="form-group">
            <label for="pwd">Mot de passe:</label>
            <input type="password" class="form-control" id="motdepasse" placeholder="Entre votre mot de passe" name="motdepasse">
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary" >Submit</button>
    </form>
</div>
