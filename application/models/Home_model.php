<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model{

    function __construct(){
        parent::__construct();
        
    }
    public function data_pengguna($id_pengguna){
        $dp  =  $this->db
                            ->join('m_pengguna_level','m_pengguna_level.id_level=m_pengguna.id_level')
                            ->join('m_pengguna_data','m_pengguna_data.id=m_pengguna.id_user')
                            ->get_where('m_pengguna', array('id_user'=>$id_pengguna));
        return $dp;
    }
    public function memUsage() {
        $memuse = @memory_get_usage(TRUE);
        if($memuse){
            return $this->getNiceFileSize($memuse);
        }else{
            return "-";
        }
    }
    public function dirSize($directory, $dept = 0) {
        if (!$this->cache->get('chkDirSize_' . md5($directory))) {
            $size = 0;
            foreach (scandir($directory) as $file) {
                if ($file != "." and $file != "..") {
                    $path = $directory . "/" . $file;
                    if (is_file($path)) {
                        $size += filesize($path);
                    } else {
                        if (is_dir($path)) $size += $this->dirSize($path);
                    }
                }
            }
            ($this->load_config()->pagecache_time == 0) ? $cache_time = 1 : $cache_time = $this->load_config()->pagecache_time;
            $this->cache->save('chkDirSize_' . md5($directory), $size, ($cache_time * 60));
            unset($file, $path, $cache_time, $size);
        }
        return $this->cache->get('chkDirSize_' . md5($directory));
   } 
    
    public function getMemLimit() {
        if (!ini_get('memory_limit')) {
            return "-";
        } else {
            return @ini_get('memory_limit');
        }
    }
    private function getNiceFileSize($bytes) {
        $unit = array('B', 'K', 'M', 'G', 'T', 'P');
        if ($bytes == 0){ return '0 ' . $unit[0]; }
        return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), 2) . (isset($unit[$i]) ? $unit[$i] : 'B');
    }
   
    public function usageSpace() {
        return $this->getNiceFileSize(@$this->dirSize(FCPATH));
    }
    function countci(){
        $this->db->select('*')->from('m_ci'); 
        $q = $this->db->get(); 
        return $q->num_rows();
    }
    function countpost(){
        $this->db->select('*')->from('artikel'); 
        $q = $this->db->get(); 
        return $q->num_rows();
    }
    function post_perbulan($tahun){

        for ($i = 1; $i <= 12; $i++) { 
            $bulan = bulan($i);
            $query = $this->db->query("SELECT
                          Count(artikel.id_artikel) AS jumlah
                        FROM
                          artikel
                          
                        WHERE
                          Month(artikel.created) = $i AND
                          Year(artikel.created) = '$tahun'
                                      ");

            $data[] = array(
            'name' => $bulan,
            'y'     => (float)$query->row()->jumlah,
            's'     => (float)$query->row()->jumlah,
            );
        }       
        return $data;

    }
    function jmlh_keg(){
        $query = $this->db->query("SELECT
                                      diklat_transaksi.*
                                    FROM
                                      diklat_transaksi
                                  ");
        return $query;
    }
    function jumlahmhs_total(){
        $query = $this->db->query("SELECT
                                      diklat_transaksi.id_diklat_trans,
                                      diklat_transaksi.nama AS nama1,
                                      diklat_transaksi.instansi AS instansi1,
                                      diklat_transaksi.tanggal_mulai AS tanggal_mulai1,
                                      diklat_transaksi.tanggal_akhir AS tanggal_akhir1,
                                      diklat_transaksi_detail.nama_mahasiswa,
                                      diklat_transaksi_detail.nim,
                                      diklat_transaksi_detail.gender,
                                      diklat_transaksi_detail.telp,
                                      diklat_transaksi_detail.img,
                                      diklat_transaksi_detail.id_pembimbing,
                                      diklat_transaksi_detail.id_ruang
                                    FROM
                                      diklat_transaksi
                                      INNER JOIN diklat_transaksi_detail ON diklat_transaksi_detail.id_diklat_trans = diklat_transaksi.id_diklat_trans
                                  ");
        return $query;
    }
    function jumlahmhs_perid($id_user){
        $query = $this->db->query("SELECT
                                      m_pengguna.id_user AS id_user1,
                                      diklat_transaksi_detail.nama_mahasiswa,
                                      diklat_transaksi_detail.nim,
                                      diklat_transaksi_detail.gender,
                                      diklat_transaksi_detail.telp,
                                      diklat_transaksi_detail.img,
                                      diklat_transaksi_detail.id_pembimbing
                                    FROM
                                      m_pengguna
                                      INNER JOIN m_pengguna_data ON m_pengguna_data.id = m_pengguna.id_m_pengguna
                                      INNER JOIN m_diklat_instansi ON m_diklat_instansi.id = m_pengguna_data.id_diklat_instansi
                                      INNER JOIN diklat_transaksi ON diklat_transaksi.id_instansi = m_diklat_instansi.id
                                      INNER JOIN diklat_transaksi_detail ON diklat_transaksi_detail.id_diklat_trans = diklat_transaksi.id_diklat_trans
                                    WHERE
                                      m_pengguna.id_user = $id_user
                                  ");
        return $query;
    }
    function jmlkeg_perinstansi($id_instansi){
        $query = $this->db->query("SELECT
                                      diklat_transaksi.*
                                    FROM
                                      diklat_transaksi
                                    WHERE
                                      diklat_transaksi.id_instansi = '$id_instansi'
                                  ");
        return $query;
    }
    function mahasiswa_perbulan($tahun){

        for ($i = 1; $i <= 12; $i++) { 
            $bulan = bulan($i);
            $query = $this->db->query("SELECT
                          Count(diklat_transaksi.id_diklat_trans) AS jumlah
                        FROM
                          diklat_transaksi
                        INNER JOIN diklat_transaksi_detail ON diklat_transaksi_detail.id_diklat_trans = diklat_transaksi.id_diklat_trans
                        WHERE
                          Month(diklat_transaksi.tanggal_mulai) = $i AND
                          Year(diklat_transaksi.tanggal_mulai) = '$tahun'
                                      ");

            $data[] = array(
            'name' => $bulan,
            'y'     => (float)$query->row()->jumlah,
            's'     => (float)$query->row()->jumlah,
            );
        }       
        return $data;

    }
    function mahasiswa_perbulan_instansi($tahun, $instansi){

        for ($i = 1; $i <= 12; $i++) { 
            $bulan = bulan($i);
            $query = $this->db->query("SELECT
                          Count(diklat_transaksi.id_diklat_trans) AS jumlah
                        FROM
                          diklat_transaksi
                        INNER JOIN diklat_transaksi_detail ON diklat_transaksi_detail.id_diklat_trans = diklat_transaksi.id_diklat_trans
                        WHERE
                          diklat_transaksi.instansi = '$instansi' AND
                          Month(diklat_transaksi.tanggal_mulai) = $i AND
                          Year(diklat_transaksi.tanggal_mulai) = '$tahun'
                                      ");

            $data[] = array(
            'name' => $bulan,
            'y'     => (float)$query->row()->jumlah,
            's'     => (float)$query->row()->jumlah,
            );
        }       
        return $data;

    }
}