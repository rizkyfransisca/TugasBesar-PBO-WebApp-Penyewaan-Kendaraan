<?php 

class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    // dbh == database handler -> buat menampung koneksi ke database
    private $dbh;
    // stmt == untuk menyimpan query
    private $stmt;

    // koneksi ke database di dalam method construct -> supaya begitu model ini dipanggil, yang pertama kali dia lakukan adalah koneksi dulu ke database
    public function __construct()
    {
        // dsn -> data source name -> untuk identitas server kita
        $dsn = 'mysql:host='. $this->host .';dbname=' . $this->db_name;

        // option
        $option = [
            PDO::ATTR_PERSISTENT => true, // -> untuk membuat database kita koneksinya terjaga terus
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try{
            // dsn, username db, password db, option. option -> digunakan ketika kita ingin mengoptimasi koneksi ke database kita
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e){
            die($e->getMessage());
        }
    }

    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }

    // kenapa kita bind ? kenapa ga langsung dimasukkan ke dalam query nya ? => supaya terhindar dari sql injection, karena query dieksekusi setelah string nya dibersihkan terlebih dahulu
    public function bind($param, $value, $type = null){
        if (is_null($type)){
            switch(true){ // switch true == supaya switch nya jalan aja
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    // kalo pengen banyak data hasilnya
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC); // ambil semua datanya dan dikembalikan sebagai Array Assosiatif
    }

    // kalo pengen satu hasilnya
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount() // rowCount() yang ini punya kita
    {
        return $this->stmt->rowCount(); // rowCount() yang ini punya PDO
    }

}