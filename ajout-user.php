<?php
require_once "functions/app_functions.php";

//on recupere la methode de type get
$method = $_SERVER['REQUEST_METHOD'];

//on verifie les donnée ont bien ete envoyé



if (isset($_POST['enregistrer'])){
    $motdepasse = !empty($_POST['mdp1']) ? $_POST['mdp1']:'';
    $email = !empty($_POST['email']) ? $_POST['email']:'';



//on recupére le infos saisie par le user
    $motdepasseValide= strlen(trim($motdepasse)) !== 0;

    $emailValide= filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


//on fait des verifications sur les saisies

    if(!$motdepasseValide){
        $msgmotdepasse = "Le mot de passe est requis pour ce champ";
    }
    if(!$emailValide){
        $msgEmail = "saisie non valide";
    }

    if($motdepasseValide && $emailValide){

        //connecte a la BDD
        $connexion = db_connexion();

        //Instruction sql insertion
        $sql = "insert into user (motdepasse,email) values (?,?)";

        //on prepare la requete
        $req_preparee = $connexion->prepare($sql);

        //on execute la requete en passant les valeurs
        try {
            $req_preparee->execute([$motdepasseValide,$emailValide]);

            header("Location:user.php");
        }catch (Exception $e){
            exit("<h2 class='text-danger text-center'>un probleme est survenu lors de l'execution de la requête</h2>");
        }
    }
}

?>


<?php build_header("Page Ajouter"); ?>

<div>

    <h1>Nouvel employé</h1>

    <form method="POST" autocomplete="off">


        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="email" name="email" required>
        </div>

        <?php
        if (!empty($msgEmail)){
            echo <<<EQT
            <small class="text-danger small">($msgEmail)</small>
EQT;
        }
        ?>
        <div class="form-group">
            <label for="motdepasse">motdepasse</label>
            <input type=password class="form-control" id="motdepasse" placeholder="motdepasse" name="mdp1" required>
        </div>

        <?php
        if (!empty($msgmotdepasse)){
            echo <<<EQT
            <small class="text-danger small">($msgmotdepasse)</small>       
      
EQT;
        }
        ?>

        <button type="submit" class="btn btn-primary" name="enregistrer">Enregistrer</button>

    </form>

</div>
