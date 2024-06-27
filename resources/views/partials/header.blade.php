<nav class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a class="text-xl font-semibold text-gray-800" href="{{ url('/') }}">Notely</a>
        <div>
            <ul class="flex space-x-4 items-center">
                @guest
                    <li><a class="text-gray-800 hover:text-gray-600" href="{{ route('login') }}">Login</a></li>
                    <li><a class="text-gray-800 hover:text-gray-600" href="{{ route('register') }}">Register</a></li>
                @else
                    <li><a class="text-gray-800 hover:text-gray-600" href="{{ route('notes.index') }}">Notes</a></li>
                    <li><a class="text-gray-800 hover:text-gray-600" href="{{ route('categories.index') }}">Categories</a></li>
                    <li class="relative">
                        <button class="text-gray-800 hover:text-gray-600 focus:outline-none" id="user-menu-button" aria-expanded="true" aria-haspopup="true">
                            {{ Auth::user()->name }}
                        </button>
                        <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden" id="user-menu">
                            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Profile</a>
                                <form action="{{ route('logout') }}" method="POST" class="block">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Logout</button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
