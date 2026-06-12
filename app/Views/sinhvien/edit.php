<!DOCTYPE html>
<?php $sinhvien = $sinhvien ?? []; ?>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa sinh viên</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: sans-serif; background: #f5f5f5; color: #1a1a1a; }
        .container { padding: 2rem; max-width: 480px; margin: 0 auto; }
        h1 { font-size: 22px; font-weight: 500; margin-bottom: 1.5rem; }
        .card { background: #fff; border: 1px solid #e5e5e5; border-radius: 12px; padding: 1.5rem; }
        .form-group { margin-bottom: 1rem; }
        label { display: block; font-size: 13px; color: #888; margin-bottom: 4px; }
        input, select {
            width: 100%; padding: 8px 12px;
            border: 1px solid #e5e5e5; border-radius: 8px;
            font-size: 14px; outline: none;
        }
        input:focus, select:focus { border-color: #0C447C; }
        .btn-save {
            background: #0C447C; color: #fff;
            padding: 10px 20px; border: none;
            border-radius: 8px; font-size: 14px;
            font-weight: 500; cursor: pointer;
        }
        .btn-save:hover { background: #083058; }
        .btn-cancel {
            color: #555; text-decoration: none;
            font-size: 14px; margin-left: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sửa sinh viên</h1>
        <div class="card">
            <form action="/sinhvien/update" method="POST">
                <input type="hidden" name="id" value="<?= $sinhvien['id'] ?>">
                <div class="form-group">
                    <label>Họ tên</label>
                    <input type="text" name="hoten" value="<?= $sinhvien['hoten'] ?>" required>
                </div>
                <div class="form-group">
                    <label>MSSV</label>
                    <input type="text" name="mssv" value="<?= $sinhvien['mssv'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Giới tính</label>
                    <select name="gioitinh">
                        <option value="Nam"   <?= $sinhvien['gioitinh'] === 'Nam'   ? 'selected' : '' ?>>Nam</option>
                        <option value="Nữ"    <?= $sinhvien['gioitinh'] === 'Nữ'    ? 'selected' : '' ?>>Nữ</option>
                    </select>
                </div>
                <button type="submit" class="btn-save">Lưu</button>
                <a href="/sinhvien/index" class="btn-cancel">Hủy</a>
            </form>
        </div>
    </div>
</body>
</html>