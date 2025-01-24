<?php include __DIR__ . "/partial/header.view.php" ?>
<?php include __DIR__ . "/partial/nav.view.php" ?>

<div class="min-h-[90vh] flex items-start py-32 sm:py-48 lg:py-20 text-center html">
    <?php include __DIR__ . "/partial/dashboardSideBar.view.php" ?>

    <div class="flex-1 mx-4">
        <div class="max-w-7xl mx-auto px-4 mb-6 mt-5">
            <div>
                <h1 class="text-2xl font-bold text-white">Analytics</h1>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="bg-gray-800 rounded-lg p-6">
                <div class="text-gray-400 text-sm mb-2">Total Students</div>
                <div class="text-3xl font-bold text-white"><?= $total_enrollments ?></div>
                <div class="text-green-400 text-sm mt-2">↑ <?= $recent_enrollments ?> from last month</div>
            </div>
            <div class="bg-gray-800 rounded-lg p-6">
                <div class="text-gray-400 text-sm mb-2">Active Courses</div>
                <div class="text-3xl font-bold text-white"><?= $total_courses ?></div>
                <div class="text-green-400 text-sm mt-2">↑ <?= $recent_courses ?> new this month</div>
            </div>
        </div>

        <div class="bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-3xl font-bold text-white mb-8 text-center">Top Instructors</h2>

                <div class="grid grid-cols-1 md:grid-cols-<?= count($top_teachers) ?> gap-8 place-items-center">
                    <?php foreach ($top_teachers as $teacher): 
                        extract($teacher)?>
                        <div class="bg-gray-800 rounded-lg p-6 text-center">
                            <div class="w-24 h-24 mx-auto mb-4 rounded-full overflow-hidden bg-gray-700">
                                <img src="<?= $profile_img ?>" class="bg-cover h-full w-full">
                            </div>
                            <h3 class="text-xl font-semibold text-white mb-2"><?= $full_name ?></h3>
                            <div class="flex justify-center items-center space-x-4 mb-4">
                                <div class="text-center">
                                    <span class="block text-2xl font-bold text-indigo-500"><?= $total_courses ?></span>
                                    <span class="text-sm text-gray-400">Courses</span>
                                </div>
                                <div class="text-center">
                                    <span class="block text-2xl font-bold text-indigo-500"><?= $total_enrollments ?></span>
                                    <span class="text-sm text-gray-400">Students</span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . "/partial/footer.view.php" ?>