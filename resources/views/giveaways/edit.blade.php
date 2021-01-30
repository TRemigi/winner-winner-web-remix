<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winner Winner</title>
</head>

<body>
    <main>
        <h1>Edit an Old Giveaway</h1>
        <form method="POST" action="{{ route('giveaways.update', $giveaway)}}">
            @csrf
            @method('PUT')
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{$giveaway->name}}" required>
            <input type="submit" value="Submit">
        </form>
    </main>

</body>

</html>