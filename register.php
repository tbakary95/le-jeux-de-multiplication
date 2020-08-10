<?php

require_once "functions/app_functions.php";
build_header("register Page");
?>
<h3> REGISTER </h3>
<form class="form" autocomplete="off">

    <div class="form-group">
    <label for="inputIdentifiant">Identifiant(email)</label>
    <input type="email" class="form-control" id="email" name="email">
    </div>

    <div class="form-group2">
        <label for="inputPassword">Mot de passe</label>
        <input type="password" class="form-control" id="inputAddress" placeholder="entre mot de passe" name="mdp1">
    </div>
    <div class="form-group3">
        <label for="inputPassword2">Comfirme mot de passe</label>
        <input type="password" class="form-control" id="inputAddress2" placeholder="entre mot de passe a nouveau" name="mdp2">

        <button type="submit" class="btn btn-primary">Sign in</button>
    </div>

    </div>


    </label>
    </div>
    </div>

</form>
