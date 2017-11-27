<!DOCTYPE html>
<html lang="en">
<head>
    <title>TeamsCompeteList </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Teams Compete List</h2>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Competed</th>
            <th>Won</th>
            <th>Team Name</th>
            <th>Flag</th>
        </tr>
        </thead>
        <tbody>
        @foreach($competes as $compete)
            <tr>
                <td>{{$compete->iCompeted}}</td>
                <td>{{$compete->iWon}}</td>
                <td>{{$compete->team->name}}</td>
                <td><img src="{{$compete->flag}}" style="width: 50px" alt=""></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
