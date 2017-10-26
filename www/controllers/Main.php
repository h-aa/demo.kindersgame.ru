<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
class MainController
{
    private $help;
    private $model;
    private $auth;
    private $action;
    public function __construct()
    {
	$this->help 	= new Help;
	$this->model 	= new MainModel();
	$this->auth 	= new Auth();
    }

    public function schedule()
    {	
	$this->help->action = 'schedule';
	require_once("views/schedule.php");
    }

    public function cabinet()
    {
	$this->help->action = 'cabinet';
	require_once("views/cabinet.php");
    }

    public function error()
    {
	require_once("views/error.php");
    }
}
?>