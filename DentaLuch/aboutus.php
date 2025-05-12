<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>DentaLuch</title>
    <link rel="shortcut icon" href="img/png4a.png" type="image/x-icon">
  </head>
  <body>
      <header>
      <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><image src="img/png1.png" style="width: 120px;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Главная</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="services.php">Услуги</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="aboutus.php">О Нас</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="contacts.php">Контакты</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="reviews.php">Отзывы</a>
                    </li>
                    <li class="nav-item">
                    <?php require "db.php"?>
                      <?php if ( isset($_SESSION['logged_user']) ) : ?>
                        <a class="nav-link" href="indexreg.php"><?php echo $_SESSION['logged_user']->name; ?> <?php echo $_SESSION['logged_user']->lastname; ?></a>
                      <?php else : ?>
                        <a class="nav-link" href="indexreg.php">Личный кабинет</a>
                      <?php endif; ?>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
      </header>
      <main>
          <div class="blockus1 container" style="margin-top: 5vh; margin-bottom: 20vh;">
              <h1 style="margin-bottom: 5%;">О нас</h1>
              <img style="float: right;" src="img/o-nas.jpg" width="60%">
              <p>Стоматология Дента Луч — это современная медицинская клиника, расположенная на Боровском шоссе в 10 минутах ходьбы от метро Говорово.</p>
              <p>Мы предлагаем Вам такие услуги как: лечение кариеса и его осложнений(пульпит,периодонтит),
              профессиональная гигиена полости рта, протезирование зубов(частичные и полные съёмные протезы, мостовидные протезы, одиночные коронки, керамические виниры),
              удаление зубов, имплантация, костные и десневые пластики,синус-лифтинг,удаление зубов мудрости любой сложности,ортодонтическое лечение пациентов при патологиях прикуса зубочелюстной системы и ,конечно же, детский приём в полном объеме.</p>
              <p>Полный перечень наших услуг вы можете посмотреть здесь.</p>
              <p>Главное преимущество нашей стоматологической клиники — профессиональный подход к каждому пациенту. </p>
              <p>Всем людям, с которыми работают наши врачи, мы предлагаем лечение с учетом не только диагноза, но и составляем несколько планов лечения в зависимости финансовых возможностей пациентов. </p>
          </div>
      </main>
      <footer>
          <div class="container-fluid">
              <div class="row">
                <div class="col-4 text-center">
                    <p>© dentaluch.ru 2020 год.<br>Все права защищены.</p>
                </div>
                <div class="col-4 text-center">
                    <p>Тел.: +7 (499) 371-77-03 E-mail: info@dentaluch.ru Информация на сайте не является публичной-офертой.</p>
                </div>
                <div class="col-4 text-center">
                    <p>Политика конфиденциальности Адрес: г. Москва, Боровское шоссе, 2Ак4</p>
                </div>
                <div class="col-12 text-center">
                    <p>Копирование материалов запрещено: "ГК РФ. Права на результаты интеллектуальной деятельности".</p>
                </div>
              </div>
          </div>
      </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>
</html>