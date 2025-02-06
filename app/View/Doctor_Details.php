<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Doctor Details</title>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-blue-900 py-8">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-white mb-2">Doctor Details</h1>
                <nav class="text-blue-200">
                    <a href="#" class="hover:text-blue-400 transition-colors">Home</a> 
                    <span class="mx-2">/</span>
                    <a href="#" class="hover:text-blue-400 transition-colors">Doctors Details</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Doctor Details Section -->
    <section class="container mx-auto my-12 px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Doctor Info Card -->
            <div class="bg-white p-8 shadow-lg rounded-xl text-center">
                <img src="data:image/jpeg;base64,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" alt="Doctor" class="rounded-full w-48 h-48 mx-auto mb-6 border-4 border-blue-100">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Dr. Rachel Evans</h2>
                <p class="text-blue-600 font-medium mb-4">Cardiology / Interventional Cardiology</p>
                
                <div class="flex justify-center space-x-4 mb-8">
                    <a href="#" class="text-blue-500 hover:text-blue-700 transition-colors">
                        <span class="sr-only">Facebook</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/></svg>
                    </a>
                    <a href="#" class="text-blue-500 hover:text-blue-700 transition-colors">
                        <span class="sr-only">Twitter</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                    </a>
                    <a href="#" class="text-blue-500 hover:text-blue-700 transition-colors">
                        <span class="sr-only">LinkedIn</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14zm-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z" clip-rule="evenodd"/></svg>
                    </a>
                </div>

                <div class="bg-blue-50 p-6 rounded-xl border-l-4 border-blue-500">
                    <h3 class="font-bold text-gray-800 mb-4">Consultation Hours</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex justify-between">
                            <span>Monday - Friday</span>
                            <span class="text-blue-600">8:00 AM - 4:00 PM</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Saturday</span>
                            <span class="text-blue-600">8:00 AM - 4:00 PM</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Monday</span>
                            <span class="text-blue-600">8:00 AM - 4:00 PM</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Professional Details -->
            <div class="lg:col-span-2 bg-white p-8 shadow-lg rounded-xl">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Professional Profile</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <h4 class="font-semibold text-blue-600 mb-1">Education</h4>
                            <p class="text-gray-600">Doctor of Medicine (MD)</p>
                        </div>
                        <div>
                            <h4 class="font-semibold text-blue-600 mb-1">Certifications</h4>
                            <p class="text-gray-600">Certification in Internal Medicine</p>
                        </div>
                        <div>
                            <h4 class="font-semibold text-blue-600 mb-1">Current Position</h4>
                            <p class="text-gray-600">Senior Doctor at MedWeb</p>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <div>
                            <h4 class="font-semibold text-blue-600 mb-1">Affiliations</h4>
                            <p class="text-gray-600">American College of Physicians</p>
                        </div>
                        <div>
                            <h4 class="font-semibold text-blue-600 mb-1">Specializations</h4>
                            <p class="text-gray-600">Cardiac Imaging, Interventional Cardiology</p>
                        </div>
                        <div>
                            <h4 class="font-semibold text-blue-600 mb-1">Awards</h4>
                            <p class="text-gray-600">Top Internist Award 2023</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Appointment Form -->
    <section class="bg-blue-50 py-12">
        <div class="container mx-auto px-4 max-w-3xl">
            <div class="bg-white p-8 shadow-lg rounded-xl">
                <h3 class="text-2xl font-bold text-gray-800 mb-8">Schedule Consultation</h3>
                <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 mb-2">Patient Name</label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Phone Number</label>
                        <input type="tel" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Department</label>
                        <select class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            <option>Cardiology Department</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Preferred Doctor</label>
                        <select class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            <option>Dr. Rachel Evans</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Appointment Date</label>
                        <input type="date" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Preferred Time</label>
                        <select class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            <option>Morning (8AM - 12PM)</option>
                            <option>Afternoon (1PM - 4PM)</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 mb-2">Additional Notes</label>
                        <textarea rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                    <button class="md:col-span-2 w-full bg-blue-600 text-white py-4 px-6 rounded-lg hover:bg-blue-700 transition-colors font-semibold shadow-md hover:shadow-lg">
                        Request Appointment
                    </button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>