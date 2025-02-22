<?php
function xapXep($mang) {
    $n = count($mang);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($mang[$j] > $mang[$j + 1]) {
                // Hoán đổi giá trị nếu phần tử trước lớn hơn phần tử sau
                $temp = $mang[$j];
                $mang[$j] = $mang[$j + 1];
                $mang[$j + 1] = $temp;
            }
        }
    }
    return $mang;
}

// Ví dụ sử dụng
$numbers = [4, 2, 8, 1];
$numbers = xapXep($numbers);
print_r($numbers);
?>
