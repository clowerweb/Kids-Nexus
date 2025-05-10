<script setup>
import { RouterView, RouterLink } from 'vue-router'
</script>

<template>
  <div class="min-h-screen flex flex-col bg-gradient-to-br from-indigo-50 to-purple-50">
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
          
          <!-- Navigation links -->
          <nav class="flex space-x-8">
            <RouterLink to="/" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium">Home</RouterLink>
            <RouterLink to="/about" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium">About</RouterLink>
            <RouterLink to="/features" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium">Features</RouterLink>
            <RouterLink to="/contact" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium">Contact</RouterLink>
          </nav>
          
          <!-- Sign-in/Sign-up buttons -->
          <div class="flex items-center space-x-4">
            <RouterLink to="/login" class="text-indigo-600 hover:text-indigo-800 px-3 py-2 text-sm font-medium">Log in</RouterLink>
            <RouterLink to="/signup" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-medium shadow-sm">Sign up</RouterLink>
          </div>
        </div>
      </div>
    </header>

    <main class="flex-grow">
      <RouterView v-slot="{ Component }">
        <transition name="page" mode="out-in">
          <component :is="Component" />
        </transition>
      </RouterView>
    </main>

    <footer class="bg-gray-800 text-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div>
            <h3 class="text-lg font-semibold mb-4">KidsNexus</h3>
            <p class="text-gray-300 text-sm">
              A free, open-source AI-powered learning platform designed to help children 
              learn at their own pace with personalized education.
            </p>
          </div>
          <div>
            <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
            <ul class="space-y-2 text-sm text-gray-300">
              <li><RouterLink to="/" class="hover:text-white">Home</RouterLink></li>
              <li><RouterLink to="/about" class="hover:text-white">About</RouterLink></li>
              <li><RouterLink to="/features" class="hover:text-white">Features</RouterLink></li>
              <li><RouterLink to="/contact" class="hover:text-white">Contact</RouterLink></li>
              <li><RouterLink to="/privacy" class="hover:text-white">Privacy Policy</RouterLink></li>
            </ul>
          </div>
          <div>
            <h3 class="text-lg font-semibold mb-4">Contact</h3>
            <p class="text-gray-300 text-sm">Have questions? <a href="mailto:info@kidsnexus.org" class="text-indigo-300 hover:text-indigo-200">info@kidsnexus.org</a></p>
            <div class="flex space-x-4 mt-4">
              <a href="#" class="text-gray-400 hover:text-white">
                <span class="sr-only">Twitter</span>
                <span class="text-xl">🐦</span>
              </a>
              <a href="#" class="text-gray-400 hover:text-white">
                <span class="sr-only">GitHub</span>
                <span class="text-xl">🐙</span>
              </a>
            </div>
          </div>
        </div>
        <div class="mt-8 pt-8 border-t border-gray-700 text-center text-sm text-gray-400">
          <p>&copy; {{ new Date().getFullYear() }} KidsNexus. All rights reserved.</p>
        </div>
      </div>
    </footer>
  </div>
</template>

<style lang="postcss">
@tailwind base;
@tailwind components;
@tailwind utilities;

/* Page transition animations */
.page-enter-active,
.page-leave-active {
  transition: opacity 0.2s ease;
}

.page-enter-from,
.page-leave-to {
  opacity: 0;
}

body {
  @apply font-sans text-gray-800;
  min-height: 100vh;
}
</style>
