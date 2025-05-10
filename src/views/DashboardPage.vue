<script setup>
import { ref, onMounted, computed } from 'vue';
import { RouterLink } from 'vue-router';

// User state management - in a real app, this would use Pinia
const user = ref(null);
const isLoading = ref(true);
const activeChild = ref(null);

// Sample learning metrics - in a real app, these would come from an API
const learningMetrics = ref([
  { subject: 'Reading', progress: 68, recentActivity: '2 hours ago', nextLesson: 'Comprehension: Main Ideas' },
  { subject: 'Math', progress: 75, recentActivity: 'Yesterday', nextLesson: 'Fractions: Adding with Different Denominators' },
  { subject: 'Science', progress: 42, recentActivity: '3 days ago', nextLesson: 'The Water Cycle' },
  { subject: 'Writing', progress: 55, recentActivity: 'Yesterday', nextLesson: 'Paragraph Structure' },
  { subject: 'History', progress: 30, recentActivity: 'Last week', nextLesson: 'Ancient Civilizations: Egypt' }
]);

// Sample recent achievements - in a real app, these would come from an API
const recentAchievements = ref([
  { id: 1, title: 'Reading Streak', description: 'Completed 5 days of reading lessons in a row', icon: '📚', date: '2 days ago' },
  { id: 2, title: 'Math Master', description: 'Solved 10 complex math problems correctly', icon: '🔢', date: '3 days ago' },
  { id: 3, title: 'Science Explorer', description: 'Completed the "Plants and Photosynthesis" module', icon: '🔬', date: 'Last week' }
]);

// Sample recommended activities - in a real app, these would be AI-generated
const recommendedActivities = ref([
  { id: 1, title: 'Reading Fluency Exercises', description: 'Practice reading out loud with these fun stories', time: '15 min', icon: '📖' },
  { id: 2, title: 'Math Challenge: Fractions', description: 'Interactive games to strengthen fraction skills', time: '20 min', icon: '➗' },
  { id: 3, title: 'Writing: Create a Story', description: 'Use the AI story builder to create your own adventure', time: '30 min', icon: '✏️' }
]);

// Sample weekly schedule - in a real app, this would be customizable
const weeklySchedule = ref([
  { day: 'Monday', subjects: ['Reading', 'Math'], totalTime: '45 min' },
  { day: 'Tuesday', subjects: ['Science', 'Writing'], totalTime: '50 min' },
  { day: 'Wednesday', subjects: ['Math', 'History'], totalTime: '45 min' },
  { day: 'Thursday', subjects: ['Reading', 'Science'], totalTime: '50 min' },
  { day: 'Friday', subjects: ['Writing', 'Math'], totalTime: '45 min' },
  { day: 'Saturday', subjects: ['Free Choice'], totalTime: '30 min' },
  { day: 'Sunday', subjects: ['Rest Day'], totalTime: '0 min' }
]);

onMounted(() => {
  // Simulate loading user data
  setTimeout(() => {
    // In a real app, this would be from a state management store or API
    const userData = localStorage.getItem('user');

    if (userData) {
      user.value = JSON.parse(userData);

      // Set the first child as active by default
      if (user.value.children && user.value.children.length > 0) {
        activeChild.value = user.value.children[0];
      }
    }

    isLoading.value = false;
  }, 800);
});

// Set active child
const setActiveChild = (child) => {
  activeChild.value = child;
};

// Calculate overall progress
const overallProgress = computed(() => {
  if (!learningMetrics.value.length) return 0;

  const total = learningMetrics.value.reduce((sum, metric) => sum + metric.progress, 0);
  return Math.round(total / learningMetrics.value.length);
});

// Get color based on progress
const getProgressColor = (progress) => {
  if (progress < 30) return 'bg-red-500';
  if (progress < 70) return 'bg-yellow-500';
  return 'bg-green-500';
};

// Format the current date
const currentDate = new Date().toLocaleDateString('en-US', {
  weekday: 'long',
  year: 'numeric',
  month: 'long',
  day: 'numeric'
});
</script>

<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Loading state -->
    <div v-if="isLoading" class="flex justify-center items-center min-h-screen">
      <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-indigo-500"></div>
    </div>

    <!-- No user logged in -->
    <div v-else-if="!user" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center">
      <h1 class="text-3xl font-bold text-gray-900">Please log in to view your dashboard</h1>
      <div class="mt-8">
        <RouterLink to="/login" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
          Log in
        </RouterLink>
      </div>
    </div>

    <!-- Dashboard content -->
    <div v-else class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <!-- Header section -->
      <div class="mb-8">
        <div class="md:flex md:items-center md:justify-between">
          <div class="flex-1 min-w-0">
            <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
              Welcome back, {{ user.name }}!
            </h1>
            <p class="mt-1 text-gray-500">{{ currentDate }}</p>
          </div>
          <div class="mt-4 flex md:mt-0 md:ml-4">
            <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              <span class="mr-2">📊</span> Generate Report
            </button>
            <button type="button" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              <span class="mr-2">✏️</span> Edit Settings
            </button>
          </div>
        </div>
      </div>

      <!-- Child selector tabs -->
      <div v-if="user.children && user.children.length > 0" class="border-b border-gray-200 mb-8">
        <div class="flex space-x-8">
          <button
            v-for="child in user.children"
            :key="child.id"
            @click="setActiveChild(child)"
            class="px-3 py-2 text-sm font-medium border-b-2 -mb-px whitespace-nowrap"
            :class="activeChild.id === child.id
              ? 'border-indigo-500 text-indigo-600'
              : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
          >
            {{ child.name }}'s Learning
          </button>
        </div>
      </div>

      <div v-if="activeChild" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main content: Left column -->
        <div class="lg:col-span-2 space-y-8">
          <!-- Overall progress -->
          <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-medium text-gray-900 mb-4">{{ activeChild.name }}'s Learning Progress</h2>
            <div class="flex items-center">
              <div class="relative w-20 h-20 mr-4">
                <svg class="w-20 h-20 transform -rotate-90" viewBox="0 0 100 100">
                  <circle
                    class="text-gray-200"
                    cx="50"
                    cy="50"
                    r="45"
                    stroke="currentColor"
                    stroke-width="10"
                    fill="none"
                  />
                  <circle
                    class="text-indigo-600"
                    cx="50"
                    cy="50"
                    r="45"
                    stroke="currentColor"
                    stroke-width="10"
                    fill="none"
                    :stroke-dasharray="`${2 * Math.PI * 45}`"
                    :stroke-dashoffset="`${2 * Math.PI * 45 * (1 - overallProgress / 100)}`"
                  />
                </svg>
                <div class="absolute inset-0 flex items-center justify-center">
                  <span class="text-xl font-semibold text-gray-800">{{ overallProgress }}%</span>
                </div>
              </div>
              <div>
                <p class="text-sm text-gray-500">Overall Learning Progress</p>
                <p class="text-sm mt-1">
                  <span v-if="overallProgress >= 70" class="text-green-600">Excellent progress! Keep up the great work.</span>
                  <span v-else-if="overallProgress >= 40" class="text-yellow-600">Good progress. Regular practice will help improve!</span>
                  <span v-else class="text-red-600">Just getting started. Consistent practice is key!</span>
                </p>
              </div>
            </div>

            <!-- Subject-specific progress -->
            <div class="mt-6 space-y-4">
              <div v-for="(metric, index) in learningMetrics" :key="index" class="flex flex-col">
                <div class="flex justify-between items-center mb-1">
                  <span class="text-sm font-medium text-gray-700">{{ metric.subject }}</span>
                  <span class="text-sm text-gray-500">{{ metric.progress }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                  <div class="h-2 rounded-full" :class="getProgressColor(metric.progress)" :style="`width: ${metric.progress}%`"></div>
                </div>
                <div class="flex justify-between text-xs text-gray-500 mt-1">
                  <span>Last activity: {{ metric.recentActivity }}</span>
                  <span>Next: {{ metric.nextLesson }}</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Recommended activities -->
          <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-medium text-gray-900 mb-4">Recommended Today</h2>
            <div class="space-y-4">
              <div class="flex items-start p-3 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
                <div class="flex-shrink-0 bg-indigo-100 rounded-full w-10 h-10 flex items-center justify-center text-indigo-600 mr-4">
                  🔢
                </div>
                <div class="flex-grow">
                  <h3 class="font-medium text-gray-900">Addition for Beginners</h3>
                  <p class="text-sm text-gray-500">Learn the basics of adding numbers from 1-10</p>
                  <div class="mt-2">
                    <RouterLink 
                      :to="{ name: 'lesson', params: { id: 'math-addition-1' }}" 
                      class="text-indigo-600 text-sm font-medium hover:text-indigo-800"
                    >
                      Start Lesson →
                    </RouterLink>
                  </div>
                </div>
              </div>

              <div class="flex items-start p-3 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
                <div class="flex-shrink-0 bg-green-100 rounded-full w-10 h-10 flex items-center justify-center text-green-600 mr-4">
                  🔤
                </div>
                <div class="flex-grow">
                  <h3 class="font-medium text-gray-900">Spelling: Animals</h3>
                  <p class="text-sm text-gray-500">Practice spelling common animal names</p>
                  <div class="mt-2">
                    <button class="text-gray-400 text-sm hover:text-gray-500 cursor-not-allowed">
                      Coming Soon
                    </button>
                  </div>
                </div>
              </div>
              
              <button 
                class="text-indigo-600 hover:text-indigo-800 w-full text-center text-sm font-medium mt-2"
              >
                View All Lessons
              </button>
            </div>
          </div>

          <!-- Recent achievements -->
          <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-medium text-gray-900 mb-4">Recent Achievements</h2>
            <ul class="space-y-4">
              <li v-for="achievement in recentAchievements" :key="achievement.id" class="flex items-start">
                <div class="flex-shrink-0 text-2xl pt-0.5">{{ achievement.icon }}</div>
                <div class="ml-3">
                  <p class="text-base font-medium text-gray-900">{{ achievement.title }}</p>
                  <p class="text-sm text-gray-500">{{ achievement.description }}</p>
                  <p class="text-xs text-gray-400 mt-1">{{ achievement.date }}</p>
                </div>
              </li>
            </ul>
            <div class="mt-6 text-center">
              <button class="text-sm font-medium text-indigo-600 hover:text-indigo-800">
                View all achievements →
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar: Right column -->
        <div class="space-y-8">
          <!-- Weekly schedule -->
          <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-medium text-gray-900 mb-4">Weekly Learning Schedule</h2>
            <div class="space-y-3">
              <div v-for="(day, index) in weeklySchedule" :key="index" class="flex justify-between py-2 border-b border-gray-100 last:border-b-0">
                <div class="font-medium text-gray-900 w-24">{{ day.day }}</div>
                <div class="flex-1 text-sm text-gray-500">
                  {{ day.subjects.join(', ') }}
                </div>
                <div class="text-sm text-gray-600">{{ day.totalTime }}</div>
              </div>
            </div>
            <div class="mt-4 text-center">
              <button class="text-sm font-medium text-indigo-600 hover:text-indigo-800">
                Customize schedule
              </button>
            </div>
          </div>

          <!-- AI Insights -->
          <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-medium text-gray-900 mb-4">AI Learning Insights</h2>
            <div class="space-y-3 text-sm text-gray-600">
              <p>
                <span class="font-medium text-indigo-600">Strength: </span>
                {{ activeChild.name }} shows excellent pattern recognition in math problems.
              </p>
              <p>
                <span class="font-medium text-yellow-600">Area for Growth: </span>
                Reading comprehension could improve with more practice in identifying main ideas.
              </p>
              <p>
                <span class="font-medium text-green-600">Learning Style: </span>
                Highly visual learner who benefits from diagrams and illustrations.
              </p>
            </div>
            <div class="mt-6 p-4 bg-indigo-50 rounded-lg">
              <h3 class="font-medium text-indigo-800 text-sm">Personalized Recommendation</h3>
              <p class="mt-1 text-sm text-indigo-700">
                Try our new "Visual Math Stories" module to combine reading comprehension with math skills in an engaging format.
              </p>
            </div>
          </div>

          <!-- Parent Controls -->
          <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-medium text-gray-900 mb-4">Parent Controls</h2>
            <ul class="space-y-2">
              <li>
                <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800 flex items-center">
                  <span class="mr-2">📝</span> Edit {{ activeChild.name }}'s profile
                </a>
              </li>
              <li>
                <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800 flex items-center">
                  <span class="mr-2">⏱️</span> Manage screen time settings
                </a>
              </li>
              <li>
                <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800 flex items-center">
                  <span class="mr-2">📊</span> View detailed progress reports
                </a>
              </li>
              <li>
                <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800 flex items-center">
                  <span class="mr-2">📧</span> Set up weekly email summaries
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped lang="postcss">
/* Additional styling if needed */
</style>
