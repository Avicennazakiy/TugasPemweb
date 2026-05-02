<?php
class Level
{
    private $koneksi;

    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    // tampil semua data
    public function index()
    {
        $sql = "SELECT * FROM level";
        $rs = $this->koneksi->query($sql);
        return $rs;
    }
}