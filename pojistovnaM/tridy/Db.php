<?php

Class Db {

//připojení do databáze
    public function Connection() {
        global $connection;
        $connection = mysqli_connect("localhost", "root", "", "pojistovnamartin");

        if (!$connection) {
            die("Připojení do databáze selhalo");
        }
    }

}
