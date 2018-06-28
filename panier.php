<?php 

    session_start();
    $produits = ["Temps classique","Double dose","Temps de pause","Temps naturel","Temps de deuil","D'Antemps","Temps Menstruel","Temps intime","Temps d'océan","Lever de Soleil","Temps professionnel","Revitalisant","Immortalité","Temps en bouteille","Temps de secours"];
    $prix = [5,12,8,16,10,6,35,24,30,56,80,72,150,92,65];
    $descriptions = ["temps"];

    //mettre l'index d'un article
    $panier = $_SESSION['panier'];
    $exPanier = $_SESSION['exPanier'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>L'e Commerce du temps</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.css" />
    <link rel="stylesheet" href="produits.css" />
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
                                                    <input class="input" placeholder="Utilisateur" name="utilisateur" autofocus="">
                                                </div>
                                            </div>
    
                                            <div class="field">
                                                <div class="control">
                                                    <input class="input" type="password" name="mdp" placeholder="Mot de passe">
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
    <div class="hero-body" style="align-items: stretch">
        <div class="container has-text-centered">

            <h3 class="title is-3">Votre panier</h3>

            <div class="columns">
                <div class="column">
                    <table class="table" style="margin: 0 auto;">
                        <thead>
                            <tr>
                                <th>Articles</th>
                                <th>Prix</th>
                                <th>Exemplaire</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php 
                                    $totalP = 0;
                                    foreach ($panier as $key => $value) {
                                        $Narticle = intval($value - 1);
                                        echo "<tr>";
                                        echo "<td>" . $produits[$Narticle] . "</td>";
                                        echo "<td>" . $prix[$Narticle] . " fragments d'âmes" . "</td>";
                                        echo "<td>" . $exPanier[$key] . "</td>";
                                        echo "<td>" . "<button class=\"button\" onclick=\"supprimer()\"><i class=\"fas fa-trash-alt\"></i></button>" . "</td>";
                                        echo "</tr>";
                                        $totalP = $totalP + ($prix[$Narticle] * $exPanier[$key]);

                                    }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="columns is-gapless">
                <div class="column is-one-fith"></div>
                <div class="column is-dark">
                    <p>Votre total : </p>
                </div>
                <div class="column is-dark">
                    <?php
                        echo $totalP . ' fragments d\'âmes';
                    ?>
                </div>
                <div class="column">
                    <button class="button is-dark" onclick="purchase()">
                        Payer
                    </button>
                </div>
                <div class="column is-one-fith"></div>
            </div>

            

        </div>
    </div>

    <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot">
        <nav class="tabs is-boxed is-fullwidth">
        <div class="container">
            <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="produits.php">Produits</a></li>
            <li class="is-active"><a href="panier.php">Panier</a></li>
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
            var user = $('input[name=utilisateur]').val();
            var password = $('input[name=mdp]').val();
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
                    window.location.href = "panier.php";
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
                    window.location.href = "panier.php";
                }               
            });
        }
        function supprimer() {
            alert('Manque de .. temps (lol ..), Déconnectez vous (efface tout le panier)');
        }
        function purchase() {
            alert('Merci d\'avoir choisi À Temps Porté !');
            alert('Effacement du temps passé de la mémoire du client ...');
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