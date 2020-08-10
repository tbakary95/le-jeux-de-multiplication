<?php
require_once "functions/app_functions.php";

$connexion = db_connexion();

//on definit la variable page pour la pagination
$page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? (int)$_GET['page'] : 1;

//on definit le nombre d'enregistrement par page
$nb_employes_par_page = 2;
//requete SQL parametrée à preparer
$sql = "select * from user order by id limit ?, ?";

//on prepare la requete
$req_prepare = $connexion->prepare($sql);

//on lui passe les parametres
$req_prepare->bindValue(1,($page - 1) * $nb_user_par_page, PDO::PARAM_INT);
$req_prepare->bindValue(2, $nb_user_par_page, PDO::PARAM_INT);


//on execute la requete
$req_prepare->execute();

//on encapsule le résultat dans $user
$user = $req_prepare->fetchAll(PDO::FETCH_ASSOC);
// var_dump($employes);

$nb_user_total = $connexion->query("select count(*) from user")->fetchColumn();
?>

<?php
build_header("Page user");
?>


<div>
    <h1>Liste des employes</h1>
    <p>
        <a href="ajout-user.php.php" class="btn btn-primary">Créer</a>
    </p>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Prénom</th>
            <th scope="col">Date Naiss.</th>
            <th scope="col">Fonction</th>
            <th scope="col">Email</th>
            <th scope="col">Salaire</th>
            <th colspan="3" class="text-center">Actions</th>

        </tr>
        </thead>

    <tbody>
    <?php
    foreach ($employes as $employe){
        echo <<<EOT
                    <tr>
                         <td>{$employe['id']}</td>
                         <td>{$employe['prenom']}</td>
                         <td>{$employe['ddn']}</td>
                         <td>{$employe['fonction']}</td>
                         <td>{$employe['email']}</td>
                         <td>{$employe['salaire']}</td>
                         <td>
                         <a href="employe_modifier.php?id={$employe['id']}">Modifier</a>
</td>
                         <td>
                         <a href="details.php?id={$employe['id']}">Detail</a>
</td>
                         <td>
                         <a href="employe_supprimer.php?id={$employe['id']}">Supprimer</a>
</td>
  </tr>
EOT;
    }
    ?>
    </table>
    </tbody>


</div>

