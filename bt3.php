<?php
function timGiaTri($giaTri, $mang) {
    $n = count($mang);
    for ($i = 0; $i < $n; $i++) {
        if ($mang[$i] === $giaTri) {
            return $i;
        }
    }
    return -1; 
}

$traiCay = ["Apple", "Banana", "Cherry"];
$index = timGiaTri("Banana", $traiCay);
echo "Giá trị tìm thấy được : $index <br> "  ; 

$index = timGiaTri("Chuoi", $traiCay);
echo "Giá trị không tìm thấy được : $index <br> "  ; 
?>
