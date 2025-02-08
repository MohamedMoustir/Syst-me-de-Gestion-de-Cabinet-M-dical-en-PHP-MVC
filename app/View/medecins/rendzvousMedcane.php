
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Gestion des Rendez-vous</title>
</head>
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
                <a href="index.php?action=logout"
                    class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    Déconnexion
                </a>
            </nav>
        </div>
    </div>
</header>

<body class="bg-gray-100 ">
    <main class="container mx-auto px-4 py-8 pt-[200px]">
        <!-- Table Container -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden ">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left border border-gray-200 rounded-xl ">
                    <thead class="text-xs uppercase bg-blue-500 text-white">
                        <tr>
                            <th class="px-6 py-4">Date</th>
                            <th class="px-6 py-4">Horaire</th>
                            <th class="px-6 py-4">Médecin</th>
                            <th class="px-6 py-4">Spécialité</th>
                            <th class="px-6 py-4">Statut</th>
                            <th class="px-6 py-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    <?php
if (!empty($result) && is_array($result)) {
    foreach ($result as $res) { 
        if (!isset($res[2]) || !method_exists($res[2], 'getDate_creation')) {
            continue; 
        }
?>
        <tr class="bg-white hover:bg-gray-50 transition duration-150">
            <td class="px-6 py-4 font-medium">
                <?= date("d M Y", strtotime($res[2]->getDate_creation())) ?>
            </td>
            <td class="px-6 py-4"><?= date('H:i', strtotime($res[2]->getTime())) ?></td>
            <td class="px-6 py-4 font-semibold text-blue-600">Dr. <?= isset($res[0]) ? $res[0]->getNom() : 'N/A' ?></td>
            <td class="px-6 py-4"><?= isset($res[1]) ? $res[1]->getSpecialite() : 'N/A' ?></td>
            <td class="px-6 py-4">
                <span class="px-3 py-1 text-xs font-medium rounded-full border 
                <?php
                $status = isset($res[2]) ? $res[2]->getstatut() : 'unknown';
                if ($status == 'approuved') {
                    echo ' bg-green-100 text-green-700 border-green-400';
                } elseif ($status == 'rejected') {
                    echo ' bg-yellow-100 text-yellow-700 border-yellow-400';
                } else {
                    echo ' bg-red-100 text-red-700 border-red-400';
                }
                ?>">
                    <?= ucfirst($status); ?>
                </span>
            </td>
            <td class="px-6 py-4 flex space-x-3">
                <a href="index.php?action=approuved&approuvedID=<?= isset($res[2]) ? $res[2]->getIDR() : '#' ?>"
                   class="text-blue-600 hover:text-blue-800 font-medium transition flex items-center">
                    <i class="fa-solid fa-pen mr-1"></i> approuved
                </a>
                <a href="index.php?action=Annuler&AnnulerID=<?= isset($res[2]) ? $res[2]->getIDR() : '#' ?>"
                   class="text-red-600 hover:text-red-800 font-medium transition flex items-center">
                    <i class="fa-solid fa-trash mr-1"></i> Annuler
                </a>
                <a href="index.php?action=Consultation&ConsultationID=<?= isset($res[0]) ? $res[0]->getId() : '#' ?>"
                   class="text-red-600 hover:text-red-800 font-medium transition flex items-center">
                    <i class="fa-solid fa-trash mr-1"></i> Consultation
                </a>
            </td>
        </tr>
<?php 
    } // نهاية الحلقة foreach
} else { 
?>
    <tr>
        <td colspan="6" class="px-6 py-4 text-center text-gray-500">Aucune donnée disponible</td>
    </tr>
<?php 
} 
?>

                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>


<!-- Footer -->
<footer class="bg-blue-600 text-white py-8 mt-8">
    <div class="container mx-auto px-6 text-center">
        <p class="text-sm md:text-base">&copy; <span id="year"></span> Cabinet Médical. Tous droits réservés.</p>
        <div class="flex justify-center space-x-6 mt-4">
            <a href="#" class="text-white hover:text-blue-300 transition duration-300 text-2xl">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="#" class="text-white hover:text-blue-300 transition duration-300 text-2xl">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="text-white hover:text-blue-300 transition duration-300 text-2xl">
                <i class="fab fa-linkedin"></i>
            </a>
        </div>
        <p class="mt-4 text-xs text-gray-300">Developed with ❤️ by Your Name</p>
    </div>
</footer>

<script>
    document.getElementById('year').textContent = new Date().getFullYear();
</script>


</html>