<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sinh viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: sans-serif; background: #f5f5f5; color: #1a1a1a; min-height: 100vh; display: flex; flex-direction: column; }
        main { flex: 1; padding: 2rem 24px; }
        h1 { font-size: 22px; font-weight: 500; margin-bottom: 1.5rem; }
        .form-card {
            background: #fff;
            border: 1px solid #e5e5e5;
            border-radius: 12px;
            padding: 1.75rem 2rem;
            max-width: 480px;
            margin: 0 auto; 
        }
        .field { margin-bottom: 1.1rem; }
        .field label {
            display: block;
            font-size: 12px;
            font-weight: 500;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 6px;
        }
        .field input, .field select {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid #e5e5e5;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.15s;
            background: #fff;
        }
        .field input:focus, .field select:focus { border-color: #0C447C; }
        .form-actions { display: flex; gap: 10px; margin-top: 1.5rem; }
        .btn-submit {
            padding: 10px 20px;
            background: #0C447C;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: background 0.2s;
        }
        .btn-submit:hover { background: #083058; }
        .btn-back {
            padding: 10px 20px;
            background: #fff;
            color: #555;
            border: 1px solid #e5e5e5;
            border-radius: 8px;
            font-size: 14px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: border-color 0.15s;
        }
        .btn-back:hover { border-color: #0C447C; color: #0C447C; }
        h1 {
        font-size: 22px;
        font-weight: 500;
        margin-bottom: 1.5rem;
        text-align: center;
        }
    </style>
</head>
<body>

<?php include __DIR__ . '/../layout/partial/header.php'; ?>

<main>
    <h1>Thêm sinh viên</h1>
    <div class="form-card">

         <?php if (!empty($error)): ?>
            <div style="
                background: #FCEBEB;
                color: #A32D2D;
                border-radius: 8px;
                padding: 10px 14px;
                font-size: 13px;
                margin-bottom: 1.1rem;
                display: flex;
                align-items: center;
                gap: 8px;
            ">
                <i class="ti ti-alert-circle" style="font-size:16px;flex-shrink:0;"></i>
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        
        <form action="/sinhvien/store" method="POST">
            <div class="field">
                <label for="hoten">Họ tên</label>
                <input type="text" id="hoten" name="hoten" placeholder="Nhập họ tên sinh viên..." required>
            </div>
            <div class="field">
                <label for="mssv">MSSV</label>
                <input type="text" id="mssv" name="mssv" placeholder="Nhập mã số sinh viên..." required>
            </div>
            <div class="field">
                <label for="gioitinh">Giới tính</label>
                <select id="gioitinh" name="gioitinh" required>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>
            <div class="field">
                <label for="malop">Lớp</label>
                <select id="malop" name="malop">
                    <?php foreach (($danhSachLop ?? []) as $lop): ?>
                        <option value="<?= htmlspecialchars($lop['malop']) ?>">
                            <?= htmlspecialchars($lop['tenlop']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn-submit">
                    <i class="ti ti-plus" style="font-size:14px;"></i>
                    Thêm sinh viên
                </button>
                <a href="/sinhvien/index?page=<?= $page ?? 1 ?>" class="btn-back">
                    <i class="ti ti-arrow-left" style="font-size:14px;"></i>
                    Quay lại
                </a>
            </div>
        </form>
    </div>
</main>

<?php include __DIR__ . '/../layout/partial/footer.php'; ?>

</body>
</html>