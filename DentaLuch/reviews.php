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
          <div class="rev1 container">
              <h1>Отзывы</h1>
              <div id="comment-field">
                  <?php
                    require_once "db.php";
                    
                    $data = $_POST;
                    if ( isset($data['send']) )
                    {   

                        $errors = array();
                        if( trim($data['name']) == '' )
                        {
                            $errors[] = 'Введите ваше имя';
                        }
                        if( trim($data['comment']) == '' )
                        {
                            $errors[] = 'Введите отзыв';
                        }
                        if ( empty($errors) ) 
                        {
                            $comments = R::dispense('comments');
                            $comments->name = $data['name'];
                            $comments->comment = $data['comment'];
                            R::store($comments);
                            
                            echo '<div style="color: green;">Благодарим за отзыв!</div><hr>';
                
                        } else {
                            echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
                        }
                    }
                  ?>
                  <?php
                    $comments = R::findAll( 'comments' );
                    foreach( $comments as $comments ) {
                        echo '<p class="alert alert-success m-4" role="alert">'.$comments->name.'<br>'.$comments->comment.'</p>';
                    }
                  ?>
              </div>
              <?php require_once "db.php"?>
                      <?php if ( isset($_SESSION['logged_user']) ) : ?>
                            <form action="reviews.php" method="POST">
                            <div class="revform form-group m-4">
                              <label for="comment-name">Имя</label>
                              <input type="text" class="form-control" id="comment-name" name="name"  placeholder="Имя" value="<?php echo $_SESSION['logged_user']->name; ?> <?php echo $_SESSION['logged_user']->lastname; ?>">
                            </div>
                            <div class="form-group m-4">
                              <label for="comment-body">Ваш отзыв</label>
                              <input type="text" class="form-control" id="comment-body" name="comment" placeholder="Ваш отзыв" value="<?php echo @$data['comment'];?>">
                            </div>
                            <div class="form-group m-4">
                              <button type="submit" id="comment-add" class="btn btn-warning" name="send">Отправить</button>
                            </div>
                          </form>
                      <?php else : ?>
                        <small>Чтобы оставить отзыв, нужно войти в личный кабинет</small>
              <?php endif; ?>
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