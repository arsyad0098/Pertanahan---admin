<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tanah - Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #007bff;
            color: white;
            padding: 15px 20px;
            font-size: 18px;
            font-weight: bold;
        }
        .container {
            max-width: 900px;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 2px 6px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .status {
            padding: 5px 10px;
            border-radius: 4px;
            color: white;
            font-size: 14px;
        }
        .status.hijau {
            background-color: #28a745;
        }
        .status.merah {
            background-color: #dc3545;
        }
    </style>
</head>
<body>

    <div class="navbar">📂 Pertanahan - Admin</div>

    <div class="container">
        <h1>Daftar Data Tanah</h1>
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

</body>
</html>
