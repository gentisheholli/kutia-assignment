<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-title mb-3">
            <h4>Project Name</h4>
        </div>
        <a href="#" class="sidebar-link">Dashboard</a>
        <div class="dropdown mb-3">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                File Management
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{route('fileManagement.create')}}">Create</a>  
                <a class="dropdown-item" href="{{route('fileManagement.allFiles')}}l">Show All</a>
            </div>
        </div>
        <div class="dropdown mb-3">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
               Page Builder
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{route('pageBuilder.create')}}">Create</a>
                <a class="dropdown-item" href="{{route('pageBuilder.allPages')}}">Show All</a>
                <!-- <a class="dropdown-item" href="#">Something else here</a> -->
            </div>
        </div>
        <div class="dropdown mb-3">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Roles & Permissions
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{route('fileManagement.create')}}">Create</a>  
                <a class="dropdown-item" href="{{route('fileManagement.allFiles')}}l">Show All</a>
            </div>
        </div>
        <div class="dropdown mb-3">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
              Users
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{route('pageBuilder.create')}}">Create</a>
                <a class="dropdown-item" href="{{route('pageBuilder.allPages')}}">Show All</a>
                <!-- <a class="dropdown-item" href="#">Something else here</a> -->
            </div>
        </div>
    <div class="container-fluid page-content">
        <div class="row">
            <div class="col-12 p-0">
                <div class="form-title">
                    <div class="col-8 mx-auto">
                        <h4>
                            View All
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-8 mx-auto">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">File Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Action Button</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Document.pdf</td>
                            <td>@username</td>
                            <td>
                                <div class="d-flex">
                                    <a href="./single-show.html" class="btn btn-info ml-2">View</a>
                                    <button type="button" class="btn btn-warning ml-2">Edit</button>
                                    <button type="button" class="btn btn-danger ml-2">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Document.pdf</td>
                            <td>@username</td>
                            <td>
                                <div class="d-flex">
                                    <a href="./single-show.html" class="btn btn-info ml-2">View</a>
                                    <button type="button" class="btn btn-warning ml-2">Edit</button>
                                    <button type="button" class="btn btn-danger ml-2">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Document.pdf</td>
                            <td>@username</td>
                            <td>
                                <div class="d-flex">
                                    <a href="./single-show.html" class="btn btn-info ml-2">View</a>
                                    <button type="button" class="btn btn-warning ml-2">Edit</button>
                                    <button type="button" class="btn btn-danger ml-2">Delete</button>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>