<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Events List</h1>
        <!-- Here you can loop through the events and display them -->
        <ul>
            @foreach ($events as $event)
                <li class="mb-4">
                    <h2 class="text-xl font-bold">{{ $event->title }}</h2>
                    <p>{{ $event->description }}</p>
                    <p>{{ $event->date }} at {{ $event->time }}</p>
                    <p>Location: {{ $event->location }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
