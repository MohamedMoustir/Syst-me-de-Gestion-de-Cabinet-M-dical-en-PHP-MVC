<?php var_dump($resulte->specialite); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediConnect - Rendez-vous</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Prise de Rendez-vous -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-blue-600 mb-6">Prendre Rendez-vous</h2>

                <form method="POST" action="../Controllers/RendezVousController.php" class="space-y-4">
                    <div>
                        <label class="block text-gray-700 mb-2">Choisir un Médecin</label>
                        <select name="id_medecin" class="w-full px-3 py-2 border rounded-md">

                            <?php


                            echo '<option value =' . htmlspecialchars($resulte->id) . '>' . htmlspecialchars($resulte->nom) . '</option>';



                            ?>

                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Choisir un Médecin</label>
                        <select name="specialite" class="w-full px-3 py-2 border rounded-md">

                            <?php


                            echo '<option>' . htmlspecialchars($resulte->specialite) . '</option>';



                            ?>

                        </select>
                    </div>



                    <div>
                        <label class="block text-gray-700 mb-2">Créneau Horaire</label>
                        <input name="time" type="hidden" id="input">
                        <div class="grid grid-cols-3 gap-2">
                            <button type="button" onclick="gettaime('09:00')"
                                class="bg-blue-100 py-2 rounded-md hover:bg-blue-200">09:00</button>
                            <button type="button" onclick="gettaime('10:30')"
                                class="bg-blue-100 py-2 rounded-md hover:bg-blue-200">10:30</button type="button">
                            <button type="button" onclick="gettaime('14:00')"
                                class="bg-blue-100 py-2 rounded-md hover:bg-blue-200">14:00</button type="button">
                            <button type="button" onclick="gettaime('15:30')"
                                class="bg-blue-100 py-2 rounded-md hover:bg-blue-200">15:30</button type="button">
                            <button type="button" onclick="gettaime('17:00')"
                                class="bg-blue-100 py-2 rounded-md hover:bg-blue-200">17:00</button>
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">motif</label>
                        <textarea name="motif" class="w-full px-3 py-2 border rounded-md"></textarea>
                    </div>
                    <button name="Rendezvous" type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">
                        Confirmer le Rendez-vous
                    </button>
                </form>
            </div>

            <!-- Historique des Consultations -->
            <!-- <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-blue-600 mb-6">Historique des Consultations</h2>
                
                <div class="space-y-4">
                    <div class="border-b pb-4">
                        <div class="flex justify-between items-center">
                            <h3 class="font-semibold">Consultation - Dr. Dupont</h3>
                            <span class="text-sm text-gray-600">15 Jan 2024</span>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">Examen général de santé</p>
                        <button class="mt-2 text-blue-600 text-sm hover:underline">
                            Détails du Compte-Rendu
                        </button>
                    </div>

                    <div class="border-b pb-4">
                        <div class="flex justify-between items-center">
                            <h3 class="font-semibold">Consultation - Dr. Martin</h3>
                            <span class="text-sm text-gray-600">10 Dec 2023</span>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">Suivi cardiologique</p>
                        <button class="mt-2 text-blue-600 text-sm hover:underline">
                            Détails du Compte-Rendu
                        </button>
                    </div>

                    <div>
                        <div class="flex justify-between items-center">
                            <h3 class="font-semibold">Consultation - Dr. Leroy</h3>
                            <span class="text-sm text-gray-600">22 Nov 2023</span>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">Consultation pédiatrique</p>
                        <button class="mt-2 text-blue-600 text-sm hover:underline">
                            Détails du Compte-Rendu
                        </button>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <script>
        function gettaime(value) {
            document.getElementById('input').value = value;
        }
    </script>
</body>

</html>