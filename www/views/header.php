<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Детский центр "София"</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/html/css/bootstrap.css" rel="stylesheet">
    <link href="/html/css/style.css" rel="stylesheet">    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <!-- Static navbar -->                                                                                                                  
    <div class="navbar navbar-default navbar-static-top" role="navigation">                                                                 
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
        <!--  <ul class="nav navbar-nav">                                                                                                       
            <li class="active"><a href="#">Home</a></li>                                                                                    
            <li><a href="#about">About</a></li>                                                                                             
            <li><a href="#contact">Contact</a></li>                                                                                         
            <li class="dropdown">                                                                                                           
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>                                 
              <ul class="dropdown-menu">                                                                                                    
                <li><a href="#">Action</a></li>                                                                                             
                <li><a href="#">Another action</a></li>                                                                                     
                <li><a href="#">Something else here</a></li>                                                                                
                <li class="divider"></li>                                                                                                   
                <li class="dropdown-header">Nav header</li>                                                                                 
                <li><a href="#">Separated link</a></li>                                                                                     
                <li><a href="#">One more separated link</a></li>                                                                            
              </ul>                                                                                                                         
            </li>                                                                                                                           
          </ul>
-->                                                                                                                             
          <ul class="nav navbar-nav navbar-right">                                                                                          
            <li <?=$this->help->urlActive('schedule')?>><a href="/schedule/">Расписание</a></li>                                                                                          
            <li <?=$this->help->urlActive('cabinet')?>><a href="/cabinet/">Личный кабинет</a></li>                                                                            
          </ul>                                                                                                                             
        </div><!--/.nav-collapse -->                                                                                                        
      </div>                                                                                                                                
    </div>
    <div class="contaner">