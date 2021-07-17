<?php

class Mahasiswa_Model extends CI_Model
{
	private $table = 'mahasiswa';

	public function rules()
	{
		return [
			['field' => 'nama', 			'label' => 'Nama', 			'rules' => 'trim|required'],
			['field' => 'jenis_kelamin', 	'label' => 'Jenis Kelamin', 'rules' => 'trim|required'],
			['field' => 'alamat', 			'label' => 'Alamat', 		'rules' => 'trim|required'],
			['field' => 'agama', 			'label' => 'Agama', 		'rules' => 'trim|required'],
			['field' => 'handphone', 		'label' => 'No. HP', 		'rules' => 'trim|required|numeric|min_length[9]|max_length[15]|is_unique[mahasiswa.handphone]'],
			['field' => 'email', 			'label' => 'Email', 		'rules' => 'trim|required|valid_email|is_unique[mahasiswa.email]'],
		];
	}

	public function rules_update()
	{
		return [
			['field' => 'nama', 			'label' => 'Nama', 			'rules' => 'trim|required'],
			['field' => 'jenis_kelamin', 	'label' => 'Jenis Kelamin', 'rules' => 'trim|required'],
			['field' => 'alamat', 			'label' => 'Alamat', 		'rules' => 'trim|required'],
			['field' => 'agama', 			'label' => 'Agama', 		'rules' => 'trim|required'],
			['field' => 'handphone', 		'label' => 'No. HP', 		'rules' => 'trim|required|numeric|min_length[9]|max_length[15]'],
			['field' => 'email', 			'label' => 'Email', 		'rules' => 'trim|required|valid_email'],
		];
	}

	public function getById($id)
	{
		$result = $this->db->get_where($this->table, array('idx' => $id))->row();
		return $result;
	}

	public function getAll()
	{
		$this->db->from($this->table);
		$this->db->order_by('idx', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function save()
	{
		$data = array(
			"nama"			=> $this->input->post('nama'),
			"jenis_kelamin"	=> $this->input->post('jenis_kelamin'),
			"alamat"		=> $this->input->post('alamat'),
			"agama"			=> $this->input->post('agama'),
			"handphone"		=> $this->input->post('handphone'),
			"email"			=> $this->input->post('email'),
		);

		return $this->db->insert($this->table, $data);
	}

	public function update()
	{
		$data = array(
			"nama"			=> $this->input->post('nama'),
			"jenis_kelamin"	=> $this->input->post('jenis_kelamin'),
			"alamat"		=> $this->input->post('alamat'),
			"agama"			=> $this->input->post('agama'),
			"handphone"		=> $this->input->post('handphone'),
			"email"			=> $this->input->post('email'),
		);

		return $this->db->update($this->table, $data, array('idx' => $this->input->post('idx')));
	}

	public function delete($id)
	{
		return $this->db->delete($this->table, array('idx' => $id));
	}
}