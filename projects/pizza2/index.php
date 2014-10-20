<?php

class indexController
{
    private $_page;
    private $_content;
    private $_menuItem;
    function __construct($_page)
    {
        $this->_page = $_page;
    }

    function __destruct()
    {
        $menuItem = $this->_menuItem;
        $content = $this->_content;
        include('views/layout.php');
    }

    function index()
    {
        $this->loadView('index');
    }

    function setMenuItem($page)
    {
        $this->_menuItem = $page;
    }
    private function loadView($page)
    {
        ob_start();
        include('views/index/'.$page.'.php');
        $this->_content = ob_get_contents();
        ob_end_clean();
    }
}


$page = isset($_GET['action'])?$_GET['action']:'index'; //page?action=ceva => $page = 'ceva';
//page             => $page = 'index';
/*
if(isset($_GET['action']))
{
    $page = $_GET['action'];
}
else
{
    $action ='index';
}
*/

$controller = new indexController($page);                    //include layout
$controller->$page();      //$controller->index();           ///content =>
$controller->setMenuItem('homepage');
