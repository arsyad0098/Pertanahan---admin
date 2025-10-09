<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Admin - Data Tanah</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <style>
    :root {
      --primary: #29aaf1;
      --primary-dark: #1a8ed3;
      --secondary: #f4f7fa;
      --text: #333;
      --text-light: #888;
      --white: #fff;
      --shadow: 0 6px 12px rgba(0, 0, 0, 0.07);
      --radius: 12px;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: var(--secondary);
      color: var(--text);
      display: flex;
      min-height: 100vh;
    }

    /* SIDEBAR */
    .sidebar {
      width: 250px;
      background: var(--primary);
      color: var(--white);
      padding: 25px 15px;
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      box-shadow: var(--shadow);
      transition: all 0.3s ease;
    }

    .sidebar h2 {
      text-align: center;
      margin-bottom: 30px;
      font-size: 22px;
      font-weight: 600;
    }

    .sidebar a {
      display: flex;
      align-items: center;
      padding: 12px 15px;
      margin-bottom: 10px;
      border-radius: 8px;
      text-decoration: none;
      color: var(--white);
      transition: background 0.3s ease, transform 0.2s ease;
    }

    .sidebar a i {
      margin-right: 12px;
      font-size: 18px;
    }

    .sidebar a:hover {
      background: var(--primary-dark);
      transform: translateX(5px);
    }

    /* MAIN CONTENT */
    .main {
      margin-left: 250px;
      width: calc(100% - 250px);
      transition: margin 0.3s ease;
    }

    .navbar {
      background: var(--white);
      padding: 18px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: var(--shadow);
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .navbar h1 {
      font-size: 22px;
      font-weight: 600;
      color: var(--primary);
    }

    .user-profile {
      display: flex;
      align-items: center;
    }

    .user-profile img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
      object-fit: cover;
    }

    .content {
      padding: 30px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
      background: var(--white);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      overflow: hidden;
    }

    th, td {
      border-bottom: 1px solid #eee;
      padding: 14px;
      text-align: center;
    }

    th {
      background-color: var(--primary);
      color: var(--white);
      font-weight: 500;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .status {
      padding: 5px 10px;
      border-radius: 8px;
      color: #fff;
      font-size: 13px;
      display: inline-block;
      font-weight: 600;
    }

    .status.hijau { background-color: #28a745; }
    .status.merah { background-color: #dc3545; }

    @media (max-width: 768px) {
      .sidebar {
        width: 70px;
      }
      .sidebar h2, .sidebar a span { display: none; }
      .main {
        margin-left: 70px;
        width: calc(100% - 70px);
      }
      .sidebar a { justify-content: center; }
      .sidebar a i { margin-right: 0; }
    }
  </style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
  <h2>Pertanahan</h2>
  <a href="#"><i class="fas fa-database"></i> <span>Data Tanah</span></a>
  <a href="login"><i class="fas fa-sign-out-alt"></i> <span>Keluar</span></a>
</div>

<!-- MAIN -->
<div class="main">
  <div class="navbar">
    <h1>📂 Data Tanah - Admin</h1>
    <div class="user-profile">
      <img src="https://ui-avatars.com/api/?name=Admin&background=29aaf1&color=fff" alt="Admin" />
      <span>Admin</span>
    </div>
  </div>

  <div class="content">
    <h2 style="margin-bottom: 20px;">Daftar Data Tanah</h2>
    <table>
      <tr>
        <th>Pemilik</th>
        <th>Luas</th>
        <th>Status</th>
      </tr>
      @foreach($dataTanah as $tanah)
      <tr>
        <td>{{ $tanah['pemilik'] }}</td>
        <td>{{ $tanah['luas'] }}</td>
        <td>
          @if($tanah['status'] == 'Sengketa')
            <span class="status merah">{{ $tanah['status'] }}</span>
          @else
            <span class="status hijau">{{ $tanah['status'] }}</span>
          @endif
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>

</body>
</html>
