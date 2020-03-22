<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		check_not_login();
		$this->load->model('M_pasien','pasien');
		$this->load->model('M_pengguna','pengguna');
		$this->load->model('M_periksa','periksa');
		$this->load->library('pdf');
	} 

	public function index()
	{
		// $this->load->view('template/template');
		$data['pasien'] = $this->pasien->get();
		$data['pengguna'] = $this->pengguna->get_all()->num_rows();
		$data['periksa'] = $this->periksa->get();
		$this->template->load('template/template','menu/dashboard',$data);
	}

	public function tambah()
	{
		$post = $this->input->post(null, true);
		$this->periksa->tambah($post);

		if ($this->db->affected_rows() > 0) {
			redirect('dashboard');
		}
	}

	public function hapus($id)
	{
		$this->periksa->hapus($id);
		if ($this->db->affected_rows() > 0) {
			redirect('dashboard');
		}
	}

	public function cetak_noantrian($id) 
    {
		$data['periksa'] = $this->periksa->cetak_noantri($id)->row();
		$this->load->view('menu/cetak/no_antrian',$data);
		
		$this->pdf->setPaper('A4','landscape');
		$this->pdf->filename = 'noantrian.pdf';
		$this->pdf->load_view('menu/cetak/no_antrian',$data);
    }
}
