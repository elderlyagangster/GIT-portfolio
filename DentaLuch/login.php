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
<?php
    require_once "db.php";

    $data = $_POST;

    function generateRandomString($length = 8) {
        $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charLength = strlen($char);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $char[rand(0, $charLength - 1)];
        }
        return $randomString;
    }
    
    generateRandomString();

    if( isset($data['do_login']) ) {

        if ($data['email'] == 'admin' && $data['pass'] == 123)
        {
        session_start();
        $_SESSION['admin'] = true;
        $script = 'admin.php';
        header('Location: admin.php');
        } else {

        $errors = array();
        $user = R::findOne('users', 'email = ?', array($data['email']));
        if ( $user ) {
            if (password_verify($data['pass'], $user->pass)) {
                $_SESSION['logged_user'] = $user;
                header('Location: aunt.php');
                
                $id = $_SESSION['logged_user']->id;
                $user = R::load('users', $id);
                $user->aunt = generateRandomString();
                R::store($user);

                $to = $_SESSION['logged_user']->email;
                $subject = 'Код подтверждения';
                $message = $_SESSION['logged_user']->aunt;
                $headers = 'From: gushchin.2001@gmail.com' . "\r\n" . 'Reply-To: gushchin.2001@gmail.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
                
                $send = mail($to, $subject, $message, $headers);

            } else {
                $errors[] = 'Неверно введен пароль';
            }
            } else {
                $errors[] = 'Пользователь с таким email небыл найден';
            }
    if ( ! empty($errors) ) 
    {   
        echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
    }
}
}

?>
<div class="reg">
<form action="login.php" method="POST">

    <p> 
        <strong>Email</strong><br>
        <input class="form-control" type="text" name="email" value="<?php echo @$data['email'];?>">
    </p>
    <p> 
        <strong>Ваш пароль</strong><br>
        <input class="form-control" type="password" name="pass" value="<?php echo @$data['pass'];?>">
    </p>
    <p> 
        <button class="btn btn-secondary" type="submit" name="do_login">Войти</button>
    </p>

    <a class="btn btn-secondary" href="index.php">Главная</a>

</from>
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