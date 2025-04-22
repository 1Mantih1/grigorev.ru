<?php
try {
    $db_conn = pg_connect("host=localhost dbname=grigorev_php user=postgres password=1");
    if (!$db_conn) {
        throw new Exception("Не удалось подключиться к базе данных");
    }
} catch (Exception $e) {
    die("Ошибка: " . $e->getMessage());
}
?>