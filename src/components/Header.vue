<script setup>
import { RouterLink } from 'vue-router'
import { ref, onMounted, onUnmounted } from 'vue'

// State for mobile menu
const isMobileMenuOpen = ref(false)

// Toggle mobile menu
const toggleMobileMenu = () => {
  isMobileMenuOpen.value = !isMobileMenuOpen.value
}

// Close mobile menu when pressing escape key
const handleEscKey = (event) => {
  if (event.key === 'Escape' && isMobileMenuOpen.value) {
    isMobileMenuOpen.value = false
  }
}

// Close mobile menu when window is resized to desktop size
const handleResize = () => {
  if (window.innerWidth >= 768 && isMobileMenuOpen.value) {
    isMobileMenuOpen.value = false
  }
}

// Add and remove event listeners
onMounted(() => {
  document.addEventListener('keydown', handleEscKey)
  window.addEventListener('resize', handleResize)
})

onUnmounted(() => {
  document.removeEventListener('keydown', handleEscKey)
  window.removeEventListener('resize', handleResize)
})
</script>

<template>
  <header class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center py-4">
        <div class="flex items-center space-x-2">
          <!-- Logo -->
          <div class="flex-shrink-0">
            <RouterLink to="/" class="flex items-center">
              <span class="text-3xl mr-2">🧠</span>
              <span class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-indigo-600">KidsNexus</span>
            </RouterLink>
          </div>
        </div>

        <!-- Mobile menu button -->
        <div class="md:hidden">
          <button
            @click="toggleMobileMenu"
            class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-indigo-600 hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
            aria-expanded="false"
          >
            <span class="sr-only">{{ isMobileMenuOpen ? 'Close menu' : 'Open menu' }}</span>
            <!-- Icon when menu is closed -->
            <svg v-if="!isMobileMenuOpen" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!-- Icon when menu is open -->
            <svg v-else class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!-- Desktop Navigation links -->
        <nav class="hidden md:flex space-x-8">
          <RouterLink to="/" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium">Home</RouterLink>
          <RouterLink to="/about" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium">About</RouterLink>
          <RouterLink to="/features" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium">Features</RouterLink>
          <RouterLink to="/contact" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium">Contact</RouterLink>
        </nav>

        <!-- Desktop Sign-in/Sign-up buttons -->
        <div class="hidden md:flex items-center space-x-4">
          <RouterLink to="/login" class="text-indigo-600 hover:text-indigo-800 px-3 py-2 text-sm font-medium">Log in</RouterLink>
          <RouterLink to="/signup" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-medium shadow-sm">Sign up</RouterLink>
        </div>
      </div>
    </div>

    <!-- Mobile Menu (off-canvas) -->
    <div
      class="md:hidden"
      aria-modal="true"
    >
      <div v-if="isMobileMenuOpen" class="fixed inset-0 bg-gray-600 bg-opacity-75 z-20" @click="toggleMobileMenu"></div>
      <transition name="slide">
        <div v-if="isMobileMenuOpen" class="fixed inset-y-0 right-0 max-w-xs w-full bg-white shadow-xl z-30">
          <div class="flex items-center justify-between px-4 py-5 border-b border-gray-200">
            <div class="flex items-center">
              <span class="text-2xl mr-2">🧠</span>
              <span class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-indigo-600">KidsNexus</span>
            </div>
            <button
              @click="toggleMobileMenu"
              class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none"
            >
              <span class="sr-only">Close menu</span>
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
          <div class="px-2 pt-2 pb-3 space-y-1">
            <RouterLink
              to="/"
              @click="isMobileMenuOpen = false"
              class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:bg-indigo-50 hover:text-indigo-700"
            >
              Home
            </RouterLink>

            <RouterLink
              to="/about"
              @click="isMobileMenuOpen = false"
              class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:bg-indigo-50 hover:text-indigo-700"
            >
              About
            </RouterLink>

            <RouterLink
              to="/features"
              @click="isMobileMenuOpen = false"
              class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:bg-indigo-50 hover:text-indigo-700"
            >
              Features
            </RouterLink>

            <RouterLink
              to="/contact"
              @click="isMobileMenuOpen = false"
              class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:bg-indigo-50 hover:text-indigo-700"
            >
              Contact
            </RouterLink>
          </div>
          <div class="pt-4 pb-3 border-t border-gray-200">
            <div class="px-5 space-y-3">
              <RouterLink
                to="/login"
                @click="isMobileMenuOpen = false"
                class="block w-full text-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-indigo-700 bg-white hover:bg-gray-50"
              >
                Log in
              </RouterLink>

              <RouterLink
                to="/signup"
                @click="isMobileMenuOpen = false"
                class="block w-full text-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700"
              >
                Sign up
              </RouterLink>
            </div>
          </div>
        </div>
      </transition>
    </div>
  </header>
</template>

<style scoped lang="postcss">
/* Mobile menu animation */
.slide-enter-active,
.slide-leave-active {
  transition: transform 0.3s ease-out;
}

.slide-enter-from,
.slide-leave-to {
  transform: translateX(100%);
}
</style>
