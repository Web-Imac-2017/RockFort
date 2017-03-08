<?php

namespace App\Controller;

class Controller{

    protected $viewpath;
    protected $template;

    protected function render($view, $variables = []){
        ob_start();
        extract($variables);
        require($view = $this->viewpath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require('App/View/template/' . $this->template . '.php');
        //require($this->viewpath . '/template/' . $this->template . '.php');
    }



/*class View {
    function render($file, $variables = array()) {
        extract($variables);

        ob_start();
        include $file;
        $renderedView = ob_get_clean();

        return $renderedView;
    }
}

$view = new View();
echo $view->render('viewfile.php', array('foo' => 'bar'));*/







/*protected function forbidden(){
            header('HTTP/1.0 403 Forbidden');
            die('Accès interdit');
        }

        protected function notFound(){
            header('HTTP/1.0 404 Not Found');
            die("Page introuvable");
        }*/

}