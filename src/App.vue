<script setup>
import { RouterView, RouterLink } from 'vue-router'
import Footer from '@/components/Footer.vue'
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

    <Footer />
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
