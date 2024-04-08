<?php
define('DB_HOST','localhost');
define('DB_NAME','lidy_bijoux_db');
define('DB_USER','userTeste');
define('DB_PASS','02984646#Lua');
define('DB_CHARSET','utf8mb4');
function conectarBancoDados(){
    $dsn = 'mysql:host='. DB_HOST . ';dbname='. DB_NAME . ';charset='. DB_CHARSET;
    $options =[
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    
    try {
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        return $pdo;
    } catch (PDOException $th) {
        throw new PDOException($th->getMessage(), (int)$th->getCode());
    }
}
?>