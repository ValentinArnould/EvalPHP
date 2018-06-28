<?php

//Création d'un e-commerce

//Pages attendues :
//- Une liste des produits
//- Un panier qui contient les produits ajoutés (par exemple vous pouvez afficher leur nom, etc)
//- Un paiement (fictif) qui prend en compte leur prix, et vous pourrez additionner les prix des produits pour créer une fausse 
//	facture
//- Identification et inscription (en session ou cookie, comme vous le souhaitez)

//Compétences attendues :
//- Utilisation de PHP ainsi que de fonctions
//- Utilisation de REGEX (expressions régulières) par exemple une REGEX pour valider une adresse email
//- Templating simple (un simple header et/ou footer suffira)
//- HTML5/CSS3 basique
//    ° Templates HTML autorisés, Bootstrap aussi

//Rendu :

//- Jeudi à 17h30 dernier délai
//- Un mail avec un lien qui contient votre dépot Github

//Intitulé du mail : 
//NOM PRENOM, DFS13 PHP1
//Adresse mail : a.corrot@it-akademy.fr

session_start();
if(isset($_SESSION['connexion'])) {

} else {
    $_SESSION['connexion'] = 'false';
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>L'e Commerce du temps</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.css" />
</head>
<body style="">


    <section class="hero is-light is-fullheight">
    <!-- Hero head: will stick at the top -->
    <div class="hero-head">
        <header class="navbar">
            <div class="container">
                <div id="navbarMenuHeroC" class="navbar-menu">
                    <div class="navbar-end">
                    <?php
                    if($_SESSION['connexion'] == 'false') {
                        
                        echo '
                        <div class="navbar-item">
						    <div class="field is-grouped">
                                <p class="control">
                                    <div class="dropdown" id="registerDrop">
                                        <div class="dropdown-trigger">
                                            <button class="button is-small is-dark is-outlined" id="login" onclick="DropRegister(this)" aria-haspopup="true" aria-controls="dropdown-register">
                                                <span class="icon"><i class="fa fa-user" aria-hidden="true"></i></span><span>Register</span>
                                            </button>
                                        </div>
                                        <div class="dropdown-menu" id="dropdown-register" role="menu">
                                            <div class="dropdown-content">
                                                <div class="dropdown-item">
                                                    <div class="field">
                                                        <div class="control">
                                                            <input class="input" placeholder="Utilisateur" name="Rutilisateur" autofocus="">
                                                        </div>
                                                    </div>

                                                    <div class="field">
                                                        <div class="control">
                                                            <input class="input" type="password" name="Rmdp" placeholder="Mot de passe">
                                                        </div>
                                                    </div>

                                                    <div class="field">
                                                        <div class="control">
                                                            <input class="input" type="password" name="mdp" placeholder="Confirmer Mot de passe">
                                                        </div>
                                                    </div>
                                                    <button class="button is-block is-dark is-fullwidth" onclick="register()">Register</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								</p>

								<p class="control">
                                    <div class="dropdown" id="loginDrop">
                                        <div class="dropdown-trigger">
                                            <button class="button is-small is-dark is-outlined" id="login" onclick="DropLogin(this)" aria-haspopup="true" aria-controls="dropdown-login">
                                                <span class="icon"><i class="fa fa-user" aria-hidden="true"></i></span><span>Login</span>
                                            </button>
                                        </div>
                                        <div class="dropdown-menu" id="dropdown-login" role="menu">
                                            <div class="dropdown-content">
                                                <div class="dropdown-item">
                                                    <div class="field">
                                                        <div class="control">
                                                            <input class="input" placeholder="Utilisateur" name="Lutilisateur" autofocus="">
                                                        </div>
                                                    </div>
    
                                                    <div class="field">
                                                        <div class="control">
                                                            <input class="input" type="password" name="Lmdp" placeholder="Mot de passe">
                                                        </div>
                                                    </div>
                                                    <button class="button is-block is-dark is-fullwidth" onclick="login()">Login</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								</p>
							</div>
                        </div>';
                    } else if ($_SESSION['connexion'] == 'true') {
                        echo '
                            <div class="columns">
                                <div class="column">
                                    <span>Bienvenue ' . $_SESSION['utilisateur'] . '</span> <button class="button" onclick="logout()">Déconnexion</button>
                                </div>
                            </div>
                        
                        ';
                    }
                    ?>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <!-- Hero content: will be in the middle -->
    <div class="hero-body">
        <div class="container has-text-centered">
        <h1 class="title is-1">Bienvenue sur À Temps Porté, prenez votre temps, et le bon</h1>
        <h3 class="subtitle is-3">Magasin de vente de temps en ligne</h3>
        </div>
    </div>

    <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot">
        <nav class="tabs is-boxed is-fullwidth">
        <div class="container">
            <ul>
            <li class="is-active"><a href="index.php">Accueil</a></li>
            <li><a href="produits.php">Produits</a></li>
            <li><a href="panier.php">Panier</a></li>
            <li><a>À propos</a></li>
            <!-- <li><a>Components</a></li> -->
            <!-- <li><a>Layout</a></li> -->
            </ul>
        </div>
        </nav>
    </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script>
        function DropLogin(button) {
            $('#loginDrop').toggleClass('is-active');
        }
        function DropRegister(button) {
            $('#registerDrop').toggleClass('is-active');
        }

        function test() {
            alert('yolo');
        }
        function login() {
            var user = $('input[name=Lutilisateur]').val();
            var password = $('input[name=Lmdp]').val();
            $.ajax({
                url: 'functions.php',
                data: {
                    function: 'login',
                    user: user,
                    grainDeSel: password
                },
                type: 'POST',
                success: function(msg) {
                    alert(msg);
                    window.location.href = "index.php";
                }               
            });
        }
        function register() {
            alert('Plus tard je pense (je le continuerai)');
        }
        function logout() {
            $.ajax({
                url: 'functions.php',
                data: {
                    function: 'logout',
                },
                type: 'POST',
                success: function(msg) {
                    //alert(msg);
                    window.location.href = "index.php";
                }               
            });
        }
    </script>
</body>
</html>