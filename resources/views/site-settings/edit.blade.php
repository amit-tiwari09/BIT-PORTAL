
@extends('backend.StaffDashboard.index')


<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f4;
        }

        h1 {
            color: white;
            text-align: center;
            padding: 10px 0;
            background-color: #ff69b4;
        }

        table {
            width: 90%;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .status-online {
            background-color: #4CAF50;
            /* Green */
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
        }

        .status-offline {
            background-color: #f44336;
            /* Red */
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
        }

        .edit-button {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
        }

        form {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    @section('content')


    <h1>Authors Table</h1>

    <table>
        <tr>
            <th>LOGO</th>
            <th> ADDRESS</th>
            <th>CONTACT</th>
            <th>EMAIL</th>
            <th>ACTION</th>
        </tr>

        <tr>
            <td>
                <img src="{{ asset('pictures/' . $settings['logo']) }}" alt="Logo" style="width: 50px; height: 50px;">

            </td>
            <td>{{ $settings['address'] ?? '' }}</td>
            <td>{{ $settings['contact'] ?? '' }}</td>
            <td>{{ $settings['email'] ?? '' }}</td>
            <td>
                <form action="{{ route('site-settings.update', 'logo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="file" name="logo"  id="logo">
                    <input type="submit" class="edit-button"  value="Update logo">
                    
                </form>
                <form action="{{ route('site-settings.update', 'address') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="value" value="{{ $settings['address'] ?? '' }}" style="width: 100%; padding: 5px;">
                    <button type="submit" class="edit-button">Update Address</button>
                </form>
                <form action="{{ route('site-settings.update', 'contact') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="value" value="{{ $settings['contact'] ?? '' }}" style="width: 100%; padding: 5px;">
                    <button type="submit" class="edit-button">Update Contact</button>
                </form>
                <form action="{{ route('site-settings.update', 'email') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="value" value="{{ $settings['email'] ?? '' }}" style="width: 100%; padding: 5px;">
                    <button type="submit" class="edit-button">Update Email</button>
                </form>
            </td>
        </tr>
    </table>


    @endsection

</body>

</html>