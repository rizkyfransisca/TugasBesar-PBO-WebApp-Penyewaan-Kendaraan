<?php 

class App {
    // default controller, method, params -> default url
    protected $controller = 'Admin';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();
        
        // kelola controller
        // Dikarenakan $url[0] nilainya NULL sehingga tidak bisa dibandingkan/dicari ke filenya alias error (mungkin versi lama bisa, tapi versi baru akan error)
        if($url == NULL)
        {
			$url = [$this->controller];
		}
        if(file_exists('../app/controllers/' . $url[0] . '.php')){
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // kelola method
        if( isset($url[1]) ){
            if(method_exists($this->controller, $url[1])){ // check apakah method tersebut ada atau engga di sebuah kelas
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // kelola params
        if (!empty($url)){
            $this->params = array_values($url);
        }

        // jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL(){
        if (isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
        }
    }
}