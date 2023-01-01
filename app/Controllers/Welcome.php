<?php

namespace App\Controllers;



class Welcome extends BaseController
{
	public function __construct()
	{
	}

	public function index()
	{
		if (session()->get('isLoggedIn') == TRUE) {
			return redirect()->to(base_url('home'));
		}
		if (!$this->validate(['email'  => 'required'])) {
			return view('common/login');
		} else { 
			$email 		= htmlspecialchars($this->request->getVar('email', FILTER_UNSAFE_RAW));
			if ($this->request->getVar('submit')=='Sign in') {  
			$password 		= htmlspecialchars($this->request->getVar('password', FILTER_UNSAFE_RAW));
			
			$user 				= $this->userModel->getUser($email);
			if ($user) {
				$dbpassword		= $user['password'];
				$verify = password_verify($password, $dbpassword);
				if ($verify) { 

					session()->set([
						'user_id'		=> $user['userID'],
						'username'		=> $user['email'],
						'role'			=> $user['role'],
						'isLoggedIn' 	=> TRUE
					]);

					if ($_SESSION['role']==1) { 
						return redirect()->to(base_url('users'));
					}

					if ($_SESSION['role']==2) { 
						return redirect()->to(base_url('my-profile'));
					}

				} else {
					session()->setFlashdata('notif_error', '<b>Your Email ID or Password is Wrong !</b> ');
					return redirect()->to(base_url());
				}
			} else {
				session()->setFlashdata('notif_error', '<b>This Email ID / mobile number is not registered with us.</b> ');
				return redirect()->to(base_url());
			}
		 } ###### END OF SUBMIT BUTTON IF CONDITION ########
		 else {
		 	$user 	= $this->userModel->getUser($email); 
		 	
		 	if (!$user) {
		 		session()->setFlashdata('notif_error', '<b>This Email ID / mobile number is not registered with us.</b> ');
				return redirect()->to(base_url());
		 	}

		 	$status = $this->send_login_otp($email);
		 	if ($status=='success') {
		 		 session()->setFlashdata('notif_success', '<b>OTP mail successfully send.</b>');
				 return redirect()->to(base_url('enter-login-otp/'.base64_encode($email)));
		 	echo '$status : '.$status; die();
		 	} else {
		 		session()->setFlashdata('notif_error', '<b>OTP mail could not send, please try again.</b> ');
				return redirect()->to(base_url());
		 	}

		 }
		} ###### END OF ELSE ##########
	}

	function send_login_otp($to_email){
		$email = \Config\Services::email();
		$email->setFrom('ivsdevmail@gmail.com', 'Basic Admin');
		$email->setTo($to_email);

		$email->setSubject('CI-4 Basic Admin Panel login OTP');
		
		$otp = rand(1000,9999);

		$email->setMessage('Hi User your login OTP is '.$otp);

		$send = $email->send();

		if($send){
			
			$dataAr = ['otp'=>$otp,'userID'=>$to_email,'column_name'=>'login_otp','where_column_name'=>'email']; 

			$saveotp = $this->userModel->save_otp($dataAr); 

			return 'success';

		} {
			return 'failed';
		}
	}

	function enter_login_otp(){
		helper('form');
		$data['email']  = base64_decode($this->request->uri->getSegment(2)); 
		return view('common/enter-login-otp',$data);
	}

	function verify_login_otp(){ 
		$email 		= htmlspecialchars($this->request->getVar('email', FILTER_UNSAFE_RAW));
		$login_otp 	= htmlspecialchars($this->request->getVar('login_otp', FILTER_UNSAFE_RAW));
		$user = $this->userModel->getUser($email); 
		
		if ($user['login_otp']==$login_otp) {
			
			session()->setFlashdata('notif_success', '<b>You are successfully logged in.</b> ');

			session()->set([
						'user_id'		=> $user['userID'],
						'username'		=> $user['email'],
						'role'			=> $user['role'],
						'isLoggedIn' 	=> TRUE
					]);

			if ($user['role']==1) { 
				return redirect()->to(base_url('users'));
			}

			if ($user['role']==2) { 
				return redirect()->to(base_url('my-profile'));
			} 

		} else { 
			session()->setFlashdata('notif_error', '<b>You have entered a wrong OTP, please try again.</b> '); 
			return redirect()->to(base_url('enter-login-otp/'.base64_encode($email)));	
		}

	}

	public function logout()
	{
		$this->session->destroy();
		return redirect()->to(base_url('/'));
	}
 

	public function register()
	{
		return view('common/register');
	}

	public function registration()
	{
		if (!$this->validate([
			'email' 		=> ['label' => 'Email', 'rules' => 'is_unique[users.email]'],
			'password' 	=> ['label' => 'Password', 'rules' => 'required'],
			'password2' 	=> ['label' => 'Password Confirmation', 'rules' => 'matches[password]'],
		])) {
			$data = array_merge($this->data, [
				'title'         => 'Register Page',
			]);

			session()->setFlashdata('notif_error', $this->validation->getError('password2') . ' ' . $this->validation->getError('email'));
			return view('common/register', $data);
		} else {
			$first_name 		= htmlspecialchars($this->request->getVar('first_name', FILTER_UNSAFE_RAW));
			$last_name 		    = htmlspecialchars($this->request->getVar('last_name', FILTER_UNSAFE_RAW));
			$mobile_number 		= htmlspecialchars($this->request->getVar('mobile_number', FILTER_UNSAFE_RAW));

			$email 				= htmlspecialchars($this->request->getVar('email', FILTER_UNSAFE_RAW));
			$password 			= htmlspecialchars($this->request->getVar('password', FILTER_UNSAFE_RAW));
			$dataUser			= [
				'first_name'    => $first_name,
				'last_name'     => $last_name,
				'mobile_number' => $mobile_number,
				'email' 		=> $email,
				'password'      => $password,
				'role' 			=> 2
			];
			$registration		= $this->userModel->createUser($dataUser);
			session()->setFlashdata('notif_success', '<b>Registration Successfully!</b> Please login with your account.');
			return view('common/login');
		}
	}
}
