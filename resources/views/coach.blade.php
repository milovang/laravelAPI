
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Get all Coachs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Coachs Page</h2>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Team Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($coaches as $coach)
        <tr>
            <td>{{$coach->id}}</td>
            <td>{{$coach->name}}</td>
            <td>{{$coach->team->name}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
