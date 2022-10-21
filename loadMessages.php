<?php
$bdd = new PDO('mysql:host=localhost;dbname=messagerie;charset=utf8mb4;', 'root', '');
$recupMessages = $bdd->query('SELECT * FROM messages ORDER BY id DESC');
while($message = $recupMessages->fetch()){
    ?>
    <div class="message">
        <div class="container--message">
            <div class="infos--user">
                <div class="infos--titles">
                    <h4><?= $message['pseudo'];?></h4>

                </div>
            </div>
            <p><?= $message['message'];?></p>
        </div>
    </div>
    <?php
}
?>