<?php
class App
{
    protected $controller = 'home';
    protected $action = 'index';
    protected $params = [];

    public function __construct()
    {
        
        $urlProcessed = $this->UrlProcess();

        if (!$urlProcessed) {
            require_once '../app/controllers/' . $this->controller . '.php';
            $this->controller = new $this->controller;
            call_user_func_array([$this->controller, $this->action], []);
            return;
        }

        if (isset($urlProcessed[0])) {
            if (file_exists('../app/controllers/' . $urlProcessed[0] . '.php')) {
                $this->controller = $urlProcessed[0];
            }
            unset($urlProcessed[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        $urlProcessed = array_values($urlProcessed);

        if (isset($urlProcessed[0]) && !empty($urlProcessed[0])) {
            $this->action = $urlProcessed[0]; 
            unset($urlProcessed[0]);
        }

        $this->params = array_values($urlProcessed);
        call_user_func_array([$this->controller, $this->action], $this->params);
    }

    public function UrlProcess() {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(trim($_GET['url'], '/')));
        }
    }
}
?>