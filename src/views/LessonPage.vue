<script setup>
import { ref, computed, onMounted } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();

// Lesson data (would come from API in production)
const lesson = ref({
  id: 'math-addition-1',
  title: 'Addition for Beginners',
  subject: 'Math',
  grade: '1st Grade',
  duration: '15 minutes',
  description: 'Learn the basics of adding numbers from 1-10.',
  objectives: [
    'Understand the concept of addition',
    'Practice adding single-digit numbers',
    'Recognize patterns in addition'
  ]
});

// Current step in the lesson
const currentStep = ref(0);
const totalSteps = 7;

// User progress and answers
const userAnswers = ref([]);
const correctAnswers = ref(0);
const showFeedback = ref(false);
const feedbackMessage = ref('');
const feedbackType = ref(''); // 'success', 'error', or 'hint'
const attemptsOnCurrentQuestion = ref(0);

// Sample problems for addition practice
const problems = [
  { question: '3 + 2 = ?', options: ['4', '5', '6'], answer: '5' },
  { question: '4 + 3 = ?', options: ['6', '7', '8'], answer: '7' },
  { question: '2 + 2 = ?', options: ['3', '4', '5'], answer: '4' },
  { question: '5 + 5 = ?', options: ['9', '10', '11'], answer: '10' },
  { question: '1 + 6 = ?', options: ['6', '7', '8'], answer: '7' }
];

// Congratulatory messages for correct answers
const congratsMessages = [
  'Great job!',
  'Excellent work!',
  'You got it!',
  'Amazing!',
  'Fantastic!',
  'Well done!',
  'Brilliant!'
];

// Current problem based on step
const currentProblem = computed(() => {
  // Only show problems after introduction (step 1)
  if (currentStep.value >= 2 && currentStep.value <= 6) {
    return problems[currentStep.value - 2];
  }
  return null;
});

// Move to next step
const nextStep = () => {
  showFeedback.value = false;
  currentStep.value++;
  attemptsOnCurrentQuestion.value = 0;
};

// Move to previous step
const prevStep = () => {
  if (currentStep.value > 0) {
    showFeedback.value = false;
    currentStep.value--;
    attemptsOnCurrentQuestion.value = 0;
  }
};

// Handle answer selection
const checkAnswer = (selected) => {
  attemptsOnCurrentQuestion.value++;

  if (currentProblem.value && selected === currentProblem.value.answer) {
    // Correct answer
    const randomIndex = Math.floor(Math.random() * congratsMessages.length);
    feedbackMessage.value = congratsMessages[randomIndex];
    feedbackType.value = 'success';
    correctAnswers.value++;
    userAnswers.value.push({
      question: currentProblem.value.question,
      userAnswer: selected,
      correct: true,
      attempts: attemptsOnCurrentQuestion.value
    });
  } else {
    // Wrong answer
    if (attemptsOnCurrentQuestion.value === 1) {
      feedbackMessage.value = "Try again! You can do it.";
      feedbackType.value = 'error';
    } else {
      // After second attempt, give a hint
      feedbackMessage.value = `Hint: The answer is ${currentProblem.value.answer}.`;
      feedbackType.value = 'hint';
      userAnswers.value.push({
        question: currentProblem.value.question,
        userAnswer: selected,
        correct: false,
        attempts: attemptsOnCurrentQuestion.value
      });
    }
  }

  showFeedback.value = true;
};

// Calculate stars based on performance (for final results)
const stars = computed(() => {
  const percentage = (correctAnswers.value / 5) * 100;
  if (percentage >= 90) return 3;
  if (percentage >= 70) return 2;
  return 1;
});

// Return to dashboard
const returnToDashboard = () => {
  router.push('/dashboard');
};

// Check if step is complete to enable next button
const isStepComplete = computed(() => {
  if (currentStep.value >= 2 && currentStep.value <= 6) {
    // For question steps, require correct answer or multiple attempts
    return (
      showFeedback.value &&
      (feedbackType.value === 'success' || attemptsOnCurrentQuestion.value >= 2)
    );
  }
  return true; // Other steps don't require completion logic
});

// Simulating loading user data
onMounted(() => {
  // In a real app, we would load lesson data based on the route params
  console.log('Lesson loaded:', lesson.value.title);
});
</script>

<template>
  <div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Lesson Header -->
      <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex justify-between items-center">
          <h1 class="text-2xl font-bold text-gray-900">{{ lesson.title }}</h1>
          <div class="flex items-center text-sm text-gray-500 space-x-4">
            <span>{{ lesson.subject }}</span>
            <span>•</span>
            <span>{{ lesson.grade }}</span>
            <span>•</span>
            <span>{{ lesson.duration }}</span>
          </div>
        </div>

        <!-- Progress bar -->
        <div class="mt-6">
          <div class="flex justify-between text-xs text-gray-500 mb-1">
            <span>Progress</span>
            <span>{{ Math.round((currentStep / totalSteps) * 100) }}%</span>
          </div>
          <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
            <div
              class="h-full bg-indigo-600 transition-all duration-300 ease-in-out"
              :style="{ width: `${(currentStep / totalSteps) * 100}%` }"
            ></div>
          </div>
        </div>
      </div>

      <!-- Lesson Content -->
      <div class="bg-white rounded-lg shadow-sm min-h-[60vh] p-8">
        <!-- Introduction -->
        <div v-if="currentStep === 0" class="flex flex-col items-center text-center">
          <div class="w-40 h-40 bg-indigo-100 rounded-full flex items-center justify-center mb-6">
            <span class="text-6xl">🔢</span>
          </div>
          <h2 class="text-3xl font-bold mb-4 text-gray-900">Welcome to Addition for Beginners!</h2>
          <p class="text-xl text-gray-600 mb-8 max-w-lg">
            Learn how to add numbers and solve simple math problems. Ready to start?
          </p>

          <p class="w-full max-w-lg text-left text-lg font-medium mb-2">In this lesson, you'll learn:</p>
          <ul class="text-left w-full max-w-lg mb-8">
            <li v-for="objective in lesson.objectives" :key="objective" class="flex items-start my-2">
              <span class="text-indigo-500 mr-2">✓</span>
              <span>{{ objective }}</span>
            </li>
          </ul>
        </div>

        <!-- Explanation of addition -->
        <div v-else-if="currentStep === 1" class="space-y-6">
          <h2 class="text-2xl font-bold mb-4 text-gray-900">What is Addition?</h2>

          <p class="text-lg text-gray-700">
            Addition is when we combine two or more numbers to find their total.
          </p>

          <div class="flex justify-center my-8">
            <div class="flex items-center text-center">
              <div class="bg-yellow-100 p-6 rounded-lg text-4xl font-bold mr-4">
                2
              </div>
              <div class="text-4xl font-bold mr-4">+</div>
              <div class="bg-green-100 p-6 rounded-lg text-4xl font-bold mr-4">
                3
              </div>
              <div class="text-4xl font-bold mr-4">=</div>
              <div class="bg-indigo-100 p-6 rounded-lg text-4xl font-bold">
                5
              </div>
            </div>
          </div>

          <p class="text-lg text-gray-700">
            When we add 2 and 3 together, we get 5!
          </p>

          <div class="bg-blue-50 p-6 rounded-lg mt-6">
            <p class="text-lg">
              Think of it like combining groups of objects:
            </p>
            <div class="flex justify-center my-4">
              <div class="mr-4">
                <span class="text-3xl">🍎🍎</span>
                <p class="text-center">2 apples</p>
              </div>
              <div class="text-3xl font-bold self-center">+</div>
              <div class="mx-4">
                <span class="text-3xl">🍎🍎🍎</span>
                <p class="text-center">3 apples</p>
              </div>
              <div class="text-3xl font-bold self-center">=</div>
              <div class="ml-4">
                <span class="text-3xl">🍎🍎🍎🍎🍎</span>
                <p class="text-center">5 apples</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Questions/Problems (Steps 2-6) -->
        <div v-else-if="currentStep >= 2 && currentStep <= 6" class="flex flex-col items-center">
          <h2 class="text-2xl font-bold mb-8 text-center">Practice Problem {{ currentStep - 1 }}</h2>

          <div class="w-full max-w-lg">
            <div class="text-center mb-8">
              <p class="text-4xl font-bold text-gray-900 mb-8">
                {{ currentProblem.question }}
              </p>

              <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-8">
                <button
                  v-for="option in currentProblem.options"
                  :key="option"
                  @click="checkAnswer(option)"
                  class="px-6 py-4 text-2xl font-medium rounded-lg border-2 transition-colors duration-200"
                  :class="[
                    showFeedback && option === currentProblem.answer
                      ? 'border-green-600 bg-green-50 text-green-800'
                      : 'border-gray-300 bg-white hover:bg-gray-50'
                  ]"
                  :disabled="showFeedback"
                >
                  {{ option }}
                </button>
              </div>
            </div>

            <!-- Feedback after answering -->
            <div
              v-if="showFeedback"
              class="mt-6 p-4 rounded-lg text-center"
              :class="{
                'bg-green-50 border border-green-200': feedbackType === 'success',
                'bg-red-50 border border-red-200': feedbackType === 'error',
                'bg-yellow-50 border border-yellow-200': feedbackType === 'hint'
              }"
            >
              <p
                class="text-lg font-medium"
                :class="{
                  'text-green-800': feedbackType === 'success',
                  'text-red-800': feedbackType === 'error',
                  'text-yellow-800': feedbackType === 'hint'
                }"
              >
                {{ feedbackMessage }}
              </p>
            </div>
          </div>
        </div>

        <!-- Conclusion/Results -->
        <div v-else-if="currentStep === 7" class="flex flex-col items-center text-center">
          <div class="mb-8">
            <div class="flex justify-center">
              <template v-for="i in 3" :key="i">
                <svg
                  class="w-12 h-12 mx-1"
                  fill="none"
                  viewBox="0 0 24 24"
                >
                  <path
                    fill="currentColor"
                    :class="i <= stars ? 'text-yellow-400' : 'text-gray-300'"
                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"
                  />
                </svg>
              </template>
            </div>
            <p class="text-xl font-medium mt-2">
              {{ stars === 3 ? 'Excellent!' : stars === 2 ? 'Good job!' : 'Nice try!' }}
            </p>
          </div>

          <h2 class="text-3xl font-bold mb-4 text-gray-900">Lesson Complete!</h2>
          <p class="text-xl text-gray-600 mb-8">
            You got {{ correctAnswers }} out of 5 questions correct.
          </p>

          <div class="bg-indigo-50 p-6 rounded-lg w-full max-w-md mb-8">
            <h3 class="text-lg font-semibold text-indigo-900 mb-2">What you learned:</h3>
            <ul class="text-left">
              <li v-for="objective in lesson.objectives" :key="objective" class="flex items-start my-2">
                <span class="text-indigo-500 mr-2">✓</span>
                <span>{{ objective }}</span>
              </li>
            </ul>
          </div>

          <div class="flex space-x-4">
            <button
              @click="currentStep = 0"
              class="px-6 py-2 border border-indigo-600 rounded-md text-indigo-600 font-medium hover:bg-indigo-50"
            >
              Restart Lesson
            </button>
            <button
              @click="returnToDashboard"
              class="px-6 py-2 bg-indigo-600 text-white rounded-md font-medium hover:bg-indigo-700"
            >
              Back to Dashboard
            </button>
          </div>
        </div>
      </div>

      <!-- Navigation buttons -->
      <div class="flex justify-between mt-6">
        <button
          v-if="currentStep > 0"
          @click="prevStep"
          class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 font-medium hover:bg-gray-50"
        >
          Back
        </button>
        <div v-else></div>

        <button
          v-if="currentStep < totalSteps"
          @click="nextStep"
          :disabled="!isStepComplete"
          class="px-6 py-2 bg-indigo-600 text-white rounded-md font-medium hover:bg-indigo-700 disabled:opacity-50 disabled:cursor-not-allowed"
        >
          {{ currentStep === 0 ? 'Start Lesson' : 'Continue' }}
        </button>
      </div>
    </div>
  </div>
</template>

<style scoped lang="postcss">
/* Animations and transitions */
.lesson-fade-enter-active,
.lesson-fade-leave-active {
  transition: opacity 0.5s ease;
}

.lesson-fade-enter-from,
.lesson-fade-leave-to {
  opacity: 0;
}
</style>
