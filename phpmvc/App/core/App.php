<?php

class App {
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // Check if URL is set and has at least one element
        if ($url && isset($url[0])) {
            // Check if controller file exists
            if (file_exists('../app/controllers/' . ucfirst($url[0]) . '.php')) {
                $this->controller = ucfirst($url[0]);
                unset($url[0]);
            } else {
                // Jika file controller tidak ditemukan, bisa ditangani dengan menampilkan halaman 404 atau tindakan lainnya
                // Misalnya menampilkan halaman 404:
                // require_once '../app/controllers/Error.php';
                // $this->controller = new Error;
                // $this->method = 'index';
                // return;
            }
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Check if method exists
        if ($url && isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            } else {
                // Jika method tidak ditemukan, bisa ditangani dengan menampilkan halaman 404 atau tindakan lainnya
                // Misalnya menampilkan halaman 404:
                // require_once '../app/controllers/Error.php';
                // $this->controller = new Error;
                // $this->method = 'index';
                // return;
            }
        }

        // Set parameters
        $this->params = $url ? array_values($url) : [];

        // Call the controller with method and parameters
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
