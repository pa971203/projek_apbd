<?php

use SebastianBergmann\Environment\Console;

defined('BASEPATH') or exit('No direct script access allowed');

class Pembiayaan extends CI_Controller
{
    public function index($id_ = null)
    {
        $edit = $this->db->get_where('pembiayaan_desa', ["id_pembiayaan" => $id_])->row_array();
        $data_query = $this->db->get_where('pembiayaan_desa')->result_array();
        $data = [
            "title" => "Pembiayaan",
            "pages" => "Pembiayaan/index",
            "script" => "Pembiayaan/script",
            "data_sumber" => $data_query,
            "edit"      => json_encode($edit)
        ];
        $this->load->view('Router/route', $data);
    }
    public function action()
    {
        $data = $this->input->post();
        if (!empty($_POST['id_pembiayaan']) && $_POST['id_pembiayaan'] != '') {
            $this->db->where('id_pembiayaan', $_POST['id_pembiayaan']);
            $ins = $this->db->update('pembiayaan_desa', $data);
        } else {
            $ins = $this->db->insert('pembiayaan_desa', $data);
        }

        if ($ins) {
            $this->session->set_flashdata('status', '1');
            redirect(base_url('Pembiayaan/index'));
        } else {
            $this->session->set_flashdata('status', '0');
            redirect(base_url('Pembiayaan/index'));
        }
    }
    public function hapus($id_)
    {
      $this->db->where('id_pembiayaan',$id_);
      $delete = $this->db->delete('pembiayaan_desa');
      
      if($delete){
        $this->session->set_flashdata('pesan','1');
        redirect(base_url('Pembiayaan/index'));
    }else{
        $this->session->set_flashdata('pesan','0');
        redirect(base_url('Pembiayaan/index'));
    }
}
}
