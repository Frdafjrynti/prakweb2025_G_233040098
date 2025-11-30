<x-layout>
    <x-slot:title>Contact Us</x-slot:title>

    <div class="max-w-4xl mx-auto">
        <div class="mb-8 text-center">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">Get In Touch</h1>
            <p class="text-gray-600">We'd love to hear from you. Send us a message!</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Contact Form -->
            <div class="bg-white rounded-lg shadow-md p-8">
                <h2 class="text-2xl font-bold mb-6">Send Message</h2>
                <form action="#" method="POST">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                        <input type="text" id="name" name="name" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="Your name" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" id="email" name="email" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="your@email.com" required>
                    </div>

                    <div class="mb-4">
                        <label for="subject" class="block text-gray-700 font-medium mb-2">Subject</label>
                        <input type="text" id="subject" name="subject" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="What is this about?" required>
                    </div>

                    <div class="mb-6">
                        <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                        <textarea id="message" name="message" rows="4" 
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                  placeholder="Your message here..." required></textarea>
                    </div>

                    <button type="submit" 
                            class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition font-medium">
                        Send Message
                    </button>
                </form>
            </div>

            <!-- Contact Information -->
            <div>
                <div class="bg-blue-600 text-white rounded-lg shadow-md p-8 mb-6">
                    <h2 class="text-2xl font-bold mb-6">Contact Info</h2>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <svg class="w-6 h-6 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <div>
                                <h3 class="font-semibold">Address</h3>
                                <p class="text-blue-100">Jl. Tamansari No. 1<br>Bandung, West Java 40132</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <svg class="w-6 h-6 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <div>
                                <h3 class="font-semibold">Email</h3>
                                <p class="text-blue-100">info@laravelapp.com<br>support@laravelapp.com</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <svg class="w-6 h-6 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <div>
                                <h3 class="font-semibold">Phone</h3>
                                <p class="text-blue-100">+62 123 4567 890<br>+62 987 6543 210</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md p-8">
                    <h3 class="font-bold text-xl mb-4">Office Hours</h3>
                    <div class="space-y-2 text-gray-600">
                        <p><span class="font-medium text-gray-800">Monday - Friday:</span> 9:00 AM - 5:00 PM</p>
                        <p><span class="font-medium text-gray-800">Saturday:</span> 10:00 AM - 2:00 PM</p>
                        <p><span class="font-medium text-gray-800">Sunday:</span> Closed</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>