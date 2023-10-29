<?php

// This controller will be the base controller for all controllers in the app. It will contain common methods that we want to use in all controllers.

class BaseController 
{
    protected $folder; // This will be the folder that contains the views for the controller

    // This method will render a view in the folder of the controller that is calling it
    function render($file, $data = array())
    {
        // Check if the file exists
        $view_file = 'views/' . $this->folder . '/' . $file . '.php';

        if (is_file($view_file)) {
            extract($data); // Extract the variables from the array. Example: $data = array('name' => 'John'); extract($data); echo $name; will print John

            // Start buffering the output
            ob_start();
            require_once($view_file);
            $content = ob_get_clean(); // Get the contents of the buffer and clean it

            // Load the master view
            require_once('views/layouts/application.php');
        } else {
            header('Location: index.php?controller=pages&action=error'); // If the file does not exist, redirect to the error view
        }
    }
}