<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Games</title>
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
                <li class="nav-item active">
                    <a class="nav-link" href="/">All games</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/newGame">Create game</a>
                </li>

            </ul>
        </div>
    </nav>
    <div class='container'>

        @foreach($chunks as $chunk)
        <div class='row mt-5'>
            @foreach($chunk as $game)
            <div class='col-4'>
                <img src="{{$game['image']}} " width="240" height="120">
                <br>
                <h4>{{$game['name']}}</h4>

                <p i><i class="ion-ios-pricetags-outline"> </i><i> Genre: {{$game['genre']['name']}} </i></p>

                <p><b>Reccomended age: {{$game['min_age']}}</b></p>
                <br>
                <p><b>Price: {{$game['price']}}$</b></p>


                <form action="/changeGame/{{$game->id}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class=" btn  btn-secondary">Change</button>
                    <button name="delete" class=" btn  btn-danger">Delete</button>
                </form>
            </div>
            @endforeach
        </div>

        @endforeach
    </div>
</body>

</html>