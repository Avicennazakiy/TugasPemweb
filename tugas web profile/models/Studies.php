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

    // Ambil satu data berdasarkan ID (untuk edit)
    public function getById($id)
    {
        $sql = "SELECT * FROM studies WHERE id = ?";
        $ps  = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        return $ps->fetch(PDO::FETCH_ASSOC);
    }
}