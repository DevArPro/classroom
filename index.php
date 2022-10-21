<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classroom</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body>

    <header>
        <div class="container--header">
            <div class="herobanner">
                <div class="herobanner--titles">
                    <h1>Terminale</h1>
                    <h2>Philosophie</h2>
                </div>
            </div>
            <div class="annoncer">
                <img src="https://lh3.googleusercontent.com/a/default-user=s40-c" alt="">
                <p>Annoncez quelque chose à votre classe...</p>
            </div>
        </div>
    </header>

    <main>
        <section id="messages"></section>
    </main>

    <form action="" method="post">
        <?php
            $bdd = new PDO('mysql:host=localhost;dbname=messagerie;charset=utf8mb4;', 'root', '');
            if(isset($_POST['envoyer'])){
                if(!empty($_POST['pseudo']) AND !empty($_POST['message'])){
                    $pseudo = htmlspecialchars($_POST['pseudo']);
                    $message = nl2br(htmlspecialchars($_POST['message']));

                    $insererMessage = $bdd->prepare('INSERT INTO messages(pseudo, message) VALUES(?, ?)');
                    $insererMessage->execute(array($pseudo, $message));
                }else{
                    echo "<div class='error--champsvides'>Veuillez compléter tout les champs</div>";
                }
            }
        ?>
        <div class="container--form">
            <div class="pseudo">
                <label for="pseudo">Pseudo :</label>
                <input type="text" name="pseudo" id="pseudo">
            </div>
            <div class="barre--envoi">
                <textarea name="message" id=""></textarea>
                <input type="submit" name="envoyer" id="envoyer">
            </div>
        </div>
    </form>

    <script>
        setInterval("load_messages()", 1000);
        function load_messages() {
            $("#messages").load("loadMessages.php");
        }
</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>