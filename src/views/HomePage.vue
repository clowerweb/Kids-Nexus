<script setup>
import { ref } from 'vue';
import { RouterLink } from 'vue-router';

// For illustration - these would be real testimonials in production
const testimonials = ref([
  {
    id: 1,
    name: 'Sarah Johnson',
    role: 'Parent of 2',
    image: 'https://randomuser.me/api/portraits/women/32.jpg',
    content: 'KidsNexus has transformed how my children learn. The personalized approach means they\'re always engaged and excited about learning new things!'
  },
  {
    id: 2,
    name: 'Michael Rodriguez',
    role: 'Elementary School Teacher',
    image: 'https://randomuser.me/api/portraits/men/54.jpg',
    content: 'As an educator, I\'m impressed by how the platform adapts to each child\'s learning style. It\'s like having a dedicated tutor for every student.'
  },
  {
    id: 3,
    name: 'Alex Chen',
    role: 'Parent of a 7-year-old',
    image: 'https://randomuser.me/api/portraits/women/68.jpg',
    content: 'My daughter struggled with reading, but after using KidsNexus, her confidence has soared. The AI detected her specific challenges and adjusted perfectly.'
  }
]);

// For illustration - these would be real features with real icons in production
const features = ref([
  {
    id: 1,
    title: 'Personalized Learning',
    description: 'AI-powered lessons adapt to your child\'s strengths, weaknesses, and learning style.',
    icon: '🧠'
  },
  {
    id: 2,
    title: 'Progress Tracking',
    description: 'Detailed insights into your child\'s development with areas of growth and achievement.',
    icon: '📈'
  },
  {
    id: 3,
    title: 'Multiple Subjects',
    description: 'Comprehensive coverage of reading, writing, math, science, history, and more.',
    icon: '📚'
  },
  {
    id: 4,
    title: 'Engaging Content',
    description: 'Interactive lessons with colorful visuals, games, and activities that make learning fun.',
    icon: '🎮'
  },
  {
    id: 5,
    title: 'Safe & Private',
    description: 'Child-friendly content with strong privacy protections for your peace of mind.',
    icon: '🔒'
  },
  {
    id: 6,
    title: 'Free & Open Source',
    description: 'Quality education accessible to all, with a transparent community-driven approach.',
    icon: '❤️'
  }
]);

// For FAQ section
const faqs = ref([
  {
    question: 'How does the AI personalization work?',
    answer: 'Our AI analyzes how your child interacts with lessons, identifying strengths, weaknesses, and learning preferences. It then customizes future content to optimize engagement and learning outcomes.'
  },
  {
    question: 'What age groups is KidsNexus suitable for?',
    answer: 'KidsNexus is designed for children ages 5-13, with content appropriately scaled for different developmental stages.'
  },
  {
    question: 'Is my child\'s data secure and private?',
    answer: 'Absolutely! We take data privacy seriously. All personal information is encrypted, never shared with third parties, and we comply with children\'s online privacy regulations.'
  },
  {
    question: 'How do I track my child\'s progress?',
    answer: 'Parents have access to a dashboard showing detailed progress reports, achievement milestones, areas needing improvement, and personalized recommendations.'
  }
]);

// Toggle for FAQ items
const toggleFaq = (faqId) => {
  faqs.value = faqs.value.map(faq =>
    faq.id === faqId ? { ...faq, isOpen: !faq.isOpen } : faq
  );
};
</script>

<template>
  <div>
    <!-- Hero Section -->
    <section class="py-12 md:py-20 px-4 sm:px-6 lg:px-8">
      <div class="max-w-7xl mx-auto">
        <div class="lg:grid lg:grid-cols-2 lg:gap-8 items-center">
          <div>
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-purple-600 via-indigo-600 to-blue-500">
              Learning Reimagined for Every Child
            </h1>
            <p class="mt-6 text-xl text-gray-600 max-w-3xl">
              KidsNexus uses AI to create personalized learning experiences that adapt to your child's unique needs,
              making education more engaging, effective, and fun.
            </p>
            <div class="mt-10 flex flex-col sm:flex-row gap-4">
              <RouterLink to="/signup" class="inline-flex items-center justify-center px-8 py-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                Get Started Free
              </RouterLink>
              <RouterLink to="/features" class="inline-flex items-center justify-center px-8 py-4 border border-gray-300 rounded-md shadow-sm text-base font-medium text-indigo-600 bg-white hover:bg-gray-50">
                See How It Works
              </RouterLink>
            </div>
          </div>
          <div class="mt-12 lg:mt-0 flex justify-center">
            <div class="relative w-full max-w-lg">
              <div class="absolute top-0 left-0 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
              <div class="absolute bottom-0 right-0 w-72 h-72 bg-indigo-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
              <div class="relative">
                <img
                  src="https://images.unsplash.com/photo-1516627145497-ae6968895b74?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80"
                  alt="Child learning on tablet"
                  class="rounded-lg shadow-xl"
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Trusted By Section (placeholder) -->
    <section class="bg-gray-50 py-8">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-center text-sm font-medium text-gray-500 uppercase tracking-wide">Trusted by educators and families worldwide</p>
        <div class="mt-6 grid grid-cols-2 gap-8 md:grid-cols-5">
          <div class="flex justify-center text-gray-400">
            <span class="text-4xl">🏫</span> <span class="ml-2 text-sm font-medium">School District</span>
          </div>
          <div class="flex justify-center text-gray-400">
            <span class="text-4xl">🎓</span> <span class="ml-2 text-sm font-medium">University Research</span>
          </div>
          <div class="flex justify-center text-gray-400">
            <span class="text-4xl">🏆</span> <span class="ml-2 text-sm font-medium">EdTech Award</span>
          </div>
          <div class="flex justify-center text-gray-400">
            <span class="text-4xl">👨‍👩‍👧‍👦</span> <span class="ml-2 text-sm font-medium">Family Choice</span>
          </div>
          <div class="flex justify-center text-gray-400">
            <span class="text-4xl">🌍</span> <span class="ml-2 text-sm font-medium">Global Reach</span>
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
          <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
            How KidsNexus Makes Learning Better
          </h2>
          <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500">
            Our AI-powered platform creates a unique learning experience tailored to each child.
          </p>
        </div>

        <div class="mt-12 grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
          <div v-for="feature in features" :key="feature.id" class="bg-gray-50 rounded-xl p-8 shadow-sm hover:shadow-md transition-shadow duration-300">
            <div class="text-4xl mb-4">{{ feature.icon }}</div>
            <h3 class="text-xl font-bold text-gray-900">{{ feature.title }}</h3>
            <p class="mt-2 text-gray-600">{{ feature.description }}</p>
          </div>
        </div>
      </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-16 bg-gradient-to-br from-indigo-50 to-blue-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
          <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
            How It Works
          </h2>
          <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500">
            Getting started with KidsNexus is simple
          </p>
        </div>

        <div class="mt-12 grid gap-8 grid-cols-1 md:grid-cols-3">
          <div class="flex flex-col items-center text-center">
            <div class="bg-indigo-100 rounded-full w-16 h-16 flex items-center justify-center text-indigo-600 mb-4">
              <span class="text-2xl font-bold">1</span>
            </div>
            <h3 class="text-xl font-bold">Create a Parent Account</h3>
            <p class="mt-2 text-gray-600">Sign up for a free account to manage your children's profiles and track their progress.</p>
          </div>

          <div class="flex flex-col items-center text-center">
            <div class="bg-indigo-100 rounded-full w-16 h-16 flex items-center justify-center text-indigo-600 mb-4">
              <span class="text-2xl font-bold">2</span>
            </div>
            <h3 class="text-xl font-bold">Add Your Child's Profile</h3>
            <p class="mt-2 text-gray-600">Create profiles for each of your children with their age, interests, and current learning level.</p>
          </div>

          <div class="flex flex-col items-center text-center">
            <div class="bg-indigo-100 rounded-full w-16 h-16 flex items-center justify-center text-indigo-600 mb-4">
              <span class="text-2xl font-bold">3</span>
            </div>
            <h3 class="text-xl font-bold">Let the Learning Begin!</h3>
            <p class="mt-2 text-gray-600">Watch as your child engages with personalized, adaptive lessons that grow with them.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
          <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
            What Families Are Saying
          </h2>
          <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500">
            Don't just take our word for it - hear from parents and educators using KidsNexus.
          </p>
        </div>

        <div class="mt-12 grid gap-8 grid-cols-1 md:grid-cols-3">
          <div v-for="testimonial in testimonials" :key="testimonial.id" class="bg-gray-50 rounded-xl p-8 shadow-sm">
            <div class="flex items-center mb-4">
              <img :src="testimonial.image" :alt="testimonial.name" class="w-12 h-12 rounded-full">
              <div class="ml-4">
                <h4 class="font-medium text-gray-900">{{ testimonial.name }}</h4>
                <p class="text-sm text-gray-500">{{ testimonial.role }}</p>
              </div>
            </div>
            <p class="text-gray-600 italic">"{{ testimonial.content }}"</p>
            <div class="mt-4 flex text-yellow-400">
              <span class="text-xl">⭐⭐⭐⭐⭐</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
          <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
            Frequently Asked Questions
          </h2>
        </div>

        <div class="mt-12 max-w-3xl mx-auto">
          <dl>
            <div v-for="(faq, index) in faqs" :key="index" class="mb-6 bg-white rounded-lg shadow-sm p-6">
              <dt class="text-lg font-medium text-gray-900">{{ faq.question }}</dt>
              <dd class="mt-2 text-gray-600">{{ faq.answer }}</dd>
            </div>
          </dl>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-indigo-600">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
          Ready to transform your child's learning experience?
        </h2>
        <p class="mt-4 max-w-2xl mx-auto text-xl text-indigo-100">
          Join thousands of families discovering the power of personalized education.
        </p>
        <div class="mt-8">
          <RouterLink to="/signup" class="inline-flex items-center justify-center px-8 py-4 border border-transparent rounded-md shadow-sm text-base font-medium text-indigo-600 bg-white hover:bg-gray-50">
            Get Started for Free
          </RouterLink>
        </div>
        <p class="mt-4 text-indigo-100">
          No credit card required. Always free and open source.
        </p>
      </div>
    </section>
  </div>
</template>

<style scoped lang="postcss">
/* Additional styling if needed */
</style>
