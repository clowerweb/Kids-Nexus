<script setup>
import { ref, reactive } from 'vue';
import { RouterLink } from 'vue-router';

// Parent signup form state
const parentForm = reactive({
  firstName: '',
  lastName: '',
  email: '',
  password: '',
  confirmPassword: '',
  agreeToTerms: false
});

// Child profiles state
const childProfiles = ref([
  { id: 1, firstName: '', lastName: '', age: '', grade: '', interests: [] }
]);

// Available interests for children
const availableInterests = ref([
  'Reading', 'Writing', 'Math', 'Science', 'History', 'Art', 'Music',
  'Coding', 'Space', 'Animals', 'Nature', 'Sports'
]);

// Selected grade
const grades = [
  'Preschool', 'Kindergarten',
  '1st Grade', '2nd Grade', '3rd Grade', '4th Grade', '5th Grade',
  '6th Grade', '7th Grade', '8th Grade'
];

// Form validation errors
const errors = ref({});

// Form submission state
const isSubmitting = ref(false);
const signupComplete = ref(false);

// Add a new child profile
const addChildProfile = () => {
  const newId = childProfiles.value.length > 0
    ? Math.max(...childProfiles.value.map(child => child.id)) + 1
    : 1;

  childProfiles.value.push({
    id: newId,
    firstName: '',
    lastName: '',
    age: '',
    grade: '',
    interests: []
  });
};

// Remove a child profile
const removeChildProfile = (id) => {
  if (childProfiles.value.length > 1) {
    childProfiles.value = childProfiles.value.filter(child => child.id !== id);
  }
};

// Toggle interest selection for a child
const toggleInterest = (childId, interest) => {
  const child = childProfiles.value.find(c => c.id === childId);
  if (!child) return;

  if (child.interests.includes(interest)) {
    child.interests = child.interests.filter(i => i !== interest);
  } else {
    if (child.interests.length < 5) { // Limit to 5 interests
      child.interests.push(interest);
    }
  }
};

// Validate the form
const validateForm = () => {
  errors.value = {};
  let isValid = true;

  // Validate parent info
  if (!parentForm.firstName.trim()) {
    errors.value.firstName = 'First name is required';
    isValid = false;
  }

  if (!parentForm.lastName.trim()) {
    errors.value.lastName = 'Last name is required';
    isValid = false;
  }

  if (!parentForm.email.trim()) {
    errors.value.email = 'Email is required';
    isValid = false;
  } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(parentForm.email)) {
    errors.value.email = 'Please enter a valid email address';
    isValid = false;
  }

  if (!parentForm.password) {
    errors.value.password = 'Password is required';
    isValid = false;
  } else if (parentForm.password.length < 8) {
    errors.value.password = 'Password must be at least 8 characters';
    isValid = false;
  }

  if (parentForm.password !== parentForm.confirmPassword) {
    errors.value.confirmPassword = 'Passwords do not match';
    isValid = false;
  }

  if (!parentForm.agreeToTerms) {
    errors.value.agreeToTerms = 'You must agree to the terms and privacy policy';
    isValid = false;
  }

  // Validate child profiles
  childProfiles.value.forEach((child, index) => {
    if (!child.firstName.trim()) {
      errors.value[`child${index}FirstName`] = 'Child\'s first name is required';
      isValid = false;
    }

    if (!child.age) {
      errors.value[`child${index}Age`] = 'Child\'s age is required';
      isValid = false;
    } else if (isNaN(Number(child.age)) || Number(child.age) < 3 || Number(child.age) > 14) {
      errors.value[`child${index}Age`] = 'Age must be between 3 and 14';
      isValid = false;
    }

    if (!child.grade) {
      errors.value[`child${index}Grade`] = 'Please select a grade';
      isValid = false;
    }
  });

  return isValid;
};

// Submit the form
const submitForm = () => {
  if (!validateForm()) {
    // Scroll to the first error
    const firstErrorElement = document.querySelector('.error-message');
    if (firstErrorElement) {
      firstErrorElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
    return;
  }

  isSubmitting.value = true;

  // Simulate API call for signup
  setTimeout(() => {
    // This would be replaced with actual API call in production
    console.log('Parent data:', parentForm);
    console.log('Child profiles:', childProfiles.value);

    // Show success state
    signupComplete.value = true;
    isSubmitting.value = false;
  }, 1500);
};
</script>

<template>
  <div class="py-12 md:py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-indigo-50 to-purple-50">
    <div class="max-w-3xl mx-auto">
      <!-- Pre-signup form -->
      <div v-if="!signupComplete" class="bg-white rounded-xl shadow-xl p-8">
        <h1 class="text-3xl font-bold text-gray-900 text-center">Join KidsNexus</h1>
        <p class="mt-4 text-center text-gray-600">
          Create your free parent account and set up profiles for your children to get started
          with personalized learning.
        </p>

        <form @submit.prevent="submitForm" class="mt-8 space-y-8">
          <!-- Parent Information Section -->
          <div>
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Parent Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label for="firstName" class="block text-sm font-medium text-gray-700">First Name</label>
                <input
                  type="text"
                  id="firstName"
                  v-model="parentForm.firstName"
                  class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                >
                <p v-if="errors.firstName" class="mt-1 text-sm text-red-600 error-message">{{ errors.firstName }}</p>
              </div>

              <div>
                <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input
                  type="text"
                  id="lastName"
                  v-model="parentForm.lastName"
                  class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                >
                <p v-if="errors.lastName" class="mt-1 text-sm text-red-600 error-message">{{ errors.lastName }}</p>
              </div>

              <div class="md:col-span-2">
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input
                  type="email"
                  id="email"
                  v-model="parentForm.email"
                  class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                >
                <p v-if="errors.email" class="mt-1 text-sm text-red-600 error-message">{{ errors.email }}</p>
              </div>

              <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input
                  type="password"
                  id="password"
                  v-model="parentForm.password"
                  class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                >
                <p v-if="errors.password" class="mt-1 text-sm text-red-600 error-message">{{ errors.password }}</p>
              </div>

              <div>
                <label for="confirmPassword" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input
                  type="password"
                  id="confirmPassword"
                  v-model="parentForm.confirmPassword"
                  class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                >
                <p v-if="errors.confirmPassword" class="mt-1 text-sm text-red-600 error-message">{{ errors.confirmPassword }}</p>
              </div>
            </div>
          </div>

          <!-- Child Profiles Section -->
          <div>
            <div class="flex justify-between items-center mb-4">
              <h2 class="text-xl font-semibold text-gray-900">Child Profiles</h2>
              <button
                type="button"
                @click="addChildProfile"
                class="text-indigo-600 hover:text-indigo-800 flex items-center text-sm font-medium"
              >
                <span class="mr-1">+</span> Add Another Child
              </button>
            </div>

            <div v-for="(child, index) in childProfiles" :key="child.id" class="mb-8 p-6 bg-gray-50 rounded-lg">
              <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium text-gray-900">Child {{ index + 1 }}</h3>
                <button
                  v-if="childProfiles.length > 1"
                  type="button"
                  @click="removeChildProfile(child.id)"
                  class="text-red-600 hover:text-red-800 text-sm"
                >
                  Remove
                </button>
              </div>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                  <label :for="`child${index}FirstName`" class="block text-sm font-medium text-gray-700">First Name</label>
                  <input
                    type="text"
                    :id="`child${index}FirstName`"
                    v-model="child.firstName"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                  >
                  <p v-if="errors[`child${index}FirstName`]" class="mt-1 text-sm text-red-600 error-message">{{ errors[`child${index}FirstName`] }}</p>
                </div>

                <div>
                  <label :for="`child${index}LastName`" class="block text-sm font-medium text-gray-700">Last Name (Optional)</label>
                  <input
                    type="text"
                    :id="`child${index}LastName`"
                    v-model="child.lastName"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                  >
                </div>

                <div>
                  <label :for="`child${index}Age`" class="block text-sm font-medium text-gray-700">Age</label>
                  <input
                    type="number"
                    :id="`child${index}Age`"
                    v-model="child.age"
                    min="3"
                    max="14"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                  >
                  <p v-if="errors[`child${index}Age`]" class="mt-1 text-sm text-red-600 error-message">{{ errors[`child${index}Age`] }}</p>
                </div>

                <div>
                  <label :for="`child${index}Grade`" class="block text-sm font-medium text-gray-700">Grade</label>
                  <select
                    :id="`child${index}Grade`"
                    v-model="child.grade"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                  >
                    <option value="" disabled>Select a grade</option>
                    <option v-for="grade in grades" :key="grade" :value="grade">{{ grade }}</option>
                  </select>
                  <p v-if="errors[`child${index}Grade`]" class="mt-1 text-sm text-red-600 error-message">{{ errors[`child${index}Grade`] }}</p>
                </div>

                <div class="md:col-span-2">
                  <label class="block text-sm font-medium text-gray-700 mb-2">Interests (Choose up to 5)</label>
                  <div class="flex flex-wrap gap-2">
                    <button
                      v-for="interest in availableInterests"
                      :key="interest"
                      type="button"
                      @click="toggleInterest(child.id, interest)"
                      class="px-3 py-1.5 text-sm rounded-full border"
                      :class="child.interests.includes(interest)
                        ? 'bg-indigo-100 border-indigo-300 text-indigo-800'
                        : 'bg-white border-gray-300 text-gray-700 hover:bg-gray-50'"
                    >
                      {{ interest }}
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Terms and Privacy Agreement -->
          <div class="flex items-start">
            <div class="flex items-center h-5">
              <input
                id="terms"
                type="checkbox"
                v-model="parentForm.agreeToTerms"
                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
              >
            </div>
            <div class="ml-3 text-sm">
              <label for="terms" class="font-medium text-gray-700">
                I agree to the <a href="#" class="text-indigo-600 hover:text-indigo-800">Terms of Service</a> and
                <a href="#" class="text-indigo-600 hover:text-indigo-800">Privacy Policy</a>
              </label>
              <p v-if="errors.agreeToTerms" class="mt-1 text-sm text-red-600 error-message">{{ errors.agreeToTerms }}</p>
            </div>
          </div>

          <!-- Submit Button -->
          <div class="flex justify-center">
            <button
              type="submit"
              class="w-full sm:w-auto px-8 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 flex items-center justify-center"
              :class="{ 'opacity-75 cursor-not-allowed': isSubmitting }"
              :disabled="isSubmitting"
            >
              <span v-if="isSubmitting" class="mr-2">
                <!-- Loading spinner -->
                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
              </span>
              {{ isSubmitting ? 'Creating Account...' : 'Create Account' }}
            </button>
          </div>

          <div class="text-center text-sm text-gray-600">
            Already have an account?
            <RouterLink to="/login" class="font-medium text-indigo-600 hover:text-indigo-500">Sign in</RouterLink>
          </div>
        </form>
      </div>

      <!-- Success screen after signup -->
      <div v-else class="bg-white rounded-xl shadow-xl p-8 text-center">
        <div class="mb-6 text-green-500 flex justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <h1 class="text-3xl font-bold text-gray-900">Welcome to KidsNexus!</h1>
        <p class="mt-4 text-gray-600">
          Your account has been successfully created. We've sent a confirmation email to
          <span class="font-medium">{{ parentForm.email }}</span>.
        </p>
        <div class="mt-8">
          <RouterLink to="/dashboard" class="inline-flex items-center justify-center px-8 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Go to Dashboard
          </RouterLink>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped lang="postcss">
/* Additional scoped styles if needed */
</style>
