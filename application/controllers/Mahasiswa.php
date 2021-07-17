<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('mahasiswa_model');
	}

	public function index()
	{
		$data['title'] = 'Data Mahasiswa';
		$data['mahasiswa'] = $this->mahasiswa_model->getAll();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu');
		$this->load->view('mahasiswa/index', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$this->form_validation->set_rules($this->mahasiswa_model->rules());

		if ( $this->form_validation->run() ) {
			$this->mahasiswa_model->save();

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data mahasiswa berhasil disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          	</button></div>');
            
            redirect("mahasiswa");
		}

		$data['title'] = 'Tambah Data Mahasiswa';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu');
		$this->load->view('mahasiswa/add', $data);
		$this->load->view('templates/footer');
	}

	public function edit($id = null)
	{
		if ( !isset($id) ) redirect('mahasiswa');

		$this->form_validation->set_rules($this->mahasiswa_model->rules_update());

		if ( $this->form_validation->run() ) {
			$this->mahasiswa_model->update();

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data mahasiswa berhasil diperbaharui. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          	</button></div>');
            
            redirect("mahasiswa");
		}

		$data['title'] = 'Edit Data Mahasiswa';
		$data['mahasiswa'] = $this->mahasiswa_model->getById($id);
		if ( !$data['mahasiswa'] ) show_404();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu');
		$this->load->view('mahasiswa/edit', $data);
		$this->load->view('templates/footer');
	}

	public function delete()
	{
		$id = $this->input->get('id');

		if ( !isset($id) ) show_404();

		$this->mahasiswa_model->delete($id);
		$msg['success'] = true;
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data mahasiswa berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        $this->output->set_output(json_encode($msg));
	}

}