<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Payment Successful</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-green-50 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow text-center">
        <h1 class="text-2xl font-bold text-green-700 mb-4">Payment Successful ✅</h1>
        <p class="text-gray-700 mb-4">Your reservation has been confirmed. Thank you for your payment.</p>
        <a href="{{ url('/') }}" class="text-white bg-green-600 px-4 py-2 rounded hover:bg-green-700">Go to Home</a>
    </div>
</body>

</html>