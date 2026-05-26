<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: sans-serif; background: #f5f5f5; padding: 2rem; color: #1a1a1a; }

        h1 { font-size: 22px; font-weight: 500; margin-bottom: 1.5rem; }

        .table-wrap {
            background: #fff;
            border: 1px solid #e5e5e5;
            border-radius: 12px;
            overflow: hidden;
        }

        table { width: 100%; border-collapse: collapse; font-size: 14px; }

        thead tr { background: #f9f9f9; }
        thead th {
            padding: 12px 16px;
            text-align: left;
            font-weight: 500;
            font-size: 12px;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 1px solid #e5e5e5;
        }

        tbody tr { border-bottom: 1px solid #f0f0f0; transition: background 0.15s; }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: #f9f9f9; }
        tbody td { padding: 12px 16px; }

        .id-cell { color: #999; font-family: monospace; }
        .name-cell { font-weight: 500; }
        .mssv-cell { font-family: monospace; color: #555; }

        .gender-badge {
            display: inline-block;
            padding: 2px 10px;
            border-radius: 99px;
            font-size: 12px;
            font-weight: 500;
        }
        .male   { background: #E6F1FB; color: #0C447C; }
        .female { background: #FBEAF0; color: #72243E; }
    </style>
</head>
<body>
    <h1>Danh sách sinh viên</h1>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>MSSV</th>
                    <th>Giới tính</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach (($sinhviens ?? []) as $sinhvien): ?>
                <tr>
                    <td class="id-cell">#<?= str_pad($sinhvien['id'], 2, '0', STR_PAD_LEFT) ?></td>
                    <td class="name-cell"><?= $sinhvien['hoten'] ?></td>
                    <td class="mssv-cell"><?= $sinhvien['mssv'] ?></td>
                    <td>
                        <span class="gender-badge <?= $sinhvien['gioitinh'] === 'Nam' ? 'male' : 'female' ?>">
                            <?= $sinhvien['gioitinh'] ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>