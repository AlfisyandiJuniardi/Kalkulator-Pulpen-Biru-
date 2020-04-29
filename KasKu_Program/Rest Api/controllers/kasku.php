<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class kasku extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kasku
    function index_get() {
        $id = $this->get('id');
        if ($id == '') {
            $kasku = $this->db->get('penyimpanan')->result();
        } else {
            $this->db->where('id', $id);
            $kasku = $this->db->get('penyimpanan')->result();
        }
        $this->response($kasku, 200);
    }

    //Masukan function selanjutnya disini
    //Mengirim atau menambah data kontak baru
    function index_post() {
        $data = array(
        'id' => $this->post('id'),
        'jenis' => $this->post('jenis'),
        'nominal' => $this->post('nominal'),
        'tanggal' => $this->post('tanggal'),
        'catatan' => $this->post('catatan'),);
        $insert = $this->db->insert('penyimpanan', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
    //Memperbarui data kontak yang telah ada
    function index_put() {
        $id = $this->put('id');
        $data = array(
        'id' => $this->put('id'),
        'jenis' => $this->put('jenis'),
        'nominal' => $this->put('nominal'),
        'tanggal' => $this->put('tanggal'),
        'catatan' => $this->put('catatan'),);
        $this->db->where('id', $id);
        $update = $this->db->update('penyimpanan', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
    //Menghapus salah satu data kontak
    function index_delete() {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('penyimpanan');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>