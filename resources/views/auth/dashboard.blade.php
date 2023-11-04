<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <style>
            table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            }

            tr:nth-child(even) {
            background-color: rgba(150, 212, 212, 0.4);
            }

            th:nth-child(even),td:nth-child(even) {
            background-color: rgba(150, 212, 212, 0.4);
            }
            h1{
                text-align:center;
                margin-top:60px;
                margin-bottom: 40px;
            }
            body{
                padding:100px;
            }
            table{
                padding:100px;

            }
    </style>
<body>

   <a href="{{route('list')}}">Admin Dashboard</a>
</body>
</html>
