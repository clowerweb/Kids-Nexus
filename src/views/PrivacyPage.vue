<script setup>
// No additional script needed for this static page
</script>

<template>
  <div class="bg-white">
    <!-- Header section -->
    <div class="bg-gradient-to-r from-purple-50 to-indigo-50 py-16 md:py-24">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
          <span class="block">Privacy Policy</span>
        </h1>
        <p class="mt-6 max-w-2xl mx-auto text-xl text-gray-500">
          At KidsNexus, protecting children's privacy is our highest priority.
          This policy outlines how we collect, use, and safeguard information.
        </p>
        <p class="mt-4 text-sm text-gray-500">Last Updated: {{ new Date().toLocaleDateString() }}</p>
      </div>
    </div>

    <!-- Policy content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
      <div class="prose prose-indigo prose-lg">
        <h2>Our Commitment to Privacy</h2>
        <p>
          KidsNexus is committed to protecting the privacy of children under the age of 13 and complies with all applicable children's privacy laws, including the Children's Online Privacy Protection Act (COPPA) in the United States and similar regulations worldwide.
        </p>
        <p>
          We believe in transparency about our data practices, and this policy is designed to help parents understand what information we collect, how we use it, and what choices they have regarding their children's information.
        </p>

        <h2>Information We Collect</h2>
        <h3>From Parents</h3>
        <p>When a parent creates an account, we collect:</p>
        <ul>
          <li>Parent's email address and password</li>
          <li>Parent's name</li>
          <li>Optional contact information</li>
        </ul>

        <h3>From Children</h3>
        <p>With parental consent, we collect:</p>
        <ul>
          <li>Child's first name (we recommend using only a first name or nickname)</li>
          <li>Child's age or grade level</li>
          <li>Learning preferences and interests, as specified by the parent</li>
          <li>Performance data within educational activities</li>
          <li>Progress information and learning metrics</li>
        </ul>

        <p>
          <strong>We do NOT collect:</strong>
        </p>
        <ul>
          <li>Precise geolocation data</li>
          <li>Photographs or videos of children</li>
          <li>Contact information for children</li>
          <li>Child's full name or directly identifying information</li>
        </ul>

        <h2>How We Use Information</h2>
        <p>We use the information we collect to:</p>
        <ul>
          <li>Provide personalized learning experiences tailored to each child's needs</li>
          <li>Track educational progress and generate reports for parents</li>
          <li>Improve our educational content and platform capabilities</li>
          <li>Respond to parent inquiries or support requests</li>
          <li>Ensure the security and proper functioning of our platform</li>
        </ul>

        <p>
          <strong>We NEVER use children's data to:</strong>
        </p>
        <ul>
          <li>Market or advertise to children</li>
          <li>Create commercial profiles or sell information</li>
          <li>Target content based on behavior across different websites or services</li>
        </ul>

        <h2>Parental Controls and Choices</h2>
        <p>Parents have full control over their children's information and can:</p>
        <ul>
          <li>Review all information collected about their child through their parent dashboard</li>
          <li>Update or correct any information about their child</li>
          <li>Delete specific information or request complete deletion of their child's account</li>
          <li>Disable certain data collection features while still using core educational functions</li>
          <li>Download a copy of all data associated with their child's profile</li>
        </ul>

        <h2>Information Sharing and Disclosure</h2>
        <p>
          We treat all information collected with the utmost care and confidentiality. We do not sell, rent, or share personal information with third parties except in these limited circumstances:
        </p>
        <ul>
          <li><strong>Service Providers:</strong> We may share information with trusted service providers who assist us in delivering our services, always under strict confidentiality agreements.</li>
          <li><strong>Educational Institutions:</strong> With explicit parental consent, we may share progress information with a child's school or teacher.</li>
          <li><strong>Legal Requirements:</strong> We may disclose information when required by law or to protect the safety and integrity of our users or platform.</li>
        </ul>

        <h2>Data Security</h2>
        <p>
          KidsNexus employs industry-standard security measures to protect personal information, including:
        </p>
        <ul>
          <li>Encryption of sensitive information both in transit and at rest</li>
          <li>Regular security audits and vulnerability testing</li>
          <li>Access controls limiting who can view or use personal information</li>
          <li>Regular data minimization and deletion practices</li>
          <li>Employee training on privacy and security practices</li>
        </ul>

        <h2>Data Retention</h2>
        <p>
          We retain personal information only as long as necessary to provide our services and as required by law. Parents can request deletion of their child's information at any time through their account settings or by contacting our support team.
        </p>

        <h2>Changes to This Policy</h2>
        <p>
          We may update this Privacy Policy periodically. We will notify registered users of significant changes via email and will always maintain a clear record of policy updates on this page.
        </p>

        <h2>Open Source Commitment</h2>
        <p>
          As an open-source platform, our code, including our data handling practices, is available for review. We believe transparency is essential for trust, especially when it comes to children's privacy.
        </p>

        <h2>Contact Us</h2>
        <p>
          If you have questions or concerns about our Privacy Policy or data practices, please contact us at:
        </p>
        <p>
          <strong>Email:</strong> privacy@kidsnexus.org<br>
          <strong>Address:</strong> KidsNexus Privacy Office, 123 Learning Lane, San Francisco, CA 94110
        </p>

        <div class="mt-16 p-6 bg-indigo-50 rounded-lg">
          <h3 class="text-xl font-semibold text-indigo-900">A Note to Parents</h3>
          <p class="text-indigo-900">
            We encourage you to talk with your children about online privacy and to review together how KidsNexus and other online services use their information. If you ever have concerns about how we're handling your child's data, please reach out—we're committed to addressing any issues promptly and transparently.
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
/* We rely on Tailwind classes for styling */
</style>
