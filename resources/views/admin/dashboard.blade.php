<div class="p-10 text-center">
    <h1 class="text-3xl font-bold text-red-600">Admin Dashboard 🚀</h1>
    <p class="text-gray-600 mt-2">Anda memiliki hak akses penuh (Admin)</p>
    <form action="{{ route('logout') }}" method="POST" class="mt-4">@csrf <button
            class="px-4 py-2 bg-gray-800 text-white rounded">Logout</button></form>
</div>