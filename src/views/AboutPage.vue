<script setup>
import { RouterLink } from 'vue-router';
</script>

<template>
  <div>
    <!-- Hero section -->
    <div class="bg-gradient-to-r from-purple-50 to-indigo-50 py-16 md:py-24">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
          <span class="block">About KidsNexus</span>
          <span class="block mt-2 text-indigo-600">Reimagining Education for Every Child</span>
        </h1>
        <p class="mt-6 max-w-2xl mx-auto text-xl text-gray-500">
          We're on a mission to make high-quality, personalized education accessible to children everywhere through the power of AI.
        </p>
      </div>
    </div>

    <!-- Mission section -->
    <div class="py-16">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-2 lg:gap-8 items-center">
          <div>
            <h2 class="text-3xl font-extrabold text-gray-900">Our Mission</h2>
            <p class="mt-4 text-lg text-gray-500">
              KidsNexus was born from a simple belief: every child deserves access to high-quality, personalized education that meets them exactly where they are.
            </p>
            <p class="mt-4 text-lg text-gray-500">
              We're building a free, open-source learning platform that uses artificial intelligence to adapt to each child's unique learning style, pace, and interests. By removing financial barriers and leveraging technology, we aim to democratize education and help every child reach their full potential.
            </p>
            <p class="mt-4 text-lg text-gray-500">
              Our adaptive learning system identifies areas where children need more support and provides targeted lessons to help them overcome challenges, while also recognizing strengths and providing opportunities for growth and exploration.
            </p>
          </div>
          <div class="mt-10 lg:mt-0">
            <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
              <img
                src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1422&q=80"
                alt="Kids learning together"
                class="w-full h-full object-center object-cover"
              >
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Values section -->
    <div class="bg-gray-50 py-16">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
          <h2 class="text-3xl font-extrabold text-gray-900">Our Core Values</h2>
          <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500">
            These principles guide everything we do at KidsNexus
          </p>
        </div>

        <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
          <div class="bg-white rounded-lg shadow-sm p-8">
            <h3 class="text-xl font-bold text-gray-900 flex items-center">
              <span class="text-4xl mr-4">🌱</span>
              Equity in Education
            </h3>
            <p class="mt-2 text-gray-600">
              We believe that every child, regardless of background or circumstance, deserves access to high-quality learning resources tailored to their needs.
            </p>
          </div>

          <div class="bg-white rounded-lg shadow-sm p-8">
            <h3 class="text-xl font-bold text-gray-900 flex items-center">
              <span class="text-4xl mr-4">🔍</span>
              Child-Centered Learning
            </h3>
            <p class="mt-2 text-gray-600">
              We put children at the center of everything we build, adapting to their unique learning styles, interests, and developmental needs.
            </p>
          </div>

          <div class="bg-white rounded-lg shadow-sm p-8">
            <h3 class="text-xl font-bold text-gray-900 flex items-center">
              <span class="text-4xl mr-4">🔒</span>
              Privacy & Safety
            </h3>
            <p class="mt-2 text-gray-600">
              We maintain the highest standards of data privacy and content safety, ensuring a secure environment for children to learn and grow.
            </p>
          </div>

          <div class="bg-white rounded-lg shadow-sm p-8">
            <h3 class="text-xl font-bold text-gray-900 flex items-center">
              <span class="text-4xl mr-4">🔄</span>
              Continuous Improvement
            </h3>
            <p class="mt-2 text-gray-600">
              We constantly refine our platform based on educational research, user feedback, and advances in AI to provide the best possible learning experience.
            </p>
          </div>

          <div class="bg-white rounded-lg shadow-sm p-8">
            <h3 class="text-xl font-bold text-gray-900 flex items-center">
              <span class="text-4xl mr-4">🌐</span>
              Open Source & Transparent
            </h3>
            <p class="mt-2 text-gray-600">
              We believe in the power of community and transparency. Our open-source approach enables collaboration and ensures accountability.
            </p>
          </div>

          <div class="bg-white rounded-lg shadow-sm p-8">
            <h3 class="text-xl font-bold text-gray-900 flex items-center">
              <span class="text-4xl mr-4">🤝</span>
              Parent Partnership
            </h3>
            <p class="mt-2 text-gray-600">
              We empower parents with insights and tools to support their child's learning journey, fostering a collaborative educational environment.
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Team section -->
    <div class="py-16">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
          <h2 class="text-3xl font-extrabold text-gray-900">Our Team</h2>
          <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500">
            KidsNexus is built by a passionate team of educators, technologists, and parents who believe in the transformative power of education.
          </p>
        </div>

        <div class="mt-16 grid gap-8 md:grid-cols-3">
          <div class="text-center">
            <div class="mx-auto h-40 w-40 rounded-full overflow-hidden">
              <img
                src="https://randomuser.me/api/portraits/women/42.jpg"
                alt="Team member"
                class="w-full h-full object-center object-cover"
              >
            </div>
            <h3 class="mt-6 text-lg font-medium text-gray-900">Dr. Emily Chen</h3>
            <p class="text-indigo-600">Education Director</p>
            <p class="mt-2 text-gray-500">Former elementary school teacher with a PhD in Educational Technology</p>
          </div>

          <div class="text-center">
            <div class="mx-auto h-40 w-40 rounded-full overflow-hidden">
              <img
                src="https://randomuser.me/api/portraits/men/32.jpg"
                alt="Team member"
                class="w-full h-full object-center object-cover"
              >
            </div>
            <h3 class="mt-6 text-lg font-medium text-gray-900">James Wilson</h3>
            <p class="text-indigo-600">AI Research Lead</p>
            <p class="mt-2 text-gray-500">Specializes in adaptive learning algorithms and natural language processing</p>
          </div>

          <div class="text-center">
            <div class="mx-auto h-40 w-40 rounded-full overflow-hidden">
              <img
                src="https://randomuser.me/api/portraits/women/65.jpg"
                alt="Team member"
                class="w-full h-full object-center object-cover"
              >
            </div>
            <h3 class="mt-6 text-lg font-medium text-gray-900">Maria Rodriguez</h3>
            <p class="text-indigo-600">UX/UI Designer</p>
            <p class="mt-2 text-gray-500">Expert in creating engaging, accessible interfaces for children</p>
          </div>
        </div>

        <div class="mt-16 text-center">
          <p class="text-lg text-gray-600">
            Alongside our core team, we're supported by a community of volunteers, contributors, and advisors who share our vision for accessible, personalized education.
          </p>
          <div class="mt-8">
            <RouterLink to="/join-team" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
              Join Our Team
            </RouterLink>
          </div>
        </div>
      </div>
    </div>

    <!-- Get involved section -->
    <div class="bg-indigo-700 py-16">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-extrabold text-white">Get Involved</h2>
        <p class="mt-4 max-w-2xl mx-auto text-xl text-indigo-100">
          KidsNexus is a community-driven project. There are many ways to contribute to our mission.
        </p>

        <div class="mt-12 grid gap-8 md:grid-cols-3">
          <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="text-4xl mb-4">💻</div>
            <h3 class="text-xl font-bold text-gray-900">Contribute Code</h3>
            <p class="mt-2 text-gray-600">
              Help us build and improve the platform. We welcome developers of all skill levels.
            </p>
            <a href="https://github.com/kidsnexus/platform" class="mt-4 inline-block text-indigo-600 hover:text-indigo-800">View GitHub →</a>
          </div>

          <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="text-4xl mb-4">📚</div>
            <h3 class="text-xl font-bold text-gray-900">Create Content</h3>
            <p class="mt-2 text-gray-600">
              Develop learning materials, exercises, and educational content for the platform.
            </p>
            <a href="#" class="mt-4 inline-block text-indigo-600 hover:text-indigo-800">Learn More →</a>
          </div>

          <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="text-4xl mb-4">🤗</div>
            <h3 class="text-xl font-bold text-gray-900">Spread the Word</h3>
            <p class="mt-2 text-gray-600">
              Help more children access KidsNexus by sharing our mission with your community.
            </p>
            <a href="#" class="mt-4 inline-block text-indigo-600 hover:text-indigo-800">Share Now →</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Contact section -->
    <div class="py-16">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
          <h2 class="text-3xl font-extrabold text-gray-900">Contact Us</h2>
          <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500">
            Have questions, feedback, or want to learn more about KidsNexus?
          </p>
        </div>

        <div class="mt-12 max-w-lg mx-auto">
          <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-8">
            <div class="text-center">
              <h3 class="text-lg font-medium text-gray-900">Email Us</h3>
              <p class="mt-2 text-gray-500">
                <a href="mailto:info@kidsnexus.org" class="text-indigo-600 hover:text-indigo-800">info@kidsnexus.org</a>
              </p>
            </div>

            <div class="text-center">
              <h3 class="text-lg font-medium text-gray-900">Follow Us</h3>
              <div class="mt-2 flex justify-center space-x-6">
                <a href="#" class="text-gray-400 hover:text-gray-500">
                  <span class="sr-only">Twitter</span>
                  <span class="text-2xl">🐦</span>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-500">
                  <span class="sr-only">GitHub</span>
                  <span class="text-2xl">🐙</span>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-500">
                  <span class="sr-only">LinkedIn</span>
                  <span class="text-2xl">🔗</span>
                </a>
              </div>
            </div>
          </div>

          <div class="mt-12 text-center">
            <RouterLink to="/contact" class="inline-flex items-center px-6 py-3 border border-gray-300 shadow-sm text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
              Send Us a Message
            </RouterLink>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped lang="postcss">
/* Additional styling if needed */
</style>
