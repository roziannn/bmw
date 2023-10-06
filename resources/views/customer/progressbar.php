<?php
session_start();

if (!isset($_SESSION['progress'])) {
    $_SESSION['progress'] = 0;
    $_SESSION['status'] = 'Ready';
}

if (isset($_POST['reset'])) {
    $_SESSION['progress'] = 0;
    $_SESSION['status'] = 'Reset';
}

if ($_SESSION['progress'] < 100) {
    $_SESSION['progress'] += 1;
    $_SESSION['status'] = 'Running';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Progress Bar</title>
</head>
<body>
    <?php include 'progress.php'; ?>
    
    <script>
        setTimeout(function() {
            window.location.reload();
        }, 1000);
    </script>
</body>
</html>
