<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Belanja_desa extends CI_Controller
{
    public function index($id_ = null)
   {
        $edit = $this->db->get_where('belanja_desa', ["id_belanja" => $id_])->row_array();
        $data_query = $this->db->get_where('belanja_desa')->result_array();
        $data = [
            "title" => "Belanja Desa",
            "pages" => "Belanja/index",
            "script" => "Belanja/script",
            "data_sumber" => $data_query,
            "edit"      => json_encode($edit)
        ];
        $this->load->view('Router/route', $data);
    }
    public function action()
    {
        $data = $this->input->post();
        if (!empty($_POST['id_belanja']) && $_POST['id_belanja'] != '') {
            $this->db->where('id_belanja', $_POST['id_belanja']);
            $ins = $this->db->update('belanja_desa', $data);
        } else {
            $ins = $this->db->insert('belanja_desa', $data);
        }

        if ($ins) {
            $this->session->set_flashdata('status', '1');
            redirect(base_url('Belanja_desa/index'));
        } else {
            $this->session->set_flashdata('status', '0');
            redirect(base_url('Belanja_desa/index'));
        }
    }
     public function hapus($id_)
    {
      $this->db->where('id_belanja',$id_);
      $delete = $this->db->delete('belanja_desa');
      
      if($delete){
        $this->session->set_flashdata('pesan','1');
        redirect(base_url('Belanja_desa/index'));
    }else{
        $this->session->set_flashdata('pesan','0');
        redirect(base_url('Belanja_desa/index'));
    }
}
}
