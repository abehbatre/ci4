<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class User extends BaseController
{

	protected $db, $tabelUser;

	public function __construct()
	{
		$this->db        = \Config\Database::connect();
		$this->tabelUser = $this->db->table('users');
	}



	// ------------------------------------------------------------------------
	// view
	// ------------------------------------------------------------------------
	public function index()
	{
		$data['title'] = 'Users List';
		$data['allUserList'] = $this->_getUserList()->getResult();
		$data['adminUserList'] = $this->_getUserList('admin')->getResult();
		$data['teacherUserList'] = $this->_getUserList('teacher')->getResult();
		$data['studentUserList'] = $this->_getUserList('student')->getResult();

		return view('users/user_list', $data);
	}

	public function detail($userId)
	{
		$data['title'] = 'Users Detail';
		$data['user'] = $this->_getUserDetail($userId)->getRow();

		if (!empty($data['user']->userid)) {
			return view('users/user_detail', $data);
		} else {
			return throw PageNotFoundException::forPageNotFound();
		}
	}
	public function add()
	{
		$data['title'] = 'Create User';
		return view('users/user_add', $data);
	}


	// ------------------------------------------------------------------------
	// private function
	// ------------------------------------------------------------------------
	private function _getUserList($role = false)
	{
		$this->tabelUser->select('users.id as userid, fullname, username, email, avatar, active,auth_groups.name as roleCode ,auth_groups.description as role');
		$this->tabelUser->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
		$this->tabelUser->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');

		if (!empty($role)) $this->tabelUser->where(['auth_groups.name' => $role]);
		return $this->tabelUser->get();
	}

	private function _getUserDetail($id)
	{
		$this->tabelUser->select('
            users.id as userid, fullname, username, email, avatar,
            active, auth_groups.name as roleCode,
            auth_groups.description as role, 
            users.created_at as user_create_at, users.updated_at as user_update_at
        ');
		$this->tabelUser->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
		$this->tabelUser->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');

		if (!empty($id)) $this->tabelUser->where(['users.id' => $id]);
		return $this->tabelUser->get();
	}
}
