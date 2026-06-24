<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: sans-serif; background: #f5f5f5; color: #1a1a1a; min-height: 100vh; display: flex; flex-direction: column; }
        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        .welcome-card {
            background: #fff;
            border: 1px solid #e5e5e5;
            border-radius: 12px;
            padding: 2.5rem 3rem;
            text-align: center;
            max-width: 420px;
            width: 100%;
        }
        .welcome-card .icon-wrap {
            width: 56px; height: 56px;
            background: #E6F1FB;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1.25rem;
        }
        .welcome-card h2 { font-size: 20px; font-weight: 500; margin-bottom: 8px; }
        .welcome-card p  { font-size: 13px; color: #888; margin-bottom: 1.75rem; }
        .btn-go {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: #0C447C;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            transition: background 0.2s;
        }
        .btn-go:hover { background: #083058; }
    </style>
</head>
<body>

<?php include __DIR__ . '/../layout/partial/header.php'; ?>

<main>
    <div class="welcome-card">
        <div class="icon-wrap">
            <i class="ti ti-school" style="font-size:28px;color:#0C447C;"></i>
        </div>
        <h2>Chào mừng trở lại!</h2>
        <p>Hệ thống quản lý sinh viên<br>Trường Đại học ABC</p>
        <a href="/sinhvien/index" class="btn-go">
            <i class="ti ti-users" style="font-size:16px;"></i>
            Xem danh sách sinh viên
        </a>
    </div>
</main>

<?php include __DIR__ . '/../layout/partial/footer.php'; ?>

</body>
</html>