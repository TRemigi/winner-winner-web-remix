<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winner Winner</title>
</head>

<body>
    <h1>{{ $giveaway->name }}</h1>
    @foreach ($participants as $participant)
    <h3>{{$participant->insta_name}}</h3>
    @endforeach
</body>

</html>