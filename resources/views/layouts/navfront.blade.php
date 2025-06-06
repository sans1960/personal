  <header class="bg-gray-900" x-data="{ toggled: false }">
      <nav class="flex items-center justify-between px-8 py-4">
        <!-- Logo -->
        <div>
       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-yellow-400">
  <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-2.625 6c-.54 0-.828.419-.936.634a1.96 1.96 0 0 0-.189.866c0 .298.059.605.189.866.108.215.395.634.936.634.54 0 .828-.419.936-.634.13-.26.189-.568.189-.866 0-.298-.059-.605-.189-.866-.108-.215-.395-.634-.936-.634Zm4.314.634c.108-.215.395-.634.936-.634.54 0 .828.419.936.634.13.26.189.568.189.866 0 .298-.059.605-.189.866-.108.215-.395.634-.936.634-.54 0-.828-.419-.936-.634a1.96 1.96 0 0 1-.189-.866c0-.298.059-.605.189-.866Zm2.023 6.828a.75.75 0 1 0-1.06-1.06 3.75 3.75 0 0 1-5.304 0 .75.75 0 0 0-1.06 1.06 5.25 5.25 0 0 0 7.424 0Z" clip-rule="evenodd" />
</svg>

        </div>

        <!-- Large Screen Menu -->
        <div class="hidden sm:block text-gray-500">
          <div class="ml-10 flex items-baseline">
            <a
              href="{{ route('home')}}"
              class="px-3 py-2 rounded-md text-sm font-medium text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700"
              >Home</a
            >
            <a
              href=""
              class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
              >Geografia</a
            >
            <a
              href="#"
              class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
              >Services</a
            >
            <a
              href="#"
              class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
              >Portfolio</a
            >
            <a
              href="#"
              class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
              >Contact</a
            >
          </div>
        </div>

        <!-- Social Media Links -->
        <!-- <div class="hidden sm:block text-gray-500">
          <a
            class="px-1 hover:text-white focus:text-white focus:outline-none"
            href="#"
          >
            <i class="fa fa-facebook fa-2x"></i>
          </a>
          <a
            class="px-1 hover:text-white focus:text-white focus:outline-none"
            href="#"
          >
            <i class="fa fa-twitter fa-2x"></i>
          </a>
          <a
            class="px-1 hover:text-white focus:text-white focus:outline-none"
            href=""
          >
            <i class="fa fa-instagram fa-2x"></i>
          </a>
        </div> -->

        <!-- Mobile Menu Toggle -->
        <div class="sm:hidden">
          <button
            @click="toggled = true"
            class="text-gray-500 hover:text-white focus:text-white focus:outline-none"
            type="button"
          >
            <i
              x-show="!toggled"
              class="fa fa-bars fa-2x"
              aria-hidden="true"
            ></i>
            <i
              x-show="toggled"
              class="fa fa-times fa-2x"
              aria-hidden="true"
            ></i>
          </button>
        </div>
      </nav>

      <!-- Mobile Screen Menu  -->
      <div
        x-show="toggled"
        @click.away="toggled = false"
        class="block sm:hidden px-5 pt-2 pb-3 sm:px-3"
      >
        <a
          href="{{ route('home')}}"
          class="block px-3 py-2 rounded-md text-base font-medium text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700"
          >Home</a
        >
        <a
          href=""
          class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
          >Geografia</a
        >
        <a
          href="#"
          class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
          >Services</a
        >
        <a
          href="#"
          class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
          >Portfolio</a
        >
        <a
          href="#"
          class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
          >Contact</a
        >
        <!-- Social Media Links -->
        <!-- <div class="sm:hidden mt-4 text-gray-500">
          <a
            class="px-1 hover:text-white focus:text-white focus:outline-none"
            href="#"
          >
            <i class="fa fa-facebook fa-2x"></i>
          </a>
          <a
            class="px-1 hover:text-white focus:text-white focus:outline-none"
            href="#"
          >
            <i class="fa fa-twitter fa-2x"></i>
          </a>
          <a
            class="px-1 hover:text-white focus:text-white focus:outline-none"
            href=""
          >
            <i class="fa fa-instagram fa-2x"></i>
          </a>
        </div> -->
      </div>
    </header>
