<?php
$students = [
    ["Ho ten" => "Nguyễn Văn A", "Ngày sinh" => "2003-01-10", "Giới tính" => "Nam", "Toán" => 8, "Văn" => 7, "Tiếng Anh" => 9],
    ["Họ tên" => "Trần Thị B", "Ngày sinh" => "2002-05-12", "Giới tính" => "Nữ", "Toán" => 9, "Văn" => 8, "Tiếng Anh" => 9],
    ["Họ tên" => "Lê Văn C", "Ngày sinh" => "2004-07-15", "Giới tính" => "Nam", "Toán" => 7, "Văn" => 6, "Tiếng Anh" => 8],
    ["Họ tên" => "Phạm Thị D", "Ngày sinh" => "2003-09-20", "Giới tính" => "Nữ", "Toán" => 8, "Văn" => 9, "Tiếng Anh" => 10],
    ["Họ tên" => "Hoàng Thị E", "Ngày sinh" => "2002-08-22", "Giới tính" => "Nữ", "Toán" => 9, "Văn" => 8, "Tiếng Anh" => 10],
    ["Họ tên" => "Nguyễn Văn F", "Ngày sinh" => "2001-06-10", "Giới tính" => "Nam", "Toán" => 6, "Văn" => 7, "Tiếng Anh" => 7],
    ["Họ tên" => "Lê Thị G", "Ngày sinh" => "2000-12-15", "Giới tính" => "Nữ", "Toán" => 8, "Văn" => 8, "Tiếng Anh" => 9],
    ["Họ tên" => "Trần Văn H", "Ngày sinh" => "2002-11-30", "Giới tính" => "Nam", "Toán" => 7, "Văn" => 6, "Tiếng Anh" => 7],
    ["Họ tên" => "Phạm Thị I", "Ngày sinh" => "2003-04-18", "Giới tính" => "Nữ", "Toán" => 9, "Văn" => 9, "Tiếng Anh" => 9],
    ["Họ tên" => "Đỗ Văn J", "Ngày sinh" => "2001-09-25", "Giới tính" => "Nam", "Toán" => 6, "Văn" => 6, "Tiếng Anh" => 8],
    ["Họ tên" => "Nguyễn Thị K", "Ngày sinh" => "2004-02-12", "Giới tính" => "Nữ", "Toán" => 9, "Văn" => 7, "Tiếng Anh" => 9],
    ["Họ tên" => "Trần Văn L", "Ngày sinh" => "2002-10-05", "Giới tính" => "Nam", "Toán" => 8, "Văn" => 7, "Tiếng Anh" => 8],
    ["Họ tên" => "Lê Thị M", "Ngày sinh" => "2003-07-17", "Giới tính" => "Nữ", "Toán" => 7, "Văn" => 9, "Tiếng Anh" => 8],
    ["Họ tên" => "Hoàng Văn N", "Ngày sinh" => "2001-03-20", "Giới tính" => "Nam", "Toán" => 6, "Văn" => 8, "Tiếng Anh" => 7],
    ["Họ tên" => "Nguyễn Thị O", "Ngày sinh" => "2002-06-08", "Giới tính" => "Nữ", "Toán" => 8, "Văn" => 9, "Tiếng Anh" => 9],
    ["Họ tên" => "Phạm Văn P", "Ngày sinh" => "2000-09-14", "Giới tính" => "Nam", "Toán" => 7, "Văn" => 6, "Tiếng Anh" => 6],
    ["Họ tên" => "Trần Thị Q", "Ngày sinh" => "2003-11-28", "Giới tính" => "Nữ", "Toán" => 9, "Văn" => 7, "Tiếng Anh" => 8],
    ["Họ tên" => "Lê Văn R", "Ngày sinh" => "2001-01-09", "Giới tính" => "Nam", "Toán" => 6, "Văn" => 7, "Tiếng Anh" => 7],
    ["Họ tên" => "Hoàng Thị S", "Ngày sinh" => "2002-04-25", "Giới tính" => "Nữ", "Toán" => 9, "Văn" => 8, "Tiếng Anh" => 9]
];

function sapXepTheoTen(&$students) {
    $n = count($students);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if (strcmp($students[$j]["Họ tên"], $students[$j + 1]["Họ tên"]) > 0) {
                $temp = $students[$j];
                $students[$j] = $students[$j + 1];
                $students[$j + 1] = $temp;
            }
        }
    }
}

foreach ($students as &$student) {
    $student["Điểm TB"] = ($student["Toán"] + $student["Văn"] + $student["Tiếng Anh"]) / 3;
}
unset($student);

function danhSachNu($students) {
    return array_filter($students, function ($sv) {
        return $sv["Giới tính"] === "Nữ";
    });
}

function sinhVienDiemCao($students) {
    return array_filter($students, function ($sv) {
        return $sv["Điểm TB"] >= 8.0;
    });
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
        if ($sv["Điểm TB"] > $maxNu["Điểm TB"]) {
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
