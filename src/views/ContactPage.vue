<script setup>
import { ref } from 'vue';

// Form data
const formData = ref({
  name: '',
  email: '',
  subject: '',
  message: '',
  userType: 'parent' // default selection
});

// Form state
const isSubmitting = ref(false);
const isSubmitted = ref(false);
const errorMessage = ref('');

// User type options
const userTypes = [
  { id: 'parent', label: 'I am a parent' },
  { id: 'educator', label: 'I am an educator' },
  { id: 'developer', label: 'I am a developer interested in contributing' },
  { id: 'other', label: 'Other' }
];

// Subject options
const subjectOptions = [
  { value: 'general', label: 'General Question' },
  { value: 'support', label: 'Technical Support' },
  { value: 'feedback', label: 'Feedback or Suggestion' },
  { value: 'partnership', label: 'Partnership Inquiry' },
  { value: 'media', label: 'Media or Press Inquiry' }
];

// Form validation
const validateForm = () => {
  // Simple validation
  if (!formData.value.name.trim()) return 'Please enter your name';
  if (!formData.value.email.trim()) return 'Please enter your email';
  if (!formData.value.email.includes('@')) return 'Please enter a valid email address';
  if (!formData.value.subject) return 'Please select a subject';
  if (!formData.value.message.trim()) return 'Please enter a message';

  return ''; // No errors
};

// Form submission
const submitForm = () => {
  errorMessage.value = validateForm();

  if (errorMessage.value) return;

  isSubmitting.value = true;

  // Simulate API call
  setTimeout(() => {
    // In a real app, this would be an API call to submit the form
    console.log('Form submitted with data:', formData.value);
    isSubmitting.value = false;
    isSubmitted.value = true;

    // Reset form after submission
    formData.value = {
      name: '',
      email: '',
      subject: '',
      message: '',
      userType: 'parent'
    };
  }, 1500);
};
</script>

<template>
  <div>
    <!-- Header section -->
    <div class="bg-gradient-to-r from-indigo-50 to-blue-50 py-16 md:py-24">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
          <span class="block">Contact Us</span>
        </h1>
        <p class="mt-6 max-w-2xl mx-auto text-xl text-gray-500">
          Have questions or feedback? We'd love to hear from you.
        </p>
      </div>
    </div>

    <!-- Contact form section -->
    <div class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-2 lg:gap-16">
          <!-- Contact information section -->
          <div>
            <h2 class="text-3xl font-extrabold text-gray-900">Get in Touch</h2>
            <p class="mt-4 text-lg text-gray-500">
              We're here to help with any questions about KidsNexus, from technical support to partnership inquiries.
            </p>

            <div class="mt-12 space-y-8">
              <div class="flex">
                <div class="flex-shrink-0">
                  <span class="inline-flex items-center justify-center h-12 w-12 rounded-md bg-indigo-100 text-indigo-600">
                    ✉️
                  </span>
                </div>
                <div class="ml-4">
                  <h3 class="text-lg font-medium text-gray-900">Email Us</h3>
                  <p class="mt-1 text-gray-500">
                    <a href="mailto:info@kidsnexus.org" class="text-indigo-600 hover:text-indigo-800">
                      info@kidsnexus.org
                    </a>
                  </p>
                  <p class="mt-1 text-sm text-gray-500">
                    We aim to respond to all inquiries within 48 hours during business days.
                  </p>
                </div>
              </div>

              <div class="flex">
                <div class="flex-shrink-0">
                  <span class="inline-flex items-center justify-center h-12 w-12 rounded-md bg-indigo-100 text-indigo-600">
                    💬
                  </span>
                </div>
                <div class="ml-4">
                  <h3 class="text-lg font-medium text-gray-900">Community Forum</h3>
                  <p class="mt-1 text-gray-500">
                    <a href="#" class="text-indigo-600 hover:text-indigo-800">
                      forum.kidsnexus.org
                    </a>
                  </p>
                  <p class="mt-1 text-sm text-gray-500">
                    Join our community to connect with other parents, educators, and the KidsNexus team.
                  </p>
                </div>
              </div>

              <div class="flex">
                <div class="flex-shrink-0">
                  <span class="inline-flex items-center justify-center h-12 w-12 rounded-md bg-indigo-100 text-indigo-600">
                    🐙
                  </span>
                </div>
                <div class="ml-4">
                  <h3 class="text-lg font-medium text-gray-900">GitHub</h3>
                  <p class="mt-1 text-gray-500">
                    <a href="#" class="text-indigo-600 hover:text-indigo-800">
                      github.com/kidsnexus
                    </a>
                  </p>
                  <p class="mt-1 text-sm text-gray-500">
                    Report issues or contribute to our open-source platform.
                  </p>
                </div>
              </div>
            </div>

            <div class="mt-12 p-6 bg-gray-50 rounded-lg">
              <h3 class="text-lg font-medium text-gray-900">For Urgent Support</h3>
              <p class="mt-2 text-gray-500">
                If you're experiencing technical issues that require immediate attention, please email
                <a href="mailto:support@kidsnexus.org" class="text-indigo-600 hover:text-indigo-800">support@kidsnexus.org</a>
                with "URGENT" in the subject line.
              </p>
            </div>
          </div>

          <!-- Contact form -->
          <div class="mt-12 lg:mt-0">
            <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-200">
              <div v-if="isSubmitted" class="text-center py-8">
                <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100">
                  <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                </div>
                <h3 class="mt-4 text-xl font-medium text-gray-900">Thank you!</h3>
                <p class="mt-2 text-gray-500">
                  Your message has been sent successfully. We'll get back to you as soon as possible.
                </p>
                <button
                  @click="isSubmitted = false"
                  class="mt-6 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700"
                >
                  Send Another Message
                </button>
              </div>

              <form v-else @submit.prevent="submitForm" class="space-y-6">
                <h2 class="text-xl font-bold text-gray-900">Send Us a Message</h2>

                <!-- Name field -->
                <div>
                  <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
                  <input
                    type="text"
                    id="name"
                    v-model="formData.name"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                  />
                </div>

                <!-- Email field -->
                <div>
                  <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                  <input
                    type="email"
                    id="email"
                    v-model="formData.email"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                  />
                </div>

                <!-- User type selection -->
                <div>
                  <label class="block text-sm font-medium text-gray-700">I am contacting as a:</label>
                  <div class="mt-2 space-y-2">
                    <div v-for="option in userTypes" :key="option.id" class="flex items-center">
                      <input
                        type="radio"
                        :id="option.id"
                        name="user-type"
                        :value="option.id"
                        v-model="formData.userType"
                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300"
                      />
                      <label :for="option.id" class="ml-3 block text-sm text-gray-700">
                        {{ option.label }}
                      </label>
                    </div>
                  </div>
                </div>

                <!-- Subject selection -->
                <div>
                  <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                  <select
                    id="subject"
                    v-model="formData.subject"
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 rounded-md"
                  >
                    <option value="" disabled selected>Select a subject</option>
                    <option v-for="option in subjectOptions" :key="option.value" :value="option.value">
                      {{ option.label }}
                    </option>
                  </select>
                </div>

                <!-- Message field -->
                <div>
                  <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                  <textarea
                    id="message"
                    v-model="formData.message"
                    rows="5"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="How can we help you?"
                  ></textarea>
                </div>

                <!-- Error message -->
                <div v-if="errorMessage" class="text-red-600 text-sm">
                  {{ errorMessage }}
                </div>

                <!-- Submit button -->
                <div>
                  <button
                    type="submit"
                    :disabled="isSubmitting"
                    class="w-full inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50"
                  >
                    <svg v-if="isSubmitting" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    {{ isSubmitting ? 'Sending...' : 'Send Message' }}
                  </button>
                </div>

                <p class="text-xs text-gray-500 mt-4">
                  By submitting this form, you agree to our
                  <a href="/privacy" class="text-indigo-600 hover:text-indigo-800">Privacy Policy</a>.
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- FAQ section -->
    <div class="py-16 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
          <h2 class="text-3xl font-extrabold text-gray-900">Frequently Asked Questions</h2>
          <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500">
            Answers to common questions about contacting us
          </p>
        </div>

        <div class="mt-12 max-w-3xl mx-auto divide-y-2 divide-gray-200">
          <div class="py-6">
            <h3 class="text-lg font-medium text-gray-900">How quickly can I expect a response?</h3>
            <div class="mt-2">
              <p class="text-gray-500">
                We aim to respond to all inquiries within 48 hours on business days. For urgent technical support issues, we prioritize responses and typically get back to you within 24 hours.
              </p>
            </div>
          </div>

          <div class="py-6">
            <h3 class="text-lg font-medium text-gray-900">I'm having trouble with my child's account. What information should I provide?</h3>
            <div class="mt-2">
              <p class="text-gray-500">
                When reporting technical issues, please include your email address, your child's username (not their full name), the device and browser you're using, and a detailed description of the problem including any error messages you see. Screenshots are also very helpful.
              </p>
            </div>
          </div>

          <div class="py-6">
            <h3 class="text-lg font-medium text-gray-900">How can I report inappropriate content?</h3>
            <div class="mt-2">
              <p class="text-gray-500">
                Child safety is our top priority. If you come across any content that you find inappropriate, please email us immediately at <a href="mailto:safety@kidsnexus.org" class="text-indigo-600 hover:text-indigo-800">safety@kidsnexus.org</a> with details about where you found the content. We'll investigate and take action promptly.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped lang="postcss">
/* Styling is handled by Tailwind classes */
</style>
