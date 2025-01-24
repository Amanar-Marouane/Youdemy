<?php include __DIR__ . "/../partial/header.view.php" ?>
<?php include __DIR__ . "/../partial/nav.view.php" ?>

<div class="min-h-[90vh] flex items-start py-32 sm:py-48 lg:py-20 text-center html">
    <?php include __DIR__ . "/../partial/teacherDashboardSideBar.view.php" ?>

    <div class="flex-1 mx-4">
        <div class="max-w-7xl mx-auto px-4 mb-6 mt-5">
            <div>
                <h1 class="text-2xl font-bold text-white">Course Analytics</h1>
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

        <div class="bg-gray-800 rounded-lg p-6">
            <h2 class="text-xl font-semibold text-white mb-4">Course Performance</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-gray-400 border-b border-gray-700">
                            <th class="pb-3">Course Name</th>
                            <th class="pb-3">Students</th>
                            <th class="pb-3">Status</th>
                            <th class="pb-3">Course Type</th>
                            <th class="pb-3">Caegory</th>
                            <th class="pb-3">Created At</th>
                        </tr>
                    </thead>
                    <tbody class="text-white">
                        <?php foreach ($courses as $course): 
                            extract($course)?>
                            <tr class="border-b border-gray-700">
                                <td class="py-4"><?= $course_title ?></td>
                                <td><?= $total_enrollment ?></td>
                                <td><span class="px-2 py-1 bg-green-500/20 text-green-400 rounded">Active</span></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-left pl-0">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full text-green-300 bg-green-900 <?php if ($course_type === "Video"): ?> bg-yellow-900 text-yellow-300 <?php endif; ?>"><?= $course_type ?></span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300 text-left pl-0"><?= $category ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300 text-left pl-0"><?= $created_at ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . "/../partial/footer.view.php" ?>