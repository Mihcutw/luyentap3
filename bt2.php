<?php
function daoNguocMang($mang) {
    $n = count($mang);
    $mangDaoNguoc = [];
    for ($i = $n - 1; $i >= 0; $i--) {
        $mangDaoNguoc[] = $mang[$i];
    }
    return $mangDaoNguoc;
}

$numbers = [1, 2, 3, 4, 5];
$mangDaoNguoc = daoNguocMang($numbers);
print_r($mangDaoNguoc);
?>
