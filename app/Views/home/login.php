<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: sans-serif;
            background: #f5f5f5;
            color: #1a1a1a;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: #fff;
            border: 1px solid #e5e5e5;
            border-radius: 12px;
            padding: 2rem;
            width: 100%;
            max-width: 380px;
        }
        .login-badge {
            display: inline-block;
            padding: 2px 10px;
            border-radius: 99px;
            font-size: 12px;
            font-weight: 500;
            background: #E6F1FB;
            color: #0C447C;
            margin-bottom: 1.25rem;
        }
        h1 {
            font-size: 22px;
            font-weight: 500;
            margin-bottom: 0.25rem;
        }
        .login-sub {
            font-size: 13px;
            color: #888;
            margin-bottom: 1.75rem;
        }
        .field { margin-bottom: 1rem; }
        .field label {
            display: block;
            font-size: 12px;
            font-weight: 500;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 6px;
        }
        .field input {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid #e5e5e5;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.15s;
        }
        .field input:focus { border-color: #0C447C; }
        .btn-login {
            width: 100%;
            padding: 10px 16px;
            background: #0C447C;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            margin-top: 0.5rem;
            transition: background 0.2s;
        }
        .btn-login:hover { background: #083058; }
        .login-divider {
            border: none;
            border-top: 1px solid #f0f0f0;
            margin: 1.5rem 0 1rem;
        }
        .login-footer {
            font-size: 13px;
            color: #888;
            text-align: center;
        }

        <?php if (!empty($error)): ?>
        .error-msg {
            background: #FCEBEB;
            color: #A32D2D;
            border-radius: 8px;
            padding: 8px 12px;
            font-size: 13px;
            margin-bottom: 1rem;
        }
        <?php endif; ?>
    </style>
</head>
<body>
    <div class="login-card">
        <span class="login-badge">Hệ thống quản lý sinh viên</span>
        <h1>Đăng nhập</h1>
        <p class="login-sub">Nhập tài khoản để tiếp tục</p>

        <?php if (!empty($error)): ?>
            <div class="error-msg"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        
        <form action="/auth/loginProcess" method="POST">
            <div class="field">
                <label for="username">Tên đăng nhập</label>
                <input type="text" id="username" name="username"
                       value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" required>
            </div>
            <div class="field">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password"required>
            </div>
            <button type="submit" class="btn-login">Đăng nhập</button>
        </form>

    </div>
</body>
</html>