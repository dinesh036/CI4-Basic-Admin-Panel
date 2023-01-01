<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
	public function index()
	{ 
		$user = $this->userModel->getUser('',$_SESSION['user_id']); 

		helper('form');
		$data = ['first_name'=>$user['first_name'],'last_name'=>$user['last_name'],'email'=>$user['email'],'mobile_number'=>$user['mobile_number'],'mail_status'=>$user['mail_status'],'role'=>$user['role']];
		
		return view('common/home', $data);
	}

	public function verify_mail(){
		$user = $this->userModel->getUser('',$_SESSION['user_id']); 

		helper('form');
		$data = ['email'=>$user['email'],'otp_field'=>'hide','btn_name'=>'Send OTP Now','action'=>'send-otp'];
		return view('common/verify-mail',$data);
	}

	public function send_otp(){
		
		$to =  htmlspecialchars($this->request->getVar('email', FILTER_UNSAFE_RAW)); 

		$email = \Config\Services::email();
		$email->setFrom('ivsdevmail@gmail.com', 'Basic Admin');
		$email->setTo($to);

		$email->setSubject('Email verification OTP');
		
		$otp = rand(1000,9999);

		$email->setMessage('Hi User your mail verification OTP is '.$otp);

		$send = $email->send();

		if($send){
			$this->userModel->save_otp(['otp'=>$otp,'userID'=>$_SESSION['user_id'],'column_name'=>'otp','where_column_name'=>'id']);

			session()->setFlashdata('notif_success', '<b>OTP mail successfully send.</b> ');
			return redirect()->to(base_url('enter-otp'));

		} {
			session()->setFlashdata('notif_error', '<b>OTP mail could not send, please try again.</b> ');
			return redirect()->to(base_url('verify-mail'));
		}

	}

	public function enter_otp(){
		$user = $this->userModel->getUser('',$_SESSION['user_id']); 

		helper('form');
		$data = ['email'=>$user['email'],'otp_field'=>'show','btn_name'=>'Verify OTP','action'=>'verify-otp'];
		return view('common/verify-mail',$data);
	}

	public function verify_otp(){
		$entered_otp = $this->request->getPost('otp', FILTER_UNSAFE_RAW);
		$user = $this->userModel->getUser('',$_SESSION['user_id']);

		if ($user['otp']==$entered_otp) {

			$this->userModel->update_mail_status();
			
			session()->setFlashdata('notif_success', '<b>Your mail id successfully verified.</b> ');
			return redirect()->to(base_url('my-profile'));
		} else {
			echo "otp not verified.";
			session()->setFlashdata('notif_error', '<b>You have entered a wrong OTP, please try again.</b> ');
			return redirect()->to(base_url('enter-otp'));	
		}
	} 
}
