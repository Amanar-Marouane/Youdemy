<?php include __DIR__ . "/partial/header.view.php" ?>
<?php include __DIR__ . "/partial/nav.view.php" ?>

<div class="flex items-center justify-center min-h-[87vh] p-4">
    <div class="max-w-4xl w-full">
        <div class="relative bg-gray-800 rounded-2xl p-1">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-600 via-pink-500 to-indigo-600 rounded-2xl -z-10 blur-sm opacity-50"></div>

            <div class="bg-gray-800 rounded-2xl p-8">
                <div class="flex flex-col lg:flex-row items-center gap-8">
                    <div class="relative group">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-pink-600 to-purple-600 rounded-full blur opacity-75 group-hover:opacity-100 transition duration-1000"></div>
                        <div class="relative">
                            <img
                                class="w-40 h-40 rounded-full object-cover border-4 border-gray-800"
                                src="<?= htmlspecialchars($profile_img) ?>"
                                alt="Profile picture">
                            <div class="absolute bottom-3 right-3 w-4 h-4 bg-green-500 rounded-full border-2 border-gray-800"></div>
                        </div>
                    </div>
                    <div class="flex-1 text-center lg:text-left space-y-4">
                        <div>
                            <h1 class="text-3xl font-bold text-white mb-2"><?= htmlspecialchars($full_name) ?></h1>
                            <p class="text-gray-400 text-lg"><?= htmlspecialchars($email) ?></p>
                        </div>

                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-gradient-to-r from-purple-500 to-indigo-500 text-white shadow-lg">
                            <span class="w-2 h-2 bg-white rounded-full mr-2"></span>
                            <?= htmlspecialchars($acc_type) ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . "/partial/footer.view.php" ?>