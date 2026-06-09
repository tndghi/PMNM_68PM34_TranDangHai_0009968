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

        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;   
            min-height: 100vh;       
            background: #f5f5f5;
            font-family: 'Segoe UI', sans-serif;
        }

        .content {
            flex: 1;        
            padding: 20px;
        }
    </style>
</head>
<body>
    <?php require_once '../app/Views/layout/partial/header.php'; ?>

    <div class="content">
        <?php
            if (isset($data)) extract($data);
            require_once '../app/Views/' . $viewname . '.php';
        ?>
    </div>

    <?php require_once '../app/Views/layout/partial/footer.php'; ?>
</body>
</html>