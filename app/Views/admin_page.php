<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Page</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f2f2f2;
    }
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }
    .profile {
        text-align: center;
        margin-bottom: 20px;
    }
    .profile img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        margin-bottom: 10px;
    }
    .profile h2 {
        margin: 5px 0;
    }
    .status {
        margin-bottom: 10px;
    }
    .logout-btn {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        text-align: center;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .logout-btn:hover {
        background-color: #45a049;
    }
    @media (max-width: 600px) {
        .profile img {
            width: 100px;
            height: 100px;
        }
    }
</style>
</head>
<body>

<div class="container">
    <div class="profile">
        <img src="profile_picture.jpg" alt="Profile Picture">
        <h2>Nama: <?php echo $userData['nama']; ?></h2>
        <p>Alamat : <?php echo $userData['alamat']; ?></p>
        <p>Email : <?php echo $userData['email']; ?></p>
        <p>Tanggal Input : <?php echo $userData['tanggal_input']; ?></p>
    </div>
    <a href="<?php echo base_url('logout'); ?>" class="logout-btn">Logout</a>
</div>

</body>
</html>
