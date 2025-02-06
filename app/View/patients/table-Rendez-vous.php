<!DOCTYPE html>
<html lang="fr" class="bg-gray-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediConnect - Rendez-vous</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <!-- Logo and Name -->
                <div class="flex items-center">
                    <a href="#" class="text-2xl font-bold text-blue-600 hover:text-blue-700 transition">MediConnect</a>
                </div>
                
                <!-- Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-700 hover:text-blue-600 transition font-medium">Accueil</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 transition font-medium">Rendez-vous</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 transition font-medium">Médecins</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 transition font-medium">Contact</a>
                </nav>

                <!-- User Menu -->
                <div class="flex items-center space-x-4">
                    <button class="text-gray-700 hover:text-blue-600 transition p-2 rounded-full hover:bg-gray-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                    </button>
                    <button class="flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 transition p-1 rounded-full hover:bg-gray-100">
                        <img class="h-8 w-8 rounded-full border-2 border-gray-200" src="/api/placeholder/32/32" alt="User profile">
                    </button>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-8">
        <!-- Table Container -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs uppercase bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-gray-700 font-semibold">Date</th>
                            <th scope="col" class="px-6 py-4 text-gray-700 font-semibold">Horaire</th>
                            <th scope="col" class="px-6 py-4 text-gray-700 font-semibold">Médecin</th>
                            <th scope="col" class="px-6 py-4 text-gray-700 font-semibold">Spécialité</th>
                            <th scope="col" class="px-6 py-4 text-gray-700 font-semibold">Statut</th>
                            <th scope="col" class="px-6 py-4 text-gray-700 font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr class="bg-white hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap font-medium">15 Fév 2024</td>
                            <td class="px-6 py-4">09:00</td>
                            <td class="px-6 py-4 font-medium">Dr. Martin</td>
                            <td class="px-6 py-4">Cardiologie</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                    Confirmé
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <button class="text-blue-600 hover:text-blue-800 font-medium transition">Modifier</button>
                                <button class="ml-4 text-red-600 hover:text-red-800 font-medium transition">Annuler</button>
                            </td>
                        </tr>
                        <tr class="bg-white hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap font-medium">18 Fév 2024</td>
                            <td class="px-6 py-4">14:30</td>
                            <td class="px-6 py-4 font-medium">Dr. Dupont</td>
                            <td class="px-6 py-4">Généraliste</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700">
                                    En attente
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <button class="text-blue-600 hover:text-blue-800 font-medium transition">Modifier</button>
                                <button class="ml-4 text-red-600 hover:text-red-800 font-medium transition">Annuler</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

  <!-- Footer -->
  <footer class="bg-white border-t mt-auto">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- About Section -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-800">À propos</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">MediConnect simplifie la prise de rendez-vous médicaux en ligne pour tous les patients.</p>
                </div>

                <!-- Quick Links -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-800">Liens rapides</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Trouver un médecin</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Prendre RDV</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Urgences</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">FAQ</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-800">Contact</h3>
                    <ul class="space-y-2 text-sm">
                        <li class="text-gray-600">Email: contact@mediconnect.fr</li>
                        <li class="text-gray-600">Tél: 01 23 45 67 89</li>
                        <li class="text-gray-600">123 Rue de la Santé</li>
                        <li class="text-gray-600">75000 Paris</li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-800">Newsletter</h3>
                    <form class="space-y-3">
                        <input type="email" placeholder="Votre email" 
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <button class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-150 text-sm font-medium">
                            S'abonner
                        </button>
                    </form>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="mt-8 pt-8 border-t">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <div class="text-sm text-gray-600">
                        © 2024 MediConnect. Tous droits réservés.
                    </div>
                    <div class="flex space-x-6">
                        <a href="#" class="text-sm text-gray-600 hover:text-blue-600 transition">Confidentialité</a>
                        <a href="#" class="text-sm text-gray-600 hover:text-blue-600 transition">Conditions</a>
                        <a href="#" class="text-sm text-gray-600 hover:text-blue-600 transition">Mentions légales</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
  
</body>
</html>