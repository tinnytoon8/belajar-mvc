<?php

class App {
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseURL();

        // Ensure $url is an array before proceeding
        if ($url) {
            // Controller
            if (isset($url[0]) && file_exists('../app/controllers/' . $url[0] . '.php')) {
                $this->controller = $url[0];
                unset($url[0]);
            }
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Method
        if ($url && isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Parameter
        if ($url && !empty($url)) {
            $this->params = array_values($url);
        }

        // Jalankan Controller & Method serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');  // Hapus slash di akhir
            $url = filter_var($url, FILTER_SANITIZE_URL);  // Filter URL
            $url = explode('/', $url);  // Pisah URL menjadi array
            return $url;
        }
        return [];  // Kembalikan array kosong jika 'url' tidak ada
    }
    
}
