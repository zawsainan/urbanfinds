<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Left Side: Logo and Products/Promotion Select Box -->
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a style="text-decoration: none;" href="{{ route('home') }}" class="d-flex align-items-center">
                        <span class="navbar-brand fs-2 fw-bold text-primary">UrbanFinds</span>
                    </a>
                </div>

                <!-- Products/Promotion Select Box -->
                <div class="ms-4">
                    <select class="form-select" onchange="location = this.value;">
                        <option value="{{ url('products') }}">Products</option>
                        <option value="{{ url('products/promotion') }}">Promotion</option>
                    </select>
                </div>
            </div>

            <!-- Middle: Search Bar -->
            <div class="flex-grow mx-4 text-center" style="max-width: 500px;">
                <form action="{{ url('products/search') }}" class="input-group" role="search">
                    <input 
                        class="form-control mx-auto" 
                        type="search" 
                        placeholder="Search" 
                        aria-label="Search" 
                        name="search"
                        
                    >
                    <button 
                        class="btn btn-primary" 
                        type="submit"
                    >
                        Search
                    </button>
                </form>
            </div>

            <!-- Right Side: Cart and Profile -->
            <div class="flex items-center">
                <!-- Cart Icon -->
                <a href="{{ url('cart') }}" class="btn btn-light me-3">
                    <i class="fa fa-shopping-cart"></i>
                </a>

                <!-- Profile Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                        @auth
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Log Out</button>
                                </form>
                            </li>
                        @endauth
                        @guest
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
