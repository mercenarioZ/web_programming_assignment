<?php
require_once('./mvc/core/BaseController.php');
require_once('./mvc/models/User.php');

class PageController extends BaseController
{
    function __construct()
    {
        $this->folder = 'page';
    }

    public function index()
    {
        session_start();
        $this->render('index');
    }

    public function error()
    {
        $this->render('error');
    }

    public function about()
    {
        $this->render('about');
    }

    public function profile()
    {
        session_start();

        // Redirect to login page if user is not logged in
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?controller=user&action=login');
        }

        $username = $_SESSION['user']['username'];

        // Array to store errors
        $errors = array();

        // POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user'])) {

            $username = isset($_POST['username']) ? $_POST['username'] : null;
            $password = isset($_POST['password']) ? $_POST['password'] : null;

            if (!$username) {
                $errors['username'] = 'Username is required';
            }

            if (!$password) {
                $errors['password'] = 'Password is required';
            }


            if (count($errors) > 0) {
                $data = array('errors' => $errors, 'username' => $_SESSION['user']['username']);
                $this->render('profile', $data);
                return;
            }

            $email = $_SESSION['user']['email'];

            // Update user info in the database
            $user = User::updateUserInfo($email, $username, $password);

            if ($user !== null) {
                // User info updated successfully
                // Redirect to a success page or perform any other actions
                $data = array('message' => 'User info updated successfully', 'username' => $username);
                $this->render('profile', $data);
            } else {
                // Failed to update user info
                $data = array('message' => 'Failed to update user info');
                $this->render('profile', $data);
            }
        }

        $data = array('username' => $username, 'errors' => $errors);
        $this->render('profile', $data);
    }
}