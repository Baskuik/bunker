<!-- resources/views/layouts/navbar.blade.php -->
<nav class="bg-white shadow-md">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center space-x-2">
                <a href="/"> <img src="{{ asset('img/bunker.jpg') }}" alt="Logo" width="80" height="100"> </a>
                <a href="/"> <span class="font-bold text-gray-800 text-lg">Bunker</span?> </a>
            </div>

            <div class="flex space-x-6">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
                <a href="{{ route('over') }}" class="text-gray-700 hover:text-blue-600 font-medium">Over ons</a>
                <a href="{{ route('verhaal') }}" class="text-gray-700 hover:text-blue-600 font-medium">Verhaal</a>
                <a href="{{ route('rondleiding')}}"    class="text-gray-700 hover:text-blue-600 font-medium">Rondleiding</a>
                <a href="{{ route('boeken') }}" class="text-gray-700 hover:text-blue-600 font-medium">Boeken</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-blue-600 font-medium">Contact</a>
            </div>


        </div>
    </div>
</nav>
