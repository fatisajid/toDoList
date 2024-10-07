<?php
require_once(__DIR__ . '/../partials/head.php');
?>

<h1>modifier la tache</h1>
<div class="bgg">
    <p>Déscription : <?= $myTask->getContent() ?> </p>
    <p>Date de création <?= date_format($dateCreation, 'd-m-Y à H:i') ?> par : <?= $myUser->getPseudo() ?></p>
    <p>Du : <?= date_format($dateStartDay, 'd-m-Y à H:i') ?> au: <?= date_format($dateStopDay, 'd-m-Y à H:i') ?></p>
    <p>Points : <?= $myTask->getPoint() ?></p>
    <p>Assigné à : <?= $myTask->getPseudo() ? $myTask->getPseudo() : '🤷‍♀️ personne' ?></p>
    <button>modifier la tache</button>
</div>

<?php
require_once(__DIR__ . '/../partials/footer.php')
?>