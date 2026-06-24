<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($data['title']) ? $data['title'] : 'Default Title'; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    <style>
        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: sans-serif;
            background: #f5f5f5;
        }

        .main-content {
            flex: 1;
            padding: 20px;
        }
    </style>
</head>
<body>
    <?php include __DIR__ . '/partial/header.php'; ?>

    <div class="main-content">
        <?php include '../app/Views/' . (isset($viewname) ? $viewname : 'dashboard') . '.php'; ?>
    </div>

    <?php include __DIR__ . '/partial/footer.php'; ?>
</body>
</html>