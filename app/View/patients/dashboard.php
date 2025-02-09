<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Doctors Grid</title>
</head>

<body class="bg-gray-50">
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
                    <a href="index.php?action=patient"
                        class="text-gray-700 hover:text-blue-600 transition font-medium">Accueil</a>
                    <a href="" class="text-gray-700 hover:text-blue-600 transition font-medium">Rendez-vous</a>
                    <a href="index.php?action=patient"
                        class="text-gray-700 hover:text-blue-600 transition font-medium">Médecins</a>
                    <a href="" class="text-gray-700 hover:text-blue-600 transition font-medium">Contact</a>
                  
                </nav>

                <!-- User Menu -->
                <div class="flex items-center space-x-4">
                    <button class="text-gray-700 hover:text-blue-600 transition p-2 rounded-full hover:bg-gray-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>
                    </button>
                    <button
                        class="flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 transition p-1 rounded-full hover:bg-gray-100">
                        <img class="h-8 w-8 rounded-full border-2 border-gray-200" src="/api/placeholder/32/32"
                            alt="User profile">
                    </button>
                    <a href="index.php?action=logout"
                        class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                        Déconnexion
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Doctors Grid Section -->
    <section class="container mx-auto my-12 px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Doctor Card 1 -->
            <?php

            if (!empty($resulte)) {

                foreach ($resulte as $medecin) {



                    ?>

                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                        <div class="p-6 text-center">
                            <img src="data:image/jpeg;base64,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"
                                alt="Doctor" class="rounded-full w-32 h-32 mx-auto mb-4 border-4 border-blue-100">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Dr.<?= $medecin->getNom() ?></p>
                            </h3>
                            <p class="text-blue-600 font-medium mb-4"><?= $medecin->getSpecialite() ?></p>
                            <div class="space-y-2 text-gray-600 mb-4">
                                <p>Monday - Friday: 8:00 AM - 4:00 PM</p>
                                <p>Saturday: 8:00 AM - 12:00 PM</p>
                            </div>
                            <a href="../public/index.php?action=rendezvous&details=<?= $medecin->getId() ?>"
                                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                Book Appointment
                            </a>
                        </div>
                    </div>
                <?php }

            } else {

                echo "<p>No data found</p>";
            }

            ?>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white border-t mt-auto">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- About Section -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-800">À propos</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">MediConnect simplifie la prise de rendez-vous
                        médicaux en ligne pour tous les patients.</p>
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
                        <button
                            class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-150 text-sm font-medium">
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