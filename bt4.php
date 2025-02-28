<?php
$students = [
    ["Ho_ten" => "Nguyen Van A", "Ngay_sinh" => "2003-01-10", "Gioi_tinh" => "Nam", "Toan" => 8, "Van" => 7, "Tieng_Anh" => 9],
    ["Ho_ten" => "Tran Thi B", "Ngay_sinh" => "2002-05-12", "Gioi_tinh" => "Nu", "Toan" => 9, "Van" => 8, "Tieng_Anh" => 9],
    ["Ho_ten" => "Le Van C", "Ngay_sinh" => "2004-07-15", "Gioi_tinh" => "Nam", "Toan" => 7, "Van" => 6, "Tieng_Anh" => 8],
    ["Ho_ten" => "Pham Thi D", "Ngay_sinh" => "2003-09-20", "Gioi_tinh" => "Nu", "Toan" => 8, "Van" => 9, "Tieng_Anh" => 10],
    ["Ho_ten" => "Hoang Thi E", "Ngay_sinh" => "2002-08-22", "Gioi_tinh" => "Nu", "Toan" => 9, "Van" => 8, "Tieng_Anh" => 10],
    ["Ho_ten" => "Nguyen Van F", "Ngay_sinh" => "2001-06-10", "Gioi_tinh" => "Nam", "Toan" => 6, "Van" => 7, "Tieng_Anh" => 7],
    ["Ho_ten" => "Le Thi G", "Ngay_sinh" => "2000-12-15", "Gioi_tinh" => "Nu", "Toan" => 8, "Van" => 8, "Tieng_Anh" => 9],
    ["Ho_ten" => "Tran Van H", "Ngay_sinh" => "2002-11-30", "Gioi_tinh" => "Nam", "Toan" => 7, "Van" => 6, "Tieng_Anh" => 7],
    ["Ho_ten" => "Pham Thi I", "Ngay_sinh" => "2003-04-18", "Gioi_tinh" => "Nu", "Toan" => 9, "Van" => 9, "Tieng_Anh" => 9],
    ["Ho_ten" => "Do Van J", "Ngay_sinh" => "2001-09-25", "Gioi_tinh" => "Nam", "Toan" => 6, "Van" => 6, "Tieng_Anh" => 8],
    ["Ho_ten" => "Nguyen Thi K", "Ngay_sinh" => "2004-02-12", "Gioi_tinh" => "Nu", "Toan" => 9, "Van" => 7, "Tieng_Anh" => 9],
    ["Ho_ten" => "Tran Van L", "Ngay_sinh" => "2002-10-05", "Gioi_tinh" => "Nam", "Toan" => 8, "Van" => 7, "Tieng_Anh" => 8],
    ["Ho_ten" => "Le Thi M", "Ngay_sinh" => "2003-07-17", "Gioi_tinh" => "Nu", "Toan" => 7, "Van" => 9, "Tieng_Anh" => 8],
    ["Ho_ten" => "Hoang Van N", "Ngay_sinh" => "2001-03-20", "Gioi_tinh" => "Nam", "Toan" => 6, "Van" => 8, "Tieng_Anh" => 7],
    ["Ho_ten" => "Nguyen Thi O", "Ngay_sinh" => "2002-06-08", "Gioi_tinh" => "Nu", "Toan" => 8, "Van" => 9, "Tieng_Anh" => 9],
    ["Ho_ten" => "Pham Van P", "Ngay_sinh" => "2000-09-14", "Gioi_tinh" => "Nam", "Toan" => 7, "Van" => 6, "Tieng_Anh" => 6],
    ["Ho_ten" => "Tran Thi Q", "Ngay_sinh" => "2003-11-28", "Gioi_tinh" => "Nu", "Toan" => 9, "Van" => 7, "Tieng_Anh" => 8],
    ["Ho_ten" => "Le Van R", "Ngay_sinh" => "2001-01-09", "Gioi_tinh" => "Nam", "Toan" => 6, "Van" => 7, "Tieng_Anh" => 7],
    ["Ho_ten" => "Hoang Thi S", "Ngay_sinh" => "2002-04-25", "Gioi_tinh" => "Nu", "Toan" => 9, "Van" => 8, "Tieng_Anh" => 9]
];

function sapXepTheoTen($students) {
    $n = count($students);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if (strcmp($students[$j]["Ho_ten"], $students[$j + 1]["Ho_ten"]) > 0) {
                $temp = $students[$j];
                $students[$j] = $students[$j + 1];
                $students[$j + 1] = $temp;
            }
        }
    }
}

foreach ($students as &$student) {
    $student["Diem_TB"] = ($student["Toan"] + $student["Van"] + $student["Tieng_Anh"]) / 3;
}

function danhSachNu($students) {
    $result = [];
    foreach ($students as $sv) {
        if ($sv["Gioi_tinh"] === "Nu") {
            $result[] = $sv;
        }
    }
    return $result;
}

function sinhVienDiemCao($students) {
    $result = [];
    foreach ($students as $sv) {
        if ($sv["Diem_TB"] >= 8.0) {
            $result[] = $sv;
        }
    }
    return $result;
}


sapXepTheoTen($students);
echo "<pre>";
print_r($students);
echo "</pre><br>";

function nuDiemCaoNhat($students) {
    $nữ = danhSachNu($students);
    if (empty($nữ)) return null;
    $maxNu = reset($nữ);
    foreach ($nữ as $sv) {
        if ($sv["Diem_TB"] > $maxNu["Diem_TB"]) {
            $maxNu = $sv;
        }
    }
    return $maxNu;
}

echo "Danh sách nữ:<br><pre>";
print_r(danhSachNu($students));
echo "</pre><br>";

echo "Sinh viên có Điểm TB >= 8.0:<br><pre>";
print_r(sinhVienDiemCao($students));
echo "</pre><br>";

echo "Bạn nữ có Điểm TB cao nhất:<br><pre>";
print_r(nuDiemCaoNhat($students));
echo "</pre><br>";
?>