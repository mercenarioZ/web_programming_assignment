<?php
class BaseController
{
    protected $folder;
    function render($file, $data = array())
    {
        $view_file = './mvc/views/' . $this->folder . '/' . $file . '.php';
        if (is_file($view_file)) {
            extract($data);
            ob_start();
            require_once($view_file);
            $content = ob_get_clean();
            if ($this->folder == 'user') {
                require_once('./mvc/views/layouts/user.php');
                return;
            }

            require_once('./mvc/views/layouts/application.php');

        } else {
            header('Location: index.php?controller=pages&action=error');
        }
    }
}