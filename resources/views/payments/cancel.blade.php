<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Payment Cancelled</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-red-50 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow text-center">
        <h1 class="text-2xl font-bold text-red-700 mb-4">Payment Cancelled ❌</h1>
        <p class="text-gray-700 mb-4">Your payment was not completed. You can try again.</p>
        <a href="{{ url('/') }}" class="text-white bg-red-600 px-4 py-2 rounded hover:bg-red-700">Go to Home</a>
    </div>
</body>

</html>