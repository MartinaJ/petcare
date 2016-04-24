<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<body>
<?php $this->beginBody() ?>

<!--Kode Wrapper Start-->
<div id="home" class="kode_wrapper">

    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => '',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Users', 'url' => ['/user'], 'visible' => !empty(Yii::$app->user->identity) && Yii::$app->user->identity->isAdmin()],
                ['label' => 'Owners', 'url' => ['/owner'], 'visible' => !empty(Yii::$app->user->identity) && !Yii::$app->user->identity->isAdmin()],
                ['label' => 'Pets', 'url' => ['/pet'], 'visible' => !empty(Yii::$app->user->identity) && !Yii::$app->user->identity->isAdmin()],
                ['label' => 'Treatments', 'url' => ['/treatment'], 'visible' => !empty(Yii::$app->user->identity) && !Yii::$app->user->identity->isAdmin()],
                Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->email . ')',
                        ['class' => 'btn btn-link']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
        NavBar::end();
        ?>

        <!--Header Wrap Start-->
        <header class="kode_pet_hdr">

            <!--Navigation Wrap Start-->


            <div class="kode_pet_navigation">
                <div class="nav-container">
                <div class="container">
                    <div class="nav-cover">
                        <!--Logo Wrap Start-->
                        <div class="kode_pet_logo">
                            <a href="#"><img src="images/pet-logo.png" alt=""></a>
                        </div>
                        <!--Logo Wrap End-->
                        <nav class="navbar navbar-default">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav single-page">
                                    <li><a href="index.html#home">Home</a></li>
                                    <li><a href="index.html#our-specialities">Services</a></li>
                                    <li><a href="index.html#our-cause">We saved</a></li>
                                    <li><a href="index.html#our-pets">Meet Our Team</a></li>
                                    <li><a href="index.html#our-gallery">Gallery</a></li>
                                    <li><a href="index.html#our-clients">Our Clients</a></li>
                                    <li><a href="index.html#contact-us">Visit Us</a>

                                    </li>
                                </ul>
                            </div>
                        </nav>

                    </div>
                </div>
            </div>
            </div>
            <!--Navigation Wrap End-->
        </header>
        <!--Header Wrap End-->


        <!--Banner Wrap Start-->
        <div class="kode_pet_banner hidden-xs">
            <div class="flexslider">

                <ul class=" slides">
                    <li>
                        <img src="extra-images/pet-banner-01.jpg" alt="Pet Banner Image">

                        <div class="kode_pet_caption caption_left ">
                            <h2>Primis<br> In Faucibus</h2>

                            <p>Proin mi arcu, varius ac risus at, suscipit aliquet neque. Pellentesque posuere urna at
                                ex venenatis, id faucibus nisi porttitor.</p>
                        </div>
                    </li>

                    <li>
                        <img src="extra-images/pet-banner-02.jpg" alt="Pet Banner Image">

                        <div class="kode_pet_caption caption_left ">
                            <h2>Mauris <br> Venenatis</h2>

                            <p>Curabitur at ligula id dolor vulputate malesuada et nec lectus.</p>
                        </div>
                    </li>

                    <li>
                        <img src="extra-images/pet-banner-03.jpg" alt="Pet Banner Image">

                        <div class="kode_pet_caption caption_left ">
                            <h2>Morbi <br> Condimentum</h2>

                            <p>Pellentesque eget lorem interdum justo euismod rhoncus. Curabitur interdum, nibh et
                                venenatis lacinia, nibh neque porttitor eros, eget dignissim ex sem ut ex.</p>
                        </div>
                    </li>
                </ul>
            </div>


        </div>

        <!--Banner Wrap End-->


        <!--Kode Content Wrap Start-->
        <div class="kode_pet_content">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
        <!--Kode Content Wrap End-->


        <!--Pet Footer Wrap Start-->
        <footer class="kode_footer_bg">
            <div class="container">
                <div class="kode_pet_footer">
                    <a href="#"><img src="images/pet-footer.png" alt=""></a>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="kode_pet_foo_lst">
                            <a href="#"><i class="icon-placeholder87"></i></a>
                            <h6>Washington Squre Park. NY United States</h6>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="kode_pet_foo_lst">
                            <a href="#"><i class="icon-phonecall9"></i></a>
                            <h6>#Phone Number</h6>

                            <div class="clearfix clear"></div>
                            <h6>+ 12 4578 678 &nbsp; &nbsp; &nbsp;</h6>
                            <h6>+ 111 222 757</h6>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="kode_pet_foo_lst">
                            <a href="#"><i class="icon-email174"></i></a>
                            <h6>@Email</h6>

                            <div class="clearfix clear"></div>
                            <h6><a href="#">Supoort1@petcare.com</a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--Pet Footer Wrap End-->

        <!--Pet Copy Right Area Start-->
        <div class="kode_pet_copyright">
            <div class="container">
                <div class="kode_footr_copy">
                    <p>2016 &copy; Martina Jamrišková. All rights reseverd.</p>
                </div>
                <div class="kode_pet_foo_scl">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
                <div class="back-to-top">
                    <a href="#home"><i class="fa fa-angle-up"></i></a>
                </div>
            </div>
        </div>
        <!--Pet Copy Right Area End-->

    </div>
    <!--Kode Wrapper End-->

    <!--Bootstrap core JavaScript-->
    <script src="js/jquery.js"></script>
    <!--Custom JavaScript-->
    <script src="js/bootstrap.min.js"></script>
    <!--Bx-Slider JavaScript-->
    <script src="js/jquery.bxslider.min.js"></script>
    <!--Bootstrap Range Slider JavaScript-->
    <script src="js/bootstrap-slider.js"></script>
    <!--FlexSlider Slider JavaScript-->
    <script src="js/jquery.flexslider.js"></script>
    <!--Owl Carousl JavaScript-->
    <script src="js/owl.carousel.js"></script>
    <!--Single JavaScript-->
    <script src="js/jquery.singlePageNav.js"></script>
    <!--PrettyPhoto JavaScript-->
    <script src="js/jquery.prettyPhoto.js"></script>
    <!--Custom JavaScript-->
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <!--Custom JavaScript-->
    <script src="js/dl-menu/modernizr.custom.js"></script>
    <!--Custom JavaScript-->
    <script src="js/dl-menu/jquery.dlmenu.js"></script>
    <!--WayPoint JavaScript-->
    <script src="js/waypoints-min.js"></script>
    <!--Custom JavaScript-->
    <script src="js/custom.js"></script>


    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
