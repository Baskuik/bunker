<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Header -->
    <header class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
        <div class="text-2xl font-bold">Admin Dashboard</div>
        <div class="relative flex items-center space-x-4">
            <span>{{ auth()->user()->name }}</span>
            
            <!-- Dropdown -->
<div class="relative">
    <button onclick="toggleDropdown()" class="text-gray-700 hover:text-gray-900 text-2xl focus:outline-none">
        <i class="fa-solid fa-circle-user"></i>
    </button>
    <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-40 bg-white border rounded shadow-lg z-50
        opacity-0 transform -translate-y-2 transition-all duration-200">
        <form action="/adminlogout" method="POST" class="p-2">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 text-red-500 hover:bg-gray-100 rounded">
                Uitloggen
            </button>
        </form>
    </div>
</div>

<script>
function toggleDropdown() {
    const menu = document.getElementById('dropdownMenu');
    menu.classList.toggle('hidden');
    setTimeout(() => {
        if (!menu.classList.contains('hidden')) {
            menu.classList.remove('opacity-0', '-translate-y-2');
            menu.classList.add('opacity-100', 'translate-y-0');
        } else {
            menu.classList.add('opacity-0', '-translate-y-2');
            menu.classList.remove('opacity-100', 'translate-y-0');
        }
    }, 10);
}

// Sluit dropdown als je buiten klikt
window.addEventListener('click', function(e) {
    const menu = document.getElementById('dropdownMenu');
    if (!e.target.closest('.relative')) {
        if (!menu.classList.contains('hidden')) {
            menu.classList.add('opacity-0', '-translate-y-2');
            menu.classList.remove('opacity-100', 'translate-y-0');
            setTimeout(() => menu.classList.add('hidden'), 200);
        }
    }
});
</script>


</body>
</html>

