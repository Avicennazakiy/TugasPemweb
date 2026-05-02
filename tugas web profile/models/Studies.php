<?php
class Studies
{
    private $koneksi;

    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function index()
    {
        $sql = "SELECT s.*, l.nama as nama_level 
                FROM studies s
                JOIN level l ON s.idlevel = l.id";
        return $this->koneksi->query($sql);
    }

    public function getLevel()
    {
        return $this->koneksi->query("SELECT * FROM level");
    }
}
