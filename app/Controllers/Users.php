<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Users extends BaseController
{
	public function __construct()
	{
	}
	public function index()
	{
		$data = array_merge($this->data, [
			'title' 	=> 'Users Page',
			'Users'		=> $this->userModel->getUser(),
			'UserRole'	=> $this->userModel->getUserRole()
		]);
		return view('users/userList', $data);
	}
	 

	public function createUser()
	{
		if (!$this->validate(
			[
				'email' => ['rules' => 'is_unique[users.email]'],
				'password' 	=> ['label' => 'Password', 'rules' => 'required'],
				'password2' 	=> ['label' => 'Password Confirmation', 'rules' => 'matches[password]'],
		])

	) {
			session()->setFlashdata('notif_error', '<b>Failed to add new user</b> The user already exists! ');
			return redirect()->to(base_url('users'));
		}
		$createUser = $this->userModel->createUser($this->request->getPost(null, FILTER_UNSAFE_RAW));
		if ($createUser) {
			session()->setFlashdata('notif_success', '<b>Successfully added new user</b> ');
			return redirect()->to(base_url('users'));
		} else {
			session()->setFlashdata('notif_error', '<b>Failed to add new user</b> ');
			return redirect()->to(base_url('users'));
		}
	} 
	 
	public function updateUser()
	{
		$updateUser = $this->userModel->updateUser($this->request->getPost(null, FILTER_UNSAFE_RAW));
		if ($updateUser) {
			session()->setFlashdata('notif_success', '<b>Successfully update user data</b> ');
			return redirect()->to(base_url('users'));
		} else {
			session()->setFlashdata('notif_error', '<b>Failed to update user data</b> ');
			return redirect()->to(base_url('users'));
		}
	}
	
	public function deleteUser()
	{
		$userID =  $this->request->uri->getSegment(3);
		if (!$userID) {
			return redirect()->to(base_url('users'));
		}
		$deleteUser = $this->userModel->deleteUser($userID);
		if ($deleteUser) {
			session()->setFlashdata('notif_success', '<b>Successfully delete user</b> ');
			return redirect()->to(base_url('users'));
		} else {
			session()->setFlashdata('notif_error', '<b>Failed to delete user</b> ');
			return redirect()->to(base_url('users'));
		}
	}
}
