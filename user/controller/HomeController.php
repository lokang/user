<?php
/**
 * Created by PhpStorm.
 * User: lokang
 * Date: 4/1/20
 * Time: 1:18 AM
 */
class HomeController extends Controller{
    public function index(){
        if($this->auth){
            $this->redirect('user/account/');
        }
        if($_POST){
            $this->form('email', 'required|min:10|max:150');
            $this->form('password', 'required|min:3|max:10');
            $_users = new User();
            $user = $_users->get($_POST['email'], 'email');

            if($user && $user['password'] == hash('sha512', $_POST['password'])){
                setcookie('id', $user['id'], time()+3600*24*30, '/');
                setcookie('key', hash('sha512', $_POST['password']), time()+3600*24*30, '/');
                $this->redirect('home/account/');
            } else{
                $this->setError('Your details are incorrect');
                $this->back();
            }
        }
        $this->view('login', 'Login');
    }

    public function register(){
        if($this->auth){
            $this->redirect('/user/account/');
        }
        $user = new User();
        if($_POST){
            $lastInsertedId = $user->register($_POST['firstName'], $_POST['middleName'], $_POST['lastName'], $_POST['email'], hash('sha512', $_POST['password']));
            $this->redirect('home/login/');
            //print_r($user);
        }
        $this->view('register', 'register');
    }

    public function login(){
        if($this->auth){
            $this->redirect('user/account/');
        }
        if($_POST){
            $this->form('email', 'required|min:10|max:150');
            $this->form('password', 'required|min:3|max:10');
            $_users = new User();
            $user = $_users->get($_POST['email'], 'email');

            if($user && $user['password'] == hash('sha512', $_POST['password'])){
                setcookie('id', $user['id'], time()+3600*24*30, '/');
                setcookie('key', hash('sha512', $_POST['password']), time()+3600*24*30, '/');
                $this->redirect('home/index/');
            } else{
                $this->setError('Your details are incorrect');
                $this->back();
            }
        }
        $this->view('login', 'Login');
    }

    public function logout(){
        if($this->auth){
            $this->redirect('/home/login/');
        }
        setcookie('id', false, -1, '/');
        setcookie('key', false, -1, '/');
        $this->redirect('home/login/');
    }

    public function passwordRecovery(){
        $user = new User();
        if($_POST){
            $userData = $user->get($_POST['email'], 'email');
            if($userData){
                $newPassword = $this->randomString();
                $user->update($userData['id'], $userData['firstName'], $userData['middleName'], $userData['lastName'], $userData['email'], hash('sha512', $newPassword));
                $this->sendEmail($userData['email'], 'Password recovery', 'Hello user, you requested password recovery. Your new password is ' . $newPassword);
                $this->setError('You requested password recovery. Check your email for more details');
                $this->redirect('home/login/');
            }
        }
        $this->view('passwordRecovery', 'Recover password');
    }

    public function error(){
        $this->view('error', 'Errors');
    }
}