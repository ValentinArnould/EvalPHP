<?php

session_start();

if(isset($_COOKIE['comptes'])) {
    $comptes = unserialize($_COOKIE['comptes']);
    $passwords = unserialize($_COOKIE['passwords']);
} else {
    $arrU = ['admin']; 
    $securisedComptes = setcookie('comptes', serialize($arrU), time() + 3600*3600, null, null, false, true);
    $SPwd = crypt( '0000', 'ZileanSwagger#Discord');
    $arrP = [$SPwd];
    $securisedMdp = setcookie('passwords', serialize($arrP), time() + 3600*3600, null, null, false, true);
    $comptes = unserialize($_COOKIE['comptes']);
    $passwords = unserialize($_COOKIE['passwords']);
}

if(isset($_POST['function'])) {
    if($_POST['function'] == 'ajoutPanier') {
        ajoutPanier($_POST['article']);
    } elseif($_POST['function'] == 'login') {
        login($_POST['user'],$_POST['grainDeSel'],$comptes,$passwords); //le mot de passe est appelé grainDeSel pour tromper, on sait jamais
    } elseif($_POST['function'] == 'logout') {
        logout();
    }
}

function login($user,$password,$comptes,$pwds) {
    $Uindex = array_search($user, $comptes);
    if($Uindex != 0 and $Uindex == false) {
        var_dump('Utilisateur ou mot de passe incorrect '); //ne pas faire savoir si un utilisateur existe
    } else {
        $passedPwd = crypt($password, 'ZileanSwagger#Discord');
        if($pwds[$Uindex] == $passedPwd) {
            $_SESSION['connexion'] = 'true';
            $_SESSION['utilisateur'] = $comptes[$Uindex];
            echo "Connexion réussie";
        } else {
            echo('Utilisateur ou mot de passe incorrect ');
        }
    }
}

function logout() {
    $_SESSION['connexion'] = 'false';
    unset($_SESSION['utilisateur']);
    unset($_SESSION['panier']);
    unset($_SESSION['exPanier']);
    echo 'wut ' . $_SESSION['connexion'];
}
function register() {
    alert('Plus tard je pense (je le continuerai)');
}


function ajoutPanier($article)
{
    if($_SESSION['connexion'] == "false") {
        echo 'veuillez vous connecter pour acheter';
    } else if($_SESSION['connexion'] == "true") {
        if(isset($_SESSION['panier'])) {
            $newA = 'true';
            foreach ($_SESSION['panier'] as $key => $value) {
                if($value == $article) {
                    $newA = 'false';
                    $_SESSION['exPanier'][$key] = $_SESSION['exPanier'][$key] + 1;
                }
            }
            if($newA == 'true') {
                array_push($_SESSION['panier'], $article);
                array_push($_SESSION['exPanier'], 1);
            }
        } else {
            $_SESSION['panier'] = [$article];
            $_SESSION['exPanier'] = [1];
        }
        var_dump($_SESSION['panier']);
    }
}




?>