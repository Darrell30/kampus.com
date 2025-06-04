<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Selamat Datang di Dashboard!</h1>
    <p>Halo, {{ Auth::user()->name }} (Role: {{ Auth::user()->role }})</p>
</body>
</html>
