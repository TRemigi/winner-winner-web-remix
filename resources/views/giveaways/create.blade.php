<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winner Winner</title>
</head>

<body>
    <main>
        <h1>Create new giveaway</h1>
        <form method="POST" action="{{ route('giveaways.store') }}">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>
            <input type="submit" value="Submit">
        </form>
    </main>

</body>

</html>