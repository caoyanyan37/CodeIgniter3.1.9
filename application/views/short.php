<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>

    <style type="text/css">
        </style>
</head>
<body>
this is a test view!
<?php if ($username == 'sally'): ?>

    <h3>Hi Sally</h3>

<?php elseif ($username == 'joe'): ?>

    <h3>Hi Joe</h3>

<?php else: ?>

    <h3>Hi unknown user</h3>

<?php endif; ?>
</body>
</html>