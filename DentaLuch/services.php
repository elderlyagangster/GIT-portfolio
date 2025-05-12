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
      <main class="serv">
        <div class="container" style="padding-top: 4%; padding-bottom: 4%;">
            <h1>Услуги</h1><br>
            <form class="d-flex m-4">
                <input class="form-control" id="search" type="text" placeholder="Поиск по услугам...">
            </form>
            <ul class="search list-group m-4">
                <li class="list-group-item">
                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="#">Профессиональная чистка зубов<div class="text-right" style="display: inline-block; float: right;">7 000 руб.</div></a>
                  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Зпись на приём</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" id="name" placeholder="Имя">
                              <label for="name">ФИО</label>
                          </div>
                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" id="number" placeholder="Телефон">
                              <label for="number">Телефон</label>
                          </div>
                          <small>После отправки заявки на запись мы перезвонима вам в течении 5 минут.</small>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                          <button type="button" class="btn btn-primary">Записаться</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </li>
                <li class="list-group-item">
                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop2" href="#">Отбеливание зубов<div class="text-right" style="display: inline-block; float: right;">22 000 руб.</div></a>
                <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Зпись на приём</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="sendmail.php" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" placeholder="ФИО" required>
                                <label for="name">ФИО</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="email" placeholder="E-mail" required>
                                <label for="number">E-mail</label>
                            </div>
                            <small>После отправки заявки на запись мы перезвонима вам в течении 5 минут.</small>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                              <button type="submit" value="Отправить" type="button" class="btn btn-primary">Записаться</button>
                            </div>
                          </form>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop3" href="#">Удаление зубов<div class="text-right" style="display: inline-block; float: right;">от 2 500 руб.</div></a>
                <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Зпись на приём</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="sendmail.php" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" placeholder="ФИО" required>
                                <label for="name">ФИО</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="email" placeholder="E-mail" required>
                                <label for="number">E-mail</label>
                            </div>
                            <small>После отправки заявки на запись мы перезвонима вам в течении 5 минут.</small>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                              <button type="submit" value="Отправить" type="button" class="btn btn-primary">Записаться</button>
                            </div>
                          </form>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop4" href="#">Протезирование на имплантах<div class="text-right" style="display: inline-block; float: right;">от 25 000 руб.</div></a>
                <div class="modal fade" id="staticBackdrop4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Зпись на приём</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="sendmail.php" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" placeholder="ФИО" required>
                                <label for="name">ФИО</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="email" placeholder="E-mail" required>
                                <label for="number">E-mail</label>
                            </div>
                            <small>После отправки заявки на запись мы перезвонима вам в течении 5 минут.</small>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                              <button type="submit" value="Отправить" type="button" class="btn btn-primary">Записаться</button>
                            </div>
                          </form>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop5" href="#">Безметалловые коронки<div class="text-right" style="display: inline-block; float: right;">от 16 000 руб.</div></a>
                <div class="modal fade" id="staticBackdrop5" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Зпись на приём</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="sendmail.php" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" placeholder="ФИО" required>
                                <label for="name">ФИО</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="email" placeholder="E-mail" required>
                                <label for="number">E-mail</label>
                            </div>
                            <small>После отправки заявки на запись мы перезвонима вам в течении 5 минут.</small>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                              <button type="submit" value="Отправить" type="button" class="btn btn-primary">Записаться</button>
                            </div>
                          </form>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop6" href="#">Керамические коронки<div class="text-right" style="display: inline-block; float: right;">от 16 000 руб.</div></a>
                <div class="modal fade" id="staticBackdrop6" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Зпись на приём</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="sendmail.php" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" placeholder="ФИО" required>
                                <label for="name">ФИО</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="email" placeholder="E-mail" required>
                                <label for="number">E-mail</label>
                            </div>
                            <small>После отправки заявки на запись мы перезвонима вам в течении 5 минут.</small>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                              <button type="submit" value="Отправить" type="button" class="btn btn-primary">Записаться</button>
                            </div>
                          </form>
                      </div>
                    </div>
                  </div>   
                </li>
                <li class="list-group-item">
                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop7" href="#">Коронки<div class="text-right" style="display: inline-block; float: right;">от 16 000 руб.</div></a>
                <div class="modal fade" id="staticBackdrop7" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Зпись на приём</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="sendmail.php" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" placeholder="ФИО" required>
                                <label for="name">ФИО</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="email" placeholder="E-mail" required>
                                <label for="number">E-mail</label>
                            </div>
                            <small>После отправки заявки на запись мы перезвонима вам в течении 5 минут.</small>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                              <button type="submit" value="Отправить" type="button" class="btn btn-primary">Записаться</button>
                            </div>
                          </form>
                      </div>
                    </div>
                  </div>    
                </li>
                <li class="list-group-item">
                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop8" href="#">Установка брекетов<div class="text-right" style="display: inline-block; float: right;">от 16 000 руб.</div></a>
                <div class="modal fade" id="staticBackdrop8" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Зпись на приём</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="sendmail.php" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" placeholder="ФИО" required>
                                <label for="name">ФИО</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="email" placeholder="E-mail" required>
                                <label for="number">E-mail</label>
                            </div>
                            <small>После отправки заявки на запись мы перезвонима вам в течении 5 минут.</small>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                              <button type="submit" value="Отправить" type="button" class="btn btn-primary">Записаться</button>
                            </div>
                          </form>
                      </div>
                    </div>
                  </div>    
                </li>
                <li class="list-group-item">
                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop9" href="#">Лечение зубов под общим наркозом<div class="text-right" style="display: inline-block; float: right;">от 14 000 руб.</div></a>
                <div class="modal fade" id="staticBackdrop9" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Зпись на приём</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="sendmail.php" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" placeholder="ФИО" required>
                                <label for="name">ФИО</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="email" placeholder="E-mail" required>
                                <label for="number">E-mail</label>
                            </div>
                            <small>После отправки заявки на запись мы перезвонима вам в течении 5 минут.</small>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                              <button type="submit" value="Отправить" type="button" class="btn btn-primary">Записаться</button>
                            </div>
                          </form>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop10" href="#">Костная пластика<div class="text-right" style="display: inline-block; float: right;">от 30 000 руб.</div></a>
                <div class="modal fade" id="staticBackdrop10" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Зпись на приём</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="sendmail.php" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" placeholder="ФИО" required>
                                <label for="name">ФИО</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="email" placeholder="E-mail" required>
                                <label for="number">E-mail</label>
                            </div>
                            <small>После отправки заявки на запись мы перезвонима вам в течении 5 минут.</small>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                              <button type="submit" value="Отправить" type="button" class="btn btn-primary">Записаться</button>
                            </div>
                          </form>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop11" href="#">Одномоментная имплантация зубов<div class="text-right" style="display: inline-block; float: right;">от 32 000 руб.</div></a>
                <div class="modal fade" id="staticBackdrop11" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Зпись на приём</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="sendmail.php" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" placeholder="ФИО" required>
                                <label for="name">ФИО</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="email" placeholder="E-mail" required>
                                <label for="number">E-mail</label>
                            </div>
                            <small>После отправки заявки на запись мы перезвонима вам в течении 5 минут.</small>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                              <button type="submit" value="Отправить" type="button" class="btn btn-primary">Записаться</button>
                            </div>
                          </form>
                      </div>
                    </div>
                  </div>
                </li>
            </ul>
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
    <script type="text/javascript" src="search.js"></script> 
  </body>
</html>