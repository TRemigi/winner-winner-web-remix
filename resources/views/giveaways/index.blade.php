<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winner Winner</title>
</head>

<body>
    <main>
        <h1>All Giveaways</h1>
        @foreach ($giveaways as $giveaway)
        <div>
            <h2>
                <a href="{{$giveaway->path()}}">
                    {{$giveaway->name}}
                </a>
            </h2>
        </div>
        @endforeach
    </main>

</body>

</html>