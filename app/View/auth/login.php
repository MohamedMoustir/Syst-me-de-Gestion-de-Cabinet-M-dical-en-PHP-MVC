

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediConnect - Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-100 to-blue-300 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">MediConnect</h1>

            <!-- Login Form -->
            <form method="POST" class="space-y-4" action="../public/index.php?action=users">
                <div>
                    <label class="block text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" placeholder="Votre email"
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Mot de passe</label>
                    <input type="password" name="password" placeholder="Votre mot de passe"
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <button type="submit" name="login"
                    class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-300">
                    Connexion
                </button>
            </form>

            <!-- Separator -->
            <div class="flex items-center my-4">
                <hr class="flex-grow border-t border-gray-300">
                <span class="mx-4 text-gray-500">ou</span>
                <hr class="flex-grow border-t border-gray-300">
            </div>

            <!-- Registration Link -->
            <div class="text-center">
                <p class="text-gray-600">Vous n'avez pas de compte ?</p>
                <a href="#" class="text-blue-600 hover:underline">
                    Créer un compte
                </a>
            </div>

            <!-- Footer -->
            <div class="mt-6 text-center text-sm text-gray-500">
                © 2024 MediConnect - Gestion Médicale
            </div>
        </div>
    </div>

</body>

</html>