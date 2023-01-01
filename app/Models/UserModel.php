<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	public function getUser($email = false, $userID = false)
	{
		if ($email) {
			return $this->db->table('users')
				->select('*,users.id AS userID,user_role.id AS role_id')
				->join('user_role', 'users.role = user_role.id')
				->where(['email' => $email])->orwhere(['mobile_number' => $email])
				->get()->getRowArray();
		} elseif ($userID) {
			return $this->db->table('users')
				->select('*,users.id AS userID,user_role.id AS role_id')
				->join('user_role', 'users.role = user_role.id')
				->where(['users.id' => $userID])
				->get()->getRowArray();
		} else {
			return $this->db->table('users')
				->select('*,users.id AS userID,user_role.id AS role_id')
				->join('user_role', 'users.role = user_role.id')
				->get()->getResultArray();
		}
	} 

	public function getUserRole($role = false)
	{
		if ($role) {
			return $this->db->table('user_role')
				->where(['id' => $role])
				->get()->getRowArray();
		}

		return $this->db->table('user_role')
			->get()->getResultArray();
	}

	public function createUser($dataUser)
	{
		return $this->db->table('users')->insert([
			'first_name'    => $dataUser['first_name'],
			'last_name'     => $dataUser['last_name'],
			'mobile_number' => $dataUser['mobile_number'],
			'email' 		=> $dataUser['email'],
			'password' 		=> password_hash($dataUser['password'], PASSWORD_DEFAULT),
			'role' 			=> $dataUser['role']??2,
			'created_at'    => date('Y-m-d h:i:s')
		]);
	}


	public function updateUser($dataUser)
	{
		if ($dataUser['password']) {
			$password = password_hash($dataUser['password'], PASSWORD_DEFAULT);
		} else {
			$user 		= $this->getUser(userID: $dataUser['userID']);
			$password 	= $user['password'];
		}
		return $this->db->table('users')->update([
			'first_name'	=> $dataUser['first_name'],
			'last_name'		=> $dataUser['last_name'],
			'mobile_number'	=> $dataUser['mobile_number'],
			'email' 		=> $dataUser['email'],
			'password' 		=> $password,
			'role' 			=> $dataUser['role'],
		], ['id' => $dataUser['userID']]);
	}

	public function save_otp($dataUser)
	{ 
		return $this->db->table('users')->update([
			$dataUser['column_name'] 			=> $dataUser['otp'],
		], [$dataUser['where_column_name'] => $dataUser['userID']]);
	}

	public function update_mail_status()
	{ 
		return $this->db->table('users')->update([
			'mail_status' 	=> 'Verified',
		], ['id' => $_SESSION['user_id']]);
	}

	public function deleteUser($userID)
	{
		return $this->db->table('users')->delete(['id' => $userID]);
	}
}
