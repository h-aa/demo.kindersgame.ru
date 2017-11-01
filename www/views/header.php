<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Детский центр "София"</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/html/css/bootstrap.css?v=<?=mktime()?>" rel="stylesheet">
     <link href="/html/css/font-awesome.css?v=<?=mktime()?>" rel="stylesheet">
    <link href="/html/css/style.css?v=<?=mktime()?>" rel="stylesheet">
    <link href="https://kindersgame.ru/image/catalog/zastavkaumkrugsmol.jpg" rel="icon" />    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <!-- Static navbar -->                                                                                                                  
    <div class="navbar  navbar-default navbar-static-top" role="navigation">                                                                 
      <div class="container">                                                                                                               
        <div class="navbar-header">                                                                                                         
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">                                
            <span class="sr-only">Toggle navigation</span>                                                                                  
            <span class="icon-bar"></span>                                                                                                  
            <span class="icon-bar"></span>                                                                                                  
            <span class="icon-bar"></span>                                                                                                  
          </button>                                                                                                                         
          <a class="navbar-brand" href="/">Детский центр "София"</a>                                                                                 
        </div>                                                                                                                              
        <div class="navbar-collapse collapse">                                                                                                                                                                                                                           
          <ul class="nav navbar-nav navbar-right">                                                                                          
            <li <?=$this->help->urlActive('schedule')?>><a href="/schedule/">Расписание</a></li>                                                                                          
        <?php if($this->auth->isAdmin()){ ?>
            <li>                                                                                                          
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Администрирование <b class="caret"></b></a>                                 
                <ul class="dropdown-menu">
                    <li class="divider"></li>                                                                                                   
                    <li class="dropdown-header">Расписание</li>                                                                                 
                    <li><a href="#">Добавить занятие</a></li>
                    <li><a href="#">Удалить занятие</a></li>                                                                                                                                                                      
                    <li class="divider"></li>                                                                                                   
                    <li class="dropdown-header">Ученики</li>                                                                                 
                    <li <?=$this->help->urlActive('student_add')?>><a href="/student_add/">Добавить ученика</a></li>
                    <li <?=$this->help->urlActive('student_edit')?>><a href="/student_edit/">Редактировать ученика</a></li>
                    <li class="divider"></li>                                                                                                   
                    <li class="dropdown-header">Преподаватели</li>                                                                                 
                    <li <?=$this->help->urlActive('teacher_add')?>><a href="/teacher_add/">Добавить преподавателя</a></li>
                    <li <?=$this->help->urlActive('teacher_edit')?>><a href="/teacher_edit/">Редактировать преподавателя</a></li>
                    <li <?=$this->help->urlActive('teacher_time')?>><a href="/teacher_time/">Редактировать расписание преподавателя</a></li>
                    <li class="divider"></li>                                                                                                   
                    <li class="dropdown-header">Предметы</li>
                    <li <?=$this->help->urlActive('subject_add')?>><a href="/subject_add/">Добавить предмет</a></li>
                    <li <?=$this->help->urlActive('subject_edit')?>><a href="/subject_edit/">Редактировать предмет</a></li>                                        
                </ul>                
            </li>
        <?php } ?>
        <?php if($this->auth->isLogin()){ ?>
            <li <?=$this->help->urlActive('logout')?>><a href="/logout/">Выход</a></li>
        <?php } else { ?>
            <li <?=$this->help->urlActive('login')?>><a href="/login/">Авторизация</a></li>
        <?php } ?>        
          </ul>                                                                                                                             
        </div><!--/.nav-collapse -->                                                                                                        
      </div>                                                                                                                                
    </div>
    <div class="contaner">