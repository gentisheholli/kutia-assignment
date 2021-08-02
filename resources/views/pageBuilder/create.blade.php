<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <title>Document</title>
</head>

<body>
<div class="sidebar">
        <div class="sidebar-title mb-3">
            <h4>Kutia Task</h4>
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
                            Create
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-8 mx-auto">
                <form>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea  required id="editor"></textarea>
                    </div>
                    <div class="form-group d-flex flex-column">
                        <label>Status:</label>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                </form>
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


    <!-- wyzid editor  -->
    <script src="https://cdn.tiny.cloud/1/xfn2g4vol33jic6905y7em7tys59r08si7q42xqecf0eu7f3/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#editor',
            skin: 'bootstrap',
            plugins: 'lists, link, image, media',
            toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
            menubar: false
        });

    </script>
</body>

</html>