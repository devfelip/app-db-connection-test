<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <title>Index</title>
</head>

<body>
    <div id="container">
        <form class="form-group" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label for="txtDbConnection">Connection</label>
            <select class="form-control" id="txtConnection" name="connection">
                <option>pgsql</option>
            </select>
            <div class="form-group">
                <label for="txtHost">Host</label>
                <input type="text" class="form-control" id="txtHost" name="host" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="txtPort">Port</label>
                <input type="text" class="form-control" id="txtPort" name="port" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="txtDatabase">Database</label>
                <input type="text" class="form-control" id="txtDatabase" name="database" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="txtUsername">Username</label>
                <input type="text" class="form-control" id="txtUsername" name="username" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="txtPassword">Password</label>
                <input type="password" class="form-control" id="txtPassword" name="password" placeholder="Enter email">
            </div>
            <label for="txtTables">Schema</label>
            <div class="form-group">
                <select class="form-control" id="txtSchemas" name="schema">
                    <option>*</option>
                </select>
            </div>            
            <label for="txtTables">Table</label>
            <div class="form-group">
                <select class="form-control" id="txtTables" name="table">
                    <option>*</option>
                </select>
            </div>            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div id="dados"></div>
</body>

</html>
