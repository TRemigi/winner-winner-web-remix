<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winner Winner</title>
</head>

<body>
    <main>
        <h1>Create new participant for {{ $giveaway->name }}</h1>
        <form method="POST" action="{{ route('participants.store', $giveaway) }}">
            @csrf
            <label for="insta_name">Instagram Name</label>
            <input type="text" name="insta_name" id="insta_name" required>
            <input type="hidden" name="giveaway_id" id="giveaway_id" value="{{ $giveaway->id }}">
            <input type="submit" value="Submit">
        </form>
    </main>

</body>

</html>