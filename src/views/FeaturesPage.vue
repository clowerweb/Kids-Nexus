<script setup>
import { ref } from 'vue';
import { RouterLink } from 'vue-router';

// Define feature categories
const featureCategories = ref([
  {
    id: 'personalization',
    name: 'AI Personalization',
    icon: '🧠',
    description: 'Our adaptive AI tailors learning experiences to each child\'s unique needs.',
    features: [
      'Personalized learning path based on individual strengths and weaknesses',
      'Adaptive difficulty levels that adjust in real-time',
      'Content recommendations matched to learning style and interests',
      'Specialized support for different learning approaches and needs',
      'Continuous adaptation as your child grows and develops'
    ],
    image: 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80'
  },
  {
    id: 'subjects',
    name: 'Comprehensive Subjects',
    icon: '📚',
    description: 'Explore a wide range of subjects with curriculum-aligned content.',
    features: [
      'Reading and literacy with phonics, comprehension, and storytelling',
      'Mathematics from counting to advanced problem-solving',
      'Science exploration with interactive experiments and explanations',
      'Social studies and history with engaging narratives',
      'Creative writing and language arts skills'
    ],
    image: 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1422&q=80'
  },
  {
    id: 'tracking',
    name: 'Progress Tracking',
    icon: '📈',
    description: 'Detailed insights into your child\'s learning journey.',
    features: [
      'Comprehensive dashboard showing progress across all subjects',
      'Identification of strengths and areas needing improvement',
      'Milestone tracking and celebration of achievements',
      'Weekly progress reports sent to parents',
      'Long-term growth visualization to see development over time'
    ],
    image: 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80'
  },
  {
    id: 'engagement',
    name: 'Engaging Content',
    icon: '🎮',
    description: 'Learning experiences that captivate and motivate children.',
    features: [
      'Interactive lessons with colorful visuals and animations',
      'Gamified elements that make learning fun and rewarding',
      'Educational games that reinforce concepts while entertaining',
      'Storytelling approach to complex topics',
      'Age-appropriate challenges and rewards'
    ],
    image: 'https://images.unsplash.com/photo-1535572290543-960a8046f5af?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80'
  },
  {
    id: 'safety',
    name: 'Safety & Privacy',
    icon: '🔒',
    description: 'A secure environment designed with children\'s safety in mind.',
    features: [
      'COPPA-compliant platform with robust privacy protections',
      'No advertisements or data selling',
      'Parent-controlled access and settings',
      'Age-appropriate content moderation',
      'Transparent data practices and regular security audits'
    ],
    image: 'https://images.unsplash.com/photo-1563453392212-326f5e854473?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80'
  },
  {
    id: 'accessibility',
    name: 'Accessibility',
    icon: '♿',
    description: 'Designed to be inclusive and accessible to all children.',
    features: [
      'Support for screen readers and assistive technologies',
      'Adjustable text sizes and high-contrast modes',
      'Multiple input methods for different abilities',
      'Translations and support for multiple languages',
      'Offline mode for areas with limited internet access'
    ],
    image: 'https://images.unsplash.com/photo-1526378722484-bd91ca387e72?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1734&q=80'
  }
]);

// Selected feature category for mobile view
const selectedCategory = ref(featureCategories.value[0].id);

// Set selected category
const setSelectedCategory = (categoryId) => {
  selectedCategory.value = categoryId;
};

// Get selected category
const getSelectedCategory = () => {
  return featureCategories.value.find(category => category.id === selectedCategory.value);
};
</script>

<template>
  <div>
    <!-- Hero section -->
    <div class="bg-gradient-to-r from-indigo-50 to-blue-50 py-16 md:py-24">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
          <span class="block">Powerful Features</span>
          <span class="block mt-2 text-indigo-600">For Exceptional Learning</span>
        </h1>
        <p class="mt-6 max-w-2xl mx-auto text-xl text-gray-500">
          Discover how KidsNexus uses advanced technology to create personalized, engaging, and effective learning experiences for every child.
        </p>
      </div>
    </div>

    <!-- Features overview section -->
    <div class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-3xl font-extrabold text-gray-900">What Makes KidsNexus Special</h2>
          <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500">
            Our platform combines cutting-edge AI with educational expertise to deliver a truly unique learning experience.
          </p>
        </div>

        <!-- Feature categories - Desktop -->
        <div class="hidden lg:block">
          <div class="grid grid-cols-1 gap-y-16">
            <div v-for="(category, index) in featureCategories" :key="category.id"
                 class="grid grid-cols-12 gap-8 items-center">

              <!-- Image section - conditionally positioned -->
              <div :class="[
                index % 2 === 0 ? 'order-first' : 'order-last',
                'col-span-7 flex items-center'
              ]">
                <div class="relative w-full">
                  <img :src="category.image" :alt="category.name" class="rounded-xl shadow-lg object-cover w-full aspect-video">
                  <div class="absolute -top-4 -left-4 bg-indigo-100 rounded-full w-16 h-16 flex items-center justify-center text-3xl">
                    {{ category.icon }}
                  </div>
                </div>
              </div>

              <!-- Text section - conditionally positioned -->
              <div :class="[
                index % 2 === 0 ? 'order-last' : 'order-first',
                'col-span-5 self-center'
              ]">
                <h3 class="text-2xl font-bold text-gray-900">{{ category.name }}</h3>
                <p class="mt-3 text-lg text-gray-500">{{ category.description }}</p>
                <ul class="mt-6 space-y-3">
                  <li v-for="feature in category.features" :key="feature" class="flex items-start">
                    <span class="flex-shrink-0 text-indigo-500">✓</span>
                    <span class="ml-3 text-gray-700">{{ feature }}</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Feature categories - Mobile -->
        <div class="lg:hidden">
          <div class="flex overflow-x-auto pb-4 mb-8 space-x-4">
            <button
              v-for="category in featureCategories"
              :key="category.id"
              @click="setSelectedCategory(category.id)"
              class="flex-shrink-0 px-5 py-2.5 rounded-full text-sm font-medium whitespace-nowrap"
              :class="selectedCategory === category.id ?
                'bg-indigo-600 text-white' :
                'bg-gray-100 text-gray-700 hover:bg-gray-200'"
            >
              <span class="mr-2">{{ category.icon }}</span>
              {{ category.name }}
            </button>
          </div>

          <div>
            <div v-if="getSelectedCategory()" class="space-y-8">
              <img :src="getSelectedCategory().image" :alt="getSelectedCategory().name" class="rounded-xl shadow-lg w-full aspect-video object-cover">

              <div>
                <h3 class="text-2xl font-bold text-gray-900">{{ getSelectedCategory().name }}</h3>
                <p class="mt-2 text-lg text-gray-500">{{ getSelectedCategory().description }}</p>
              </div>

              <ul class="space-y-3">
                <li v-for="feature in getSelectedCategory().features" :key="feature" class="flex items-start">
                  <span class="flex-shrink-0 text-indigo-500">✓</span>
                  <span class="ml-3 text-gray-700">{{ feature }}</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Comparison section -->
    <div class="py-16 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-3xl font-extrabold text-gray-900">How We Compare</h2>
          <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500">
            See why KidsNexus stands apart from traditional learning platforms
          </p>
        </div>

        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead>
              <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Feature</th>
                <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Traditional Learning Apps</th>
                <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-indigo-600">KidsNexus</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
              <tr>
                <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">Personalization</td>
                <td class="px-3 py-4 text-sm text-center text-gray-500">Basic age-based content</td>
                <td class="px-3 py-4 text-sm text-center text-indigo-600 font-medium">Advanced AI personalization to individual needs</td>
              </tr>
              <tr>
                <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">Progress Tracking</td>
                <td class="px-3 py-4 text-sm text-center text-gray-500">Simple completion metrics</td>
                <td class="px-3 py-4 text-sm text-center text-indigo-600 font-medium">Detailed insights with actionable recommendations</td>
              </tr>
              <tr>
                <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">Adaptive Learning</td>
                <td class="px-3 py-4 text-sm text-center text-gray-500">Limited or none</td>
                <td class="px-3 py-4 text-sm text-center text-indigo-600 font-medium">Real-time adaptation based on performance</td>
              </tr>
              <tr>
                <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">Subject Integration</td>
                <td class="px-3 py-4 text-sm text-center text-gray-500">Separate, siloed subjects</td>
                <td class="px-3 py-4 text-sm text-center text-indigo-600 font-medium">Cross-disciplinary connections between subjects</td>
              </tr>
              <tr>
                <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">Parent Involvement</td>
                <td class="px-3 py-4 text-sm text-center text-gray-500">Limited visibility</td>
                <td class="px-3 py-4 text-sm text-center text-indigo-600 font-medium">Comprehensive dashboard and actionable insights</td>
              </tr>
              <tr>
                <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">Cost</td>
                <td class="px-3 py-4 text-sm text-center text-gray-500">Often subscription-based</td>
                <td class="px-3 py-4 text-sm text-center text-indigo-600 font-medium">Always free and open-source</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Testimonials section -->
    <div class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-3xl font-extrabold text-gray-900">What Parents & Educators Say</h2>
          <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500">
            Hear from families and teachers experiencing the impact of KidsNexus
          </p>
        </div>

        <div class="grid gap-8 lg:grid-cols-3">
          <div class="bg-gray-50 rounded-xl p-8 shadow-sm">
            <div class="flex items-center mb-6">
              <img src="https://randomuser.me/api/portraits/women/43.jpg" alt="Parent testimonial" class="h-12 w-12 rounded-full">
              <div class="ml-4">
                <h3 class="text-lg font-medium text-gray-900">Jennifer K.</h3>
                <p class="text-indigo-600">Parent of a 6-year-old</p>
              </div>
            </div>
            <p class="text-gray-600 italic">"The personalization is remarkable. My daughter struggled with reading, but KidsNexus identified her specific challenges and adapted the lessons. Within weeks, she was reading more confidently and actually enjoying it!"</p>
          </div>

          <div class="bg-gray-50 rounded-xl p-8 shadow-sm">
            <div class="flex items-center mb-6">
              <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Teacher testimonial" class="h-12 w-12 rounded-full">
              <div class="ml-4">
                <h3 class="text-lg font-medium text-gray-900">Robert T.</h3>
                <p class="text-indigo-600">Elementary School Teacher</p>
              </div>
            </div>
            <p class="text-gray-600 italic">"I recommend KidsNexus to all the parents in my class. It reinforces what we learn in school but adapts to each child's pace. The progress reports help me understand where students might need extra support in the classroom."</p>
          </div>

          <div class="bg-gray-50 rounded-xl p-8 shadow-sm">
            <div class="flex items-center mb-6">
              <img src="https://randomuser.me/api/portraits/women/76.jpg" alt="Parent testimonial" class="h-12 w-12 rounded-full">
              <div class="ml-4">
                <h3 class="text-lg font-medium text-gray-900">Sophia M.</h3>
                <p class="text-indigo-600">Parent of 8 and 10-year-olds</p>
              </div>
            </div>
            <p class="text-gray-600 italic">"My children have very different learning styles and interests. KidsNexus is the first platform that has engaged them both equally. The AI really does adapt to their individual needs, and the parent dashboard gives me great insights into their progress."</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Try it now section -->
    <div class="bg-indigo-700 py-16">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
          Ready to transform your child's learning experience?
        </h2>
        <p class="mt-6 max-w-2xl mx-auto text-xl text-indigo-100">
          KidsNexus is completely free, with no hidden fees or premium features. Start your child's personalized learning journey today.
        </p>
        <div class="mt-12">
          <RouterLink to="/signup" class="inline-flex items-center justify-center px-8 py-4 border border-transparent rounded-md shadow-sm text-xl font-medium text-indigo-600 bg-white hover:bg-gray-50">
            Get Started Now
          </RouterLink>
          <p class="mt-4 text-indigo-200">No credit card required</p>
        </div>
      </div>
    </div>

    <!-- FAQ section -->
    <div class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-3xl font-extrabold text-gray-900">Frequently Asked Questions</h2>
          <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500">
            Common questions about KidsNexus features
          </p>
        </div>

        <div class="max-w-3xl mx-auto divide-y-2 divide-gray-200">
          <div class="py-6">
            <h3 class="text-lg font-medium text-gray-900">How does the AI personalization actually work?</h3>
            <div class="mt-2">
              <p class="text-gray-500">Our AI analyzes how your child interacts with lessons—what they find challenging, what comes easily, and how they engage with different types of content. It then creates a personalized learning path that adapts in real-time, adjusting difficulty, providing additional practice where needed, and presenting content in ways that match your child's learning style.</p>
            </div>
          </div>

          <div class="py-6">
            <h3 class="text-lg font-medium text-gray-900">What age groups is KidsNexus suitable for?</h3>
            <div class="mt-2">
              <p class="text-gray-500">KidsNexus is designed for children ages 5-13, with content appropriately scaled for different developmental stages. The AI personalization ensures that learning material is always at the right level for your child, regardless of their grade level.</p>
            </div>
          </div>

          <div class="py-6">
            <h3 class="text-lg font-medium text-gray-900">Can I use KidsNexus alongside school curriculum?</h3>
            <div class="mt-2">
              <p class="text-gray-500">Absolutely! KidsNexus is designed to complement school learning. Our content aligns with common educational standards, and the adaptive nature helps reinforce classroom learning while addressing any gaps. Many teachers recommend KidsNexus as a supplemental resource.</p>
            </div>
          </div>

          <div class="py-6">
            <h3 class="text-lg font-medium text-gray-900">How much parent involvement is required?</h3>
            <div class="mt-2">
              <p class="text-gray-500">KidsNexus is designed to be used independently by children, with an intuitive interface and age-appropriate content. Parents can be as involved as they choose—from simply reviewing progress reports to actively participating in learning activities. The parent dashboard gives you visibility and insights without requiring constant supervision.</p>
            </div>
          </div>

          <div class="py-6">
            <h3 class="text-lg font-medium text-gray-900">Is my child's data secure and private?</h3>
            <div class="mt-2">
              <p class="text-gray-500">Absolutely. We take data privacy seriously, especially when it comes to children. All personal information is encrypted, never shared with third parties, and we comply with children's online privacy regulations. As an open-source platform, our privacy practices are transparent and available for review.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped lang="postcss">
/* Additional styling if needed */
</style>
