<?php

class Login extends Controller {
    public function index() {
        $user = $this->model('User');
        if(!isset($_SESSION['attempts'])){
     $_SESSION['attempts']=0;
    }
        if($_SESSION['attempts']>=3){
      $locktime=(time() + 60);
      $_SESSION['lockTime'] = $locktime;
      header('Location: /home/Attempts');
    }
        if(isset($_POST['submit'])){
      $user->username=$_POST['name'];
      $user->password=$_POST['pass'];
      //$checkpass=password_verify($pass,$hash);
        $user->authenticate();

          $_SESSION['LastVisit']=$user->getLastVisit($_POST['name']);
        
        header('Location: /home');
      }else{
      $_SESSION['attempts']++;

    }
    }
    public function fetch() {

$user = $this->model('User');

$province = $_REQUEST['get_province'];

$cities = $user->get_cities($province);
$this->view('home/newuser',['list'=>$cities]);

    }

	public function register () {
		$user = $this->model('User');
		$this->view('home/register');
		if(isset($_POST['rig'])){
    $name=$_POST['name'];
    $pass=$_POST['pass'];
   $hash=password_hash($pass,PASSWORD_DEFAULT);

			if($user->register($name,$hash)){
        $this->view('home/index');
      }else{
        header('/home/userexists');
      }
    
		}
	}
}
