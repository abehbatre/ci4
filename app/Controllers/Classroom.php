<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ClassroomModel;

class Classroom extends BaseController
{
	
    protected $classroomModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->classroomModel = new ClassroomModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> 'classroom',
                'title'     		=> 'Classroom'				
			];
		
		return view('classroom/classroom', $data);
			
	}

	public function getAll()
	{
 		$response = array();		
		
	    $data['data'] = array();
 
		$result = $this->classroomModel->select('id, classroom_code, classroom_name')->findAll();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="buttons">';
			$ops .= '	<button type="button" class="btn btn-icon btn-primary" onclick="edit('. $value->id .')"><i class="fa fa-edit"></i></button>';
			$ops .= '	<button type="button" class="btn btn-icon btn-danger" onclick="remove('. $value->id .')"><i class="fa fa-times"></i></button>';
			$ops .= '</div>';
			
			$data['data'][$key] = array(
				$value->id,
				$value->classroom_code,
				$value->classroom_name,

				$ops,
			);
		} 

		return $this->response->setJSON($data);		
	}
	
	public function getOne()
	{
 		$response = array();
		
		$id = $this->request->getPost('id');
		
		if ($this->validation->check($id, 'required|numeric')) {
			
			$data = $this->classroomModel->where('id' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			
			throw new \CodeIgniter\Exceptions\PageNotFoundException();

		}	
		
	}	
	
	public function add()
	{

        $response = array();

        $fields['id'] = $this->request->getPost('id');
        $fields['classroom_code'] = $this->request->getPost('classroomCode');
        $fields['classroom_name'] = $this->request->getPost('classroomName');


        $this->validation->setRules([
            'classroom_code' => ['label' => 'Classroom code', 'rules' => 'required|max_length[100]'],
            'classroom_name' => ['label' => 'Classroom name', 'rules' => 'required|max_length[100]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
            $response['messages'] = $this->validation->listErrors();
			
        } else {

            if ($this->classroomModel->insert($fields)) {
												
                $response['success'] = true;
                $response['messages'] = 'Data has been inserted successfully';	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = 'Insertion error!';
				
            }
        }
		
        return $this->response->setJSON($response);
	}

	public function edit()
	{

        $response = array();
		
        $fields['id'] = $this->request->getPost('id');
        $fields['classroom_code'] = $this->request->getPost('classroomCode');
        $fields['classroom_name'] = $this->request->getPost('classroomName');


        $this->validation->setRules([
            'classroom_code' => ['label' => 'Classroom code', 'rules' => 'required|max_length[100]'],
            'classroom_name' => ['label' => 'Classroom name', 'rules' => 'required|max_length[100]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
            $response['messages'] = $this->validation->listErrors();
			
        } else {

            if ($this->classroomModel->update($fields['id'], $fields)) {
				
                $response['success'] = true;
                $response['messages'] = 'Successfully updated';	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = 'Update error!';
				
            }
        }
		
        return $this->response->setJSON($response);
		
	}
	
	public function remove()
	{
		$response = array();
		
		$id = $this->request->getPost('id');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->classroomModel->where('id', $id)->delete()) {
								
				$response['success'] = true;
				$response['messages'] = 'Deletion succeeded';	
				
			} else {
				
				$response['success'] = false;
				$response['messages'] = 'Deletion error!';
				
			}
		}	
	
        return $this->response->setJSON($response);		
	}	
		
}	