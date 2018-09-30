
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="tree view for passport">
    <meta name="author" content="TJ Bryant">

    <title>tree view</title>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="/js/app.js"></script>

</head>

<body>

<!-- Begin page content -->
<main role="main" class="container">
    <div class="row">
        <ul class="nav nav-tabs" id="navList">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" data-toggle="modal" data-target="#addTreeModal">Add tree root</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </li>
            @foreach($trees as $tree)
                <li class="nav-item">
                    <button class="btn-link nav-link tree-link" href="#" id="tree-{{$tree->id}}" target="{{$tree->id}}">{{{$tree->name}}}</button>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="row justify-content-center" id="treeViewArea">

    </div>
</main>

<!-- Add TreeModal -->
<div class="modal fade" id="addTreeModal" tabindex="-1" role="dialog" aria-labelledby="addTreeModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTreeModalLabel">add tree</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form target="/api/tree" method="post" id="addTreeForm">
                <div class="modal-body">
                    <input name="name" id="newTreeName" type="text" class="form-control" placeholder="tree name" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="addTreeButton" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('ac1705c4f08069db5b77', {
        cluster: 'us2',
        forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('tree.created', function(data) {
        var listItem = '<li class="nav-item"><button class="btn-link nav-link tree-link" href="#" id="tree-' +
            data.tree.id + '" target="' + data.tree.id + '">' + data.tree.name + '</button> </li>';
        $('#navList').append(listItem);
    });
</script>
</body>
</html>
