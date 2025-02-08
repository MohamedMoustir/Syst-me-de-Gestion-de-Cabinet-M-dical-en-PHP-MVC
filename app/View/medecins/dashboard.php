<?php 


?>

  <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Médical</title> 
     <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body class="bg-gray-50">
<header class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-6">
            <div class="flex items-center">
                <i data-feather="activity" class="text-blue-600 mr-3 w-10 h-10"></i>
                <h1 class="text-2xl font-bold text-gray-900">MediConnect</h1>
            </div>
            <nav class="space-x-4">
                <a href="index.php?action=medecin" class="text-gray-600 hover:text-blue-600 transition duration-300">
                    <i data-feather="user" class="inline-block mr-1"></i>dashboard
                </a>
                <a href="index.php?action=Utilisater" class="text-gray-600 hover:text-blue-600 transition duration-300">
                    <i data-feather="calendar" class="inline-block mr-1"></i>Rendez-vous
                </a>
                <a href="index.php?action=Consultation" class="text-gray-600 hover:text-blue-600 transition duration-300">
                    <i data-feather="calendar" class="inline-block mr-1"></i>Consultation
                </a>
                <a href="index.php?action=logout"
                    class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    Déconnexion
                </a>
            </nav>
        </div>
    </div>
</header>
    <div class="p-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Tableau de bord médical</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Total Patients -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-sm font-medium text-gray-500">Total Patients</h3>
                    <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div class="text-2xl font-bold"><?= $getPatientsPerMedecin?></div>
            </div>

            <!-- Today's Consultations -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-sm font-medium text-gray-500">new Patients Last 30 Days</h3>
                    <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="text-2xl font-bold"><?=$newPatientsLast30Days?></div>
            </div>

            <!-- Average Wait Time -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-sm font-medium text-gray-500">Approved Appointments</h3>
                    <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="text-2xl font-bold"><?= $approvedAppointments?></div>
            </div>

            <!-- Monthly Growth -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-sm font-medium text-gray-500">Cancelled Appointments</h3>
                    <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                </div>
                <div class="text-2xl font-bold text-green-600"><?= $cancelledAppointments?></div>
            </div>

            <!-- Active Consultations -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-sm font-medium text-gray-500">Consultations Actives</h3>
                    <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <div class="text-2xl font-bold">8</div>
            </div>
        </div>
    </div>
    <!-- Footer -->
<footer class="bg-blue-600 text-white py-6 mt-8">
    <div class="container mx-auto px-4 text-center">
        <p class="text-sm">&copy; <span id="year"></span> Cabinet Médical. Tous droits réservés.</p>
        <div class="flex justify-center space-x-4 mt-2">
            <a href="#" class="text-white hover:text-gray-300 text-lg">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="#" class="text-white hover:text-gray-300 text-lg">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="text-white hover:text-gray-300 text-lg">
                <i class="fab fa-linkedin"></i>
            </a>
        </div>
    </div>
</footer>

<script>

    document.getElementById('year').textContent = new Date().getFullYear();
</script>
</body>
</html>