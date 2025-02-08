

<?php
require('C:\laragon\www\cabinet_Medical\app\View\medecins\rendzvousMedcane.php');

?>
<script src="https://cdn.tailwindcss.com"></script>

<!-- Trigger Button -->

<!-- Open Modal Button -->
<!-- <button id="openModal" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Ajouter une Consultation</button> -->

<!-- Modal -->
<div id="modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center ">
    <div class="relative bg-white p-6 rounded-lg shadow-lg max-w-4xl w-full">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Ajouter une Consultation</h2>

        <form action="index.php?action=Consultation" method="POST">
            <div class="mb-4">
                <label for="id" class="block text-sm font-medium text-gray-600">ID Patient</label>
                <input value="<?= isset($_GET['ConsultationID']) ? $_GET['ConsultationID'] : '' ?>" type="text" id="id" name="id" class="w-full p-2 mt-1 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="date_consultation" class="block text-sm font-medium text-gray-600">Date de Consultation</label>
                <input type="datetime-local" id="date_consultation" name="date_consultation" class="w-full p-2 mt-1 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="treatment" class="block text-sm font-medium text-gray-600">Traitement</label>
                <textarea id="treatment" name="treatment" rows="4" class="w-full p-2 mt-1 border rounded-lg" required></textarea>
            </div>
            <div class="mb-4">
                <label for="notes" class="block text-sm font-medium text-gray-600">Notes supplémentaires</label>
                <textarea id="notes" name="notes" rows="4" class="w-full p-2 mt-1 border rounded-lg"></textarea>
            </div>

            <button name="Consultation" type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Ajouter la Consultation</button>
        </form>

        <!-- Close Button -->
        <a href="index.php?action=Utilisater" id="closeModal" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800">
            <i class="fa-solid fa-times"></i>
        </a>
    </div>
</div>

<script>
    // Open Modal
    document.getElementById('openModal').addEventListener('click', function() {
        document.getElementById('modal').classList.remove('hidden');
    });

    // Close Modal
    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('modal').classList.add('hidden');
    });

    // Close modal when clicking outside the modal
    window.addEventListener('click', function(e) {
        if (e.target === document.getElementById('modal')) {
            document.getElementById('modal').classList.add('hidden');
        }
    });
</script>
