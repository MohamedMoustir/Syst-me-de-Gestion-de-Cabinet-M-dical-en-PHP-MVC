

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediConnect - Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-100 to-blue-300 min-h-screen flex items-center justify-center p-4">


<form id="registerForm" method="POST" action="index.php?action=create"
    class="w-full max-w-md bg-white shadow-lg rounded-lg p-8" onsubmit="return validateForm()">
    <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">Créer un Compte</h2>

    <!-- User Type Selection -->
    <div class="mb-6 flex justify-center space-x-4">
        <label class="flex items-center space-x-2">
            <input type="radio" name="role" value="patient" class="form-radio" required>
            <span>Patient</span>
        </label>
        <label class="flex items-center space-x-2">
            <input type="radio" name="role" value="medecin" class="form-radio">
            <span>Médecin</span>
        </label>
    </div>

    <!-- Registration Form -->
    <div class="space-y-4">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 mb-2">Prénom</label>
                <input type="text" name="prenom" id="prenom"
                    class="w-full px-3 py-2 border rounded-md focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-gray-700 mb-2">Nom</label>
                <input type="text" name="nom" id="nom"
                    class="w-full px-3 py-2 border rounded-md focus:ring-blue-500">
            </div>
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Email</label>
            <input type="email" name="email" id="email"
                class="w-full px-3 py-2 border rounded-md focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Mot de passe</label>
            <input type="password" name="mot_de_passe" id="mot_de_passe"
                class="w-full px-3 py-2 border rounded-md focus:ring-blue-500">
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
                <input type="number" name="Numero_Ordre" id="Numero_Ordre"
                    class="w-full px-3 py-2 border rounded-md focus:ring-blue-500">
            </div>
        </div>

        <!-- Patient-Specific Fields -->
        <div id="patient-fields" class="hidden space-y-4">
            <div>
                <label class="block text-gray-700 mb-2">Date de Naissance</label>
                <input type="date" name="date_Naissance"
                    class="w-full px-3 py-2 border rounded-md focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-gray-700 mb-2">Numéro de Sécurité Sociale</label>
                <input type="number" name="numeroSociale" id="numeroSociale"
                    class="w-full px-3 py-2 border rounded-md focus:ring-blue-500">
            </div>
        </div>

        <button type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-300">
            S'inscrire
        </button>
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
                } else {
                    patientFields.classList.remove('hidden');
                    medecinFields.classList.add('hidden');
                }
            });
        });
    });

    function validateForm() {
        let isValid = true;

        // Regular Expressions
        const nameRegex = /^[A-Za-zÀ-ÖØ-öø-ÿ\s-]{2,}$/;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const passwordRegex =/^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const numberRegex = /^\d+$/;

        // Inputs
        const prenom = document.getElementById("prenom");
        const nom = document.getElementById("nom");
        const email = document.getElementById("email");
        const mot_de_passe = document.getElementById("mot_de_passe");
        const numeroSociale = document.getElementById("numeroSociale");
        // const Numero_Ordre = document.getElementById("Numero_Ordre");

        // Validation
        if (!nameRegex.test(prenom.value)) {
            alert("Prénom invalide !");
            isValid = false;
        }
        if (!nameRegex.test(nom.value)) {
            alert("Nom invalide !");
            isValid = false;
        }
        if (!emailRegex.test(email.value)) {
            alert("Email invalide !");
            isValid = false;
        }
        if (!passwordRegex.test(mot_de_passe.value)) {
            alert("Le mot de passe doit contenir au moins 8 caractères, une majuscule, un chiffre et un symbole.");
            isValid = false;
        }
        if (numeroSociale && !numberRegex.test(numeroSociale.value)) {
            alert("Numéro de Sécurité Sociale invalide !");
            isValid = false;
        }
        if (Numero_Ordre && !numberRegex.test(Numero_Ordre.value)) {
            alert("Numéro d'Ordre invalide !");
            isValid = false;
        }

        return isValid;
    }
</script>


</body>

</html>
</body>

</html>