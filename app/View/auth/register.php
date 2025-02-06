

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediConnect - Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-100 to-blue-300 min-h-screen flex items-center justify-center p-4">


    <form method="POST" action="../../Controllers/UtilisateurController.php"
        class="w-full max-w-md bg-white shadow-lg rounded-lg p-8">
        <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">Créer un Compte</h2>

        <!-- User Type Selection -->
        <div class="mb-6 flex justify-center space-x-4">
            <label class="flex items-center space-x-2">
                <input type="radio" name="role" value="patient" class="form-radio">
                <span>Patient</span>
            </label>
            <label class="flex items-center space-x-2">
                <input type="radio" name="role" value="medecin" class="form-radio">
                <span>Médecin</span>
            </label>
        </div>

        <!-- Registration Form -->
        <div class="space-y-4">
            <!-- Common Fields -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 mb-2">Prénom</label>
                    <input type="text" placeholder="prenom" name="prenom"
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Nom</label>
                    <input type="text" placeholder="nom" name="nom"
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div>
                <label class="block text-gray-700 mb-2">Email</label>
                <input type="email" name="email" placeholder="Email"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 mb-2">Mot de passe</label>
                <input type="password" placeholder="Mot de passe" name="mot_de_passe"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Medecin-Specific Fields -->
            <div id="medecin-fields" class="hidden space-y-4">
                <div>
                    <label class="block text-gray-700 mb-2">Spécialité</label>
                    <select name="Specialite" class="w-full px-3 py-2 border rounded-md">
                        <option>Médecine Générale</option>
                        <option>Cardiologie</option>
                        <option>Pédiatrie</option>
                        <option>Neurologie</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Numéro d'Ordre</label>
                    <input type="number" placeholder="Numéro d'Ordre" name='Numero_Ordre'
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <!-- Patient-Specific Fields -->
            <div id="patient-fields" class="hidden space-y-4">
                <div>
                    <label class="block text-gray-700 mb-2">Date de Naissance</label>
                    <input type="date" name="date_Naissance"
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Numéro de Sécurité Sociale</label>
                    <input type="number" Name='numeroSociale' placeholder="Numéro de Sécurité Sociale"
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <button type="submit" name="register"
                class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-300">
                S'inscrire
            </button>
        </div>

        <div class="mt-4 text-center">
            <p class="text-gray-600">Déjà un compte ?
                <a href="#" class="text-blue-600 hover:underline">Connectez-vous</a>
            </p>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const roleRadios = document.querySelectorAll('input[name="role"]');
            const medecinFields = document.getElementById('medecin-fields');
            const patientFields = document.getElementById('patient-fields');

            roleRadios.forEach(radio => {
                radio.addEventListener('change', function () {
                    if (this.value === 'medecin') {
                        medecinFields.classList.remove('hidden');
                        patientFields.classList.add('hidden');
                    } else if (this.value === 'patient') {
                        patientFields.classList.remove('hidden');
                        medecinFields.classList.add('hidden');
                    }
                });
            });
        });
    </script>

</body>

</html>
</body>

</html>