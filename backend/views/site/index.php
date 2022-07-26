<?php

/** @var yii\web\View $this */
$this->title = 'Knihovna Kučera';
?>

<div class="site-index">
    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Vítejte v administrátorském přístupu ke knihovně Kučera!</h1>

        <p class="lead">Aplikace slouží k úpravě dat, které se nachází na webové aplikaci knihovny. K úpravě jednotlivých dat je třeba využít přístupu v navigačním menu.</p>
    </div>

    <hr>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-4">
                <h2>Knihovna</h2>
                <p>Na této podstránce naleznete seznam všech knih, které jsou v aktuální chvíli v knihovně Kučera dostupné (včetně půjčených knih). Pro správu je třeba přejít na stránku Knihovna, ze které je možné provádět různé operace</p>
                <p><a class="btn btn-outline-secondary" href="/../knihovnakucera/backend/web/index.php?r=storedbooks%2Findex">Přejít do knihovny &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Autoři</h2>

                <p>
                    Na této podstránce naleznete seznam všech autorů, které jsou v aktuální chvíli přidáni do databáze autorů. Jejich správa je možná po přejití na podstránku autorů.
                </p>

                <p><a class="btn btn-outline-secondary" href="/../knihovnakucera/backend/web/index.php?r=authors%2Findex">Přejít k autorům &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Evidence půjčených knih</h2>

                <p>Na této podstránce naleznete seznam všech půjčených knih. Je zde možné zobrazit různé detaily o pujčujícím, pujčené knize atd.</p>

                <p><a class="btn btn-outline-secondary" href="/../knihovnakucera/backend/web/index.php?r=borrowedbooks%2Findex">Přejít na evidenci &raquo;</a></p>
            </div>
        </div>
        <hr>
    </div>
</div>
