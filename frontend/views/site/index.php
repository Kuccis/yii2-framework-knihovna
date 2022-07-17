<?php

/** @var yii\web\View $this */
$this->title = 'Knihovna Kučera';
?>

<div class="site-index">
    <br>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="http://www.medicina.ulisboa.pt/sites/default/files/styles/slideshow_basico/public/images/2021-07/book.jpg?h=b83ca2ea&itok=8YN0Tnkl" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://ifi.qa/repo/2021/11/xmain_64de05529b25fa53ad71ab755fd64a79.jpg.pagespeed.ic.8AyEw8lnjk.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://redlionbooks.co.uk/wp-content/uploads/2021/05/events-title.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Vítejte v knihovně Kučera!</h1>

        <p class="lead">V naší nabídce naleznete různé knihy, které si můžete vypůjčit! Stačí se pouze registrovat</p>

        <p><a class="btn btn-lg btn-primary" href="index.php?r=site%2Fsignup">Registrovat se</a></p>
    </div>

    <hr>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-4">
                <h2>O knihovně</h2>
                <p>Tato knihovna vznikla za účelem ukázky dovedností ve frameworku YII2. Umožňuje přidávat, odebírat a půjčovat knihy.
                    Tuto aplikaci vytvořil Luboš Kučera</p>
                <p><a class="btn btn-outline-secondary" onClick="document.getElementById('oknihovne').scrollIntoView();">Více o knihovně Kučera &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>O frameworku Yii2</h2>

                <p>Yii je poměrně mladý, avšak výkonný open-source PHP framework určený pro vývoj
                    rozsáhlých webových aplikací. Klade důraz na pragmatičnost, znovupoužitelnost a
                    jednoduchost použití.
                </p>

                <p><a class="btn btn-outline-secondary" href="https://cs.wikipedia.org/wiki/Yii">Více o frameworku &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Jak ovládat web?</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <h1 id="oknihovne">O knihovně Kučera</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.
            </p>
        </div>

    </div>
</div>
