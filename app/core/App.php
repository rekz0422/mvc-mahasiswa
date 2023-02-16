<?php

/*  app.php memiliki beberapa fungsi : 
    1. memecahakan url menjadi data array setela tanda "/"  
    2. array yang di pecahkan disimpan dalam 3 variabel dibawah
    3. tujuan ke folder app/controllers 
*/

class App
{
    protected $controller = 'Home'; /* var 1 */
    protected $method = 'index'; /* var 2 */
    protected $params = []; /* var 3 */

    public function __construct()
    {
        $url = $this->parseURL();

        // Controller
        if ($url == "") {
            $this->controller = 'Home';
        } else if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);/* menghilangkan array ke 0 */
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // method 
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params 
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // jalankan controler & method, krim params jika add 

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
