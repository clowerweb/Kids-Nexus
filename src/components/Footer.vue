<template>
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
</template>
