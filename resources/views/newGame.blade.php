<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Create new game</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Games</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="/">All games</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/newGame">Create game</a>
                </li>

            </ul>
        </div>
    </nav>
    <div class='container'>
        <div class='row'>
            <div class="col-6">
                <h1>Create new game</h1>
                <form action="/createGame" method="POST" enctype="multipart/form-data" size = '200'>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <label>Name</label>
                    <input type="text" name="name" required class="form-control" >
                    <label>Price($)</label>
                    <input type="number" name="price" required class="form-control" >
                    <label>Recommended age</label>
                    <input type="number" name="min_age" required class="form-control" >
                    <label>Image</label>
                    <input type="file" name="image" required class="form-control" >
                    <label>Genre</label>
                    <select name="genre_id" required class='form-control'>
                        @foreach($genres as $genre)
                        <option value="{{$genre->id}}" >{{$genre->name}}
                        </option>
                        @endforeach
                    </select>
                    <input type="submit" class="btn btn-secondary form-control mt-3">
                </form>
            </div>
        </div>
    </div>
</body>

</html>