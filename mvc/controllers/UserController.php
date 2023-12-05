<?php
require_once('./mvc/core/BaseController.php');
require_once('./mvc/models/User.php');
class UserController extends BaseController
{
    function __construct()
    {
        $this->folder = 'user';
    }

    public function login()
    {
        session_start();
        if (!empty($_SESSION['user']['username'])) {
            header('Location: index.php?controller=page');
        }
        // POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = isset($_POST['email']) ? $_POST['email'] : null;
            $password = isset($_POST['password']) ? $_POST['password'] : null;

            // Array to store errors
            $errors = array();

            // Find user in database by username
            $user = User::findByEmail($email);

            if ($user !== null && password_verify($password, $user->password)) {
                $_SESSION['user'] = array(
                    'id' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email,
                    'role' => $user->role,
                    'amountItems' => count(json_decode($user->productsInCart, true)),
                    'productsInCart' => json_decode($user->productsInCart, true)
                );

                header('Location: index.php?controller=page');
            } else {
                $errors['validation'] = 'Invalid username or password';
                $data = array('title' => 'Login', 'errors' => $errors);
                $this->render('login', $data);
            }
        } else {
            // GET
            $data = array('title' => 'Login');
            $this->render('login', $data);
        }
    }

    public function register()
    {
        session_start();
        if (!empty($_SESSION['user']['username'])) {
            header('Location: index.php?controller=page');
        }

        // Check if request method is POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = isset($_POST['username']) ? $_POST['username'] : null;
            $password = isset($_POST['password']) ? $_POST['password'] : null;
            $email = isset($_POST['email']) ? $_POST['email'] : null;
            $password_confirmation = isset($_POST['password_confirmation']) ? $_POST['password_confirmation'] : null;

            // Array to store errors
            $errors = array();

            if (!$username) {
                $errors['username'] = 'Username is required';
            }

            if (!$password || strlen($password) < 6) {
                $errors['password'] = 'Password least 6 characters long';
            }

            if (!$email) {
                $errors['email'] = 'Email is required';
            }

            if (!$password_confirmation) {
                $errors['password_confirmation'] = 'Password confirmation is required';
            }

            // Check if password and password confirmation do not match
            if ($password !== $password_confirmation) {
                $errors['password_match'] = 'Password and password confirmation do not match';
            }

            // Check if email already exists
            $userEmail = User::findByEmail($email);
            if ($userEmail !== null) {
                $errors['email'] = 'Email already exists';
            }

            if (count($errors) > 0) {
                $data = array('title' => 'Register', 'errors' => $errors);
                // echo "<div class='alert alert-danger'>" . implode(',', $errors) . "</div>";
                $this->render('register', $data);
                return;
            }

            $user = User::register($username, $password, $email, 0);


            if ($user !== null) {
                $_SESSION['user'] = array(
                    'id' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email,
                    'role' => $user->role,
                    'amountItems' => count(json_decode($user->productsInCart, true)),
                    'productsInCart' => json_decode($user->productsInCart, true)
                );
                // echo "<script>alert('Register successfully!')</script>";
                header('Location: index.php?controller=page');
            } else {
                $data = array('title' => 'Register');
                $this->render('register', $data);
            }
        } else {
            // If request method is GET
            $data = array('title' => 'Register');
            $this->render('register', $data);
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: index.php?controller=page');
    }
    public function addItem()
    {
        session_start();
        $user = User::findByEmail($_SESSION['user']['email']);
        if (!in_array($_GET['id'], json_decode($user->productsInCart, true))) {
            User::addToCartUser($_SESSION['user']['email'], $_GET['id']);
            $user = User::findByEmail($_SESSION['user']['email']);
            $_SESSION['user'] = array(
                'id' => $user->id,
                'username' => $user->username,
                'email' => $user->email,
                'role' => $user->role,
                'amountItems' => count(json_decode($user->productsInCart, true)),
                'productsInCart' => json_decode($user->productsInCart, true)
            );
            header('Location: index.php?controller=product&action=cart');
        } else {
            header('Location: index.php?controller=page&action=error');
        }
    }
    public function removeItem()
    {
        session_start();
        $user = User::findByEmail($_SESSION['user']['email']);
        if (in_array($_GET['id'], json_decode($user->productsInCart, true))) {
            User::removeFromCartUser($_SESSION['user']['email'], $_GET['id']);
            $user = User::findByEmail($_SESSION['user']['email']);
            $_SESSION['user'] = array(
                'id' => $user->id,
                'username' => $user->username,
                'email' => $user->email,
                'role' => $user->role,
                'amountItems' => count(json_decode($user->productsInCart, true)),
                'productsInCart' => json_decode($user->productsInCart, true)
            );
            header('Location: index.php?controller=product&action=cart');
        } else {
            header('Location: index.php?controller=page&action=error');
        }
    }
    public function forgotPassword() // add to avoid error. delete later
    {
        header('Location: index.php?controller=page&action=error');
    }
    // Have not done yet
    // public function forgotPassword()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $email = isset($_POST['email']) ? $_POST['email'] : null;

    //         // Array to store errors
    //         $errors = array();

    //         $user = User::findByEmail($email);

    //         if (!$email) {
    //             $errors['email'] = 'Email is required';
    //         }

    //         if ($user !== null) {
    //             $token = bin2hex(random_bytes(50));

    //             // Save token to database
    //             User::saveToken($email, $token);

    //             // Send email to user
    //             $resetLink = '...' . $token;
    //             // mail($email, "Password Reset", "Click this link to reset your password: $resetLink");
    //         }

    //         $data = array('title' => 'Forgot password', 'message' => 'Check your email to reset password');
    //         $this->render('forgotPassword', $data);
    //     } else {
    //         // GET
    //         $data = array('title' => 'Forgot password');
    //         $this->render('forgotPassword', $data);
    //     }

    // }

    // public function resetPassword()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $password = isset($_POST['password']) ? $_POST['password'] : null;
    //         $passwordConfirm = isset($_POST['passwordConfirm']) ? $_POST['passwordConfirm'] : null;
    //         $token = isset($_GET['token']) ? $_GET['token'] : null;

    //         // Array to store errors
    //         $errors = array();

    //         if (!$password) {
    //             $errors['password'] = 'Password is required';
    //         }

    //         if (!$passwordConfirm) {
    //             $errors['passwordConfirm'] = 'Password confirmation is required';
    //         }

    //         // Check if password and password confirmation do not match
    //         if ($password !== $passwordConfirm) {
    //             $errors['password_match'] = 'Password and password confirmation do not match';
    //             $data = array('title' => 'Reset password', 'errors' => $errors);
    //             $this->render('resetPassword', $data);
    //             return;
    //         }

    //         // Find user by token
    //         $user = User::findByToken($token);

    //         if ($user !== null) {
    //             // Hash password before storing it in database
    //             $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    //             // $result = User::updatePassword($user->email, $hashedPassword);

    //             if ($result) {
    //                 $data = array('title' => 'Reset password', 'message' => 'Password reset successfully');
    //                 $this->render('resetPassword', $data);
    //             } else {
    //                 $data = array('title' => 'Reset password', 'message' => 'Password reset failed');
    //                 $this->render('resetPassword', $data);
    //             }
    //         } else {
    //             $data = array('title' => 'Reset password', 'message' => 'Password reset failed');
    //             $this->render('resetPassword', $data);
    //         }
    //     }

    //     $data = array('title' => 'Reset password');
    //     $this->render('resetPassword', $data);
    // }
}