<nav class="bg-gray-800" x-data="{ open: false }" x-cloak>
  <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">

      {{-- Nav --}}
      <div class="flex items-center">

        {{-- Logo --}}
        <a href="/" class="flex-shrink-0">
          <img class="w-8 h-8" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=500"
            alt="Workflow">
        </a>

        {{-- Menu Lg --}}
        <div class="hidden md:block">
          <div class="flex items-baseline ml-10 space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            @foreach ($categories as $category)
              <a href="{{ route('posts.category', $category) }}"
                class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">{{ $category->name }}</a>
            @endforeach
            {{-- <a href="#" class="px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-md"
              aria-current="page">Dashboard</a>

            <a href="#"
              class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Projects</a>

            <a href="#"
              class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Calendar</a>

            <a href="#"
              class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Reports</a> --}}
          </div>
        </div>
      </div>

      {{-- Img --}}
      @auth
        <div class="hidden md:block">
          <div class="flex items-center ml-4 md:ml-6">
            <button type="button"
              class="p-1 text-gray-400 bg-gray-800 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
              <span class="sr-only">View notifications</span>
              <!-- Heroicon name: outline/bell -->
              <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
              </svg>
            </button>

            <!-- Profile dropdown -->
            <div class="relative ml-3" x-data="{ open: false }" x-cloak>
              <div>
                <button type="button" x-on:click="open = true"
                  class="flex items-center max-w-xs text-sm bg-gray-800 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                  id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="sr-only">Open user menu</span>
                  <img class="w-8 h-8 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="">
                </button>
              </div>

              <!--
                                                                                                  Dropdown menu, show/hide based on menu state.
                                                                                  
                                                                                                  Entering: "transition ease-out duration-100"
                                                                                                    From: "transform opacity-0 scale-95"
                                                                                                    To: "transform opacity-100 scale-100"
                                                                                                  Leaving: "transition ease-in duration-75"
                                                                                                    From: "transform opacity-100 scale-100"
                                                                                                    To: "transform opacity-0 scale-95"
                                                                                                -->
              <div x-show="open" x-on:click.away="open = false"
                class="absolute right-0 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <!-- Active: "bg-gray-100", Not Active: "" -->
                <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                  tabindex="-1" id="user-menu-item-0">Your Profile</a>

                @can('admin.home')
                  <a href="{{ route('admin.home') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                    tabindex="-1" id="user-menu-item-0">Admin</a>
                @endcan

                <form method="POST" action="{{ route('logout') }}" x-data>
                  @csrf
                  <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                    tabindex="-1" id="user-menu-item-2" @click.prevent="$root.submit();">Sign out</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      @else
        <div>
          <a href="{{ route('login') }}" class="inline-block px-3 py-2 text-sm text-white" role="menuitem" tabindex="-1"
            id="user-menu-item-2">Login</a>
          <a href="{{ route('register') }}" class="inline-block px-3 py-2 text-sm text-white" role="menuitem"
            tabindex="-1" id="user-menu-item-2">Register</a>
        </div>
      @endauth

      <!-- Mobile menu button -->
      <div class="flex -mr-2 md:hidden">
        <button type="button" x-on:click="open = true" x-on:click.away="open = false"
          class="inline-flex items-center justify-center p-2 text-gray-400 bg-gray-800 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
          aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <!--
                Heroicon name: outline/bars-3
  
                Menu open: "hidden", Menu closed: "block"
              -->
          <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!--
                Heroicon name: outline/x-mark
  
                Menu open: "block", Menu closed: "hidden"
              -->
          <svg class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="md:hidden" x-show="open" x-on:click.away="open = false" id="mobile-menu">
    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      @foreach ($categories as $category)
        <a href="{{ route('posts.category', $category) }}"
          class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">{{ $category->name }}</a>
      @endforeach
      {{-- <a href="#" class="block px-3 py-2 text-base font-medium text-white bg-gray-900 rounded-md"
        aria-current="page">Dashboard</a>

      <a href="#"
        class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Team</a>

      <a href="#"
        class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Projects</a>

      <a href="#"
        class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Calendar</a>

      <a href="#"
        class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Reports</a> --}}
    </div>
    @auth
      <div class="pt-4 pb-3 border-t border-gray-700">
        <div class="flex items-center px-5">
          <div class="flex-shrink-0">
            <img class="w-10 h-10 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="">
          </div>
          <div class="ml-3">
            <div class="text-base font-medium leading-none text-white">{{ auth()->user()->name }}</div>
            <div class="text-sm font-medium leading-none text-gray-400">{{ auth()->user()->email }}</div>
          </div>
          <button type="button"
            class="flex-shrink-0 p-1 ml-auto text-gray-400 bg-gray-800 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
            <span class="sr-only">View notifications</span>
            <!-- Heroicon name: outline/bell -->
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
            </svg>
          </button>
        </div>
        <div class="px-2 mt-3 space-y-1">
          <a href="{{ route('profile.show') }}"
            class="block px-3 py-2 text-base font-medium text-gray-400 rounded-md hover:text-white hover:bg-gray-700">Your
            Profile</a>

          {{-- <a href="#"
          class="block px-3 py-2 text-base font-medium text-gray-400 rounded-md hover:text-white hover:bg-gray-700">Settings</a> --}}

          <a href="{{ route('logout') }}"
            class="block px-3 py-2 text-base font-medium text-gray-400 rounded-md hover:text-white hover:bg-gray-700">Sign
            out</a>
        </div>
      </div>
    @endauth
  </div>
</nav>
