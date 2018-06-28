
<?php 

    session_start();
    $produits = ["1temps","2temps","3temps","4temps","5temps","6temps","7temps","8temps","9temps","10temps","11temps","12temps","13temps","14temps","15temps"];
    $prix = [5,12,8,16,10,6,35,24,30,56,80,72,150,92,65];
    $descriptions = ["temps"];

    //mettre l'index d'un article

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

            <h3 class="title is-3">Liste de nos articles</h3>

            <div class="columns">
                <div class="column">
                    <div class="img__wrap" name="1" onclick="ajouter(this)">
                        <img src="produits/sablier1.gif" alt="" class="img__img">
                        <p class="img__description">Temps classique</p>
                    </div>
                </div>

                <div class="column">
                    <div class="img__wrap" name="2" onclick="ajouter(this)">
                        <img src="produits/sablier2.gif" alt="" class="img__img">
                        <p class="img__description">Double dose</p>
                    </div>
                </div>

                <div class="column">
                    <div class="img__wrap" name="3" onclick="ajouter(this)">
                        <img src="produits/sablier3.gif" alt="" class="img__img">
                        <p class="img__description">Temps de pause</p>
                    </div>
                </div>
                <div class="column">
                    <div class="img__wrap" name="4" onclick="ajouter(this)">
                        <img src="produits/sablier4.gif" alt="" class="img__img">
                        <p class="img__description">Temps naturel</p>
                    </div>
                </div>

                <div class="column">
                    <div class="img__wrap" name="5" onclick="ajouter(this)">
                        <img src="produits/sablier5.gif" alt="" class="img__img">
                        <p class="img__description">Temps de deuil</p>
                    </div>
                </div>

            </div>

            <div class="columns">
                <div class="column">
                    <div class="img__wrap" name="6" onclick="ajouter(this)">
                        <img src="produits/sablier6.gif" alt="" class="img__img">
                        <p class="img__description">D'Antemps</p>
                    </div>
                </div>

                <div class="column">
                    <div class="img__wrap" name="7" onclick="ajouter(this)">
                        <img src="produits/sablier7.gif" alt="" class="img__img">
                        <p class="img__description">Temps Menstruel</p>
                    </div>
                </div>

                <div class="column">
                    <div class="img__wrap" name="8" onclick="ajouter(this)">
                        <img src="produits/sablier8.gif" alt="" class="img__img">
                        <p class="img__description">Temps intime</p>
                    </div>
                </div>
                <div class="column">
                    <div class="img__wrap" name="9" onclick="ajouter(this)">
                        <img src="produits/sablier9.gif" alt="" class="img__img">
                        <p class="img__description">Temps d'océan</p>
                    </div>
                </div>

                <div class="column">
                    <div class="img__wrap" name="10" onclick="ajouter(this)">
                        <img src="produits/sablier10.gif" alt="" class="img__img">
                        <p class="img__description">Lever de Soleil</p>
                    </div>
                </div>

            </div>
        
            <div class="columns">
                <div class="column">
                    <div class="img__wrap" name="11" onclick="ajouter(this)">
                        <img src="produits/sablier11.gif" alt="" class="img__img">
                        <p class="img__description">Temps professionnel</p>
                    </div>
                </div>

                <div class="column">
                    <div class="img__wrap" name="12" onclick="ajouter(this)">
                        <img src="produits/sablier12.gif" alt="" class="img__img">
                        <p class="img__description">Revitalisant</p>
                    </div>
                </div>

                <div class="column">
                    <div class="img__wrap"  name="13" onclick="ajouter(this)">
                        <img src="produits/sablier13.gif" alt="" class="img__img">
                        <p class="img__description">Immortalité</p>
                    </div>
                </div>
                <div class="column">
                    <div class="img__wrap" name="14" onclick="ajouter(this)">
                        <img src="produits/sablier14.gif" alt="" class="img__img">
                        <p class="img__description">Temps en bouteille</p>
                    </div>
                </div>

                <div class="column">
                    <div class="img__wrap" name="15" onclick="ajouter(this)">
                        <img src="produits/sablier15.gif" alt="" class="img__img">
                        <p class="img__description">
                            <span class="">Temps de secours</span>
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot">
        <nav class="tabs is-boxed is-fullwidth">
        <div class="container">
            <ul>
            <li><a href="index.php">Accueil</a></li>
            <li class="is-active"><a href="produits.php">Produits</a></li>
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
                    window.location.href = "produits.php";
                }               
            });
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
                    window.location.href = "produits.php";
                }               
            });
        }
        function register() {
            alert('Plus tard je pense (je le continuerai)');
        }
        function ajouter(article) {
            var nouvelArticle = parseInt($(article).attr("name"));
            alert(nouvelArticle);
            $.ajax({
                url: 'functions.php',
                data: {
                    function: 'ajoutPanier',
                    article: nouvelArticle
                },
                type: 'POST',
                success: function(msg) {
                    //window.location.href = "index.php";
                    alert(msg);
                }               
            });
        }
    </script>
</body>
</html>