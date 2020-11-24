<?php
include $_SERVER['DOCUMENT_ROOT'] . "/parts/header.php";
?>

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="assets/images/gym-video.mp4" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <!-- <h6>work harder, get stronger</h6> -->
                <h2>Это не забывается</h2>
                <div class="main-button scroll-to-section">
                    <a href="#features">Узнать больше о нас</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Features Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>О нас</h2>
                        <img src="assets/images/line-dec.png" alt="waves">
                        <p>ЭКСТРИМПОДАРОК - магазин необычных подарочных сертификатов.</p>
                    </div>
                </div>

<div class="col-lg-8 offset-lg-3 mycarusel">
                <div id="carouselExampleIndicators" class="carousel slide myslider"  data-ride="carousel" >
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>


                  <div class="carousel-inner">
                    <div class="carousel-item active" >
                      <img class="d-block w-100" src="assets/images/air.jpg" alt="Первый слайд">
                      <div class="carousel-caption d-none d-md-block">
                        <h3 style="color: black;">Невероятное чувство полета</h3>
                        <h5 style="color: black;">Каждый подарок - это оригинальная услуга, которой можно пользоваться круглый год.</h5>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="assets/images/kater.jpg" alt="Второй слайд">
                       <div class="carousel-caption d-none d-md-block">
                        <h3 style="color: black;">Скорость захватывает дух</h3>
                        <h5 style="color: black;">Мы помогаем людям дарить праздник и яркие события!</h5>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="assets/images/btr.jpg" alt="Третий слайд">
                       <div class="carousel-caption d-none d-md-block">
                        <h3 style="color: black;">Езда по бездорожью</h3>
                        <h5 style="color: black;">Такой подарок запомнится на всю жизнь.</h5>
                      </div>
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"    data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"   data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="right-content abouUs">
                    <h5>1. ИНДИВИДУАЛЬНЫЙ ПОДХОД</h5>
                    <span >С каждым клиентом работает опытный менеджер, который учтет все пожелания.</span>
                    <h5>2. ПОДАРОК ТОЧНО ПОНРАВИТСЯ И УДИВИТ</h5>
                    <span>А Вас запомнят как оригинального и креативного человека. В одном наборе 10-20 необычных услуг подобранных по разным тематикам: экстрим, романтика, обучение, туры.</span>
                    <h5>3. ВСЕ ПОДАРКИ ПОЛНОЦЕННЫЕ И ПРОДУМАННЫЕ</h5>
                    <span>Мы не продаем 15-минутные массажи и полеты, продолжительность наших программ рассчитана на то, чтобы клиенту действительно понравилось.</span>
                    <h5>4. 15-ЛЕТНИЙ ОПЫТ ОКАЗАНИЯ УСЛУГ</h5>
                    <span>Мы знаем свой продукт и любим наших клиентов, поэтому туристу ни о чем не надо думать, только получать удовольствие.</span>
                </div>

            </div>

            </div>
        </div>
    </section>
    <!-- ***** Features Item End *** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section" id="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Our Classes Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Акции</h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>Лучшие предложения для вас.</p>
                    </div>
                </div>
                <?php
                    //выбрать все акции из базы данных
                    $query ="SELECT * FROM stocks";
                    $result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); 
                    //вывести все акции
                     while ($row = mysqli_fetch_assoc($result)) {
                            $image =  $row['img'];
                            $src = "src=\"$image \"";
                ?>
                            <div class="col-lg-4 stocks" data-idp="<?php echo $row['id']; ?>" id="detal"  onmouseover="detali(this)" onmouseout="detalihidden(this)">
                               <div id="modal<?php echo $row['id']; ?>" class="col-lg-12 stocks mymodal">
                                    <p><?php echo $row['long_desc']; ?></p>
                               </div> 
                                <img <?php echo $src; ?>>
                                <h3><?php echo $row['name']; ?></h3>
                            </div>
                <?php
                        } 
                ?>
            </div>
        </div>
    </section>
   
    <!-- ***** Contact Us Area Starts ***** -->
    <section class="section" id="contact-us">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div id="map">
                       

                      <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="600px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="contact-form">
                        <form id="contact" action="modules/sendMessage.php" method="post">
                          <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" id="name" placeholder="Ваше имя*" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Ваш email*" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <input name="subject" type="text" id="subject" placeholder="Тема">
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" id="message" placeholder="Сообщение" required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Отправить сообщение</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Us Area Ends ***** -->
    

<?php

include $_SERVER['DOCUMENT_ROOT'] . "/parts/footer.php";
?>