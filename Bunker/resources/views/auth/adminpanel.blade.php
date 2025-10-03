<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; }
        .container { width: 80%; margin: 2rem auto; background: white; padding: 2rem; border-radius: 8px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin dashboard</h1>
        <p>U bent ingelogd als: {{ auth()->user()->email }}</p>

        


        
        <!-- Logout -->
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit">Uitloggen</button>
        </form>
    </div>
</body>
</html>
