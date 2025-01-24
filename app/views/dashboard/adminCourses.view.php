<?php include __DIR__ . "/../partial/header.view.php" ?>
<?php include __DIR__ . "/../partial/nav.view.php" ?>

<div class="min-h-[90vh] flex items-start py-32 sm:py-48 lg:py-20 text-center html">
    <?php include __DIR__ . "/../partial/dashboardSideBar.view.php" ?>

    <main class="flex-1 p-6">
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-5">
            <div class="bg-gray-800 p-4 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-indigo-500">Total Courses</h3>
                <p class="text-3xl font-bold text-red-300"><?= $total_courses ?></p>
            </div>
        </section>
        <div class="flex justify-between items-center mb-8 text-left">
            <h1 class="text-3xl font-bold text-gray-50">My Courses</h1>
        </div>

        <div class="bg-gray-800 rounded-lg p-4 mb-6">
            <div class="relative">
                <i data-feather="search" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                <input
                    type="text"
                    id="searchInput"
                    placeholder="Search courses..."
                    class="w-full bg-gray-700 text-white rounded-lg pl-10 pr-4 py-2 border border-gray-600 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
        </div>

        <div class="overflow-x-auto rounded-lg">
            <table class="min-w-full divide-y divide-gray-700">
                <?php extract($info) ?>
                <thead class="bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Teacher Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Course Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Course Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Caegory</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Created At</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-800 divide-y divide-gray-700">
                    <?php foreach ($courses as $course):
                        extract($course) ?>
                        <tr class="search-row hover:bg-gray-700 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300 text-left"><?= $full_name ?></td>
                            <td class="title px-6 py-4 whitespace-nowrap text-sm text-gray-300 text-left">
                                <form action="/course/details" method="POST">
                                    <input type="hidden" name="course_id" value="<?= $course_id ?>">
                                    <input type="hidden" name="course_type" value="<?= $course_type ?>">
                                    <button type="submit"><?= $course_title ?></button>
                                </form>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-left">
                                <span class="px-2 py-1 text-xs font-medium rounded-full text-green-300 bg-green-900 <?php if ($course_type === "Video"): ?> bg-yellow-900 text-yellow-300 <?php endif; ?>"><?= $course_type ?></span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300 text-left"><?= $category ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300 text-left"><?= $created_at ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                <div class="flex gap-3">
                                    <form action="/dashboard/courses/session" class="removeForm" method="POST">
                                        <input type="hidden" name="course_id" id="course_id" value="<?= $course_id ?>">
                                        <input type="hidden" name="course_type" id="course_type" value="<?= $course_type ?>">
                                        <button type="submit" value="delete" class="text-gray-400 hover:text-red-400 transition-colors">
                                            <i data-feather="trash-2" class="w-5 h-5"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</div>

<script>
    function ajaxRequest(action, course_id, target_element, route, course_type) {
        $.ajax({
            url: route,
            type: 'POST',
            contentType: "application/json",
            data: JSON.stringify({
                action: action,
                course_id: course_id,
                course_type: course_type,
            }),
            success: function(Response) {
                target_element.remove();
                $('.success-p').html(Response);
            },
            error: function() {
                $('.error-p').html("Something went wrong, Try again");
            }
        })
    }

    $(document).ready(function() {
        $('#searchInput').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('.search-row').each(function() {
                const title = $(this).find('.title').text().toLowerCase();
                $(this).toggle(title.includes(searchTerm));
            });
        });

        $(".removeForm").on('submit', function(e) {
            e.preventDefault();
            const course_id = $(document.activeElement).closest('form').find('#course_id').val();
            const course_type = $(document.activeElement).closest('form').find('#course_type').val();
            const target_element = $(document.activeElement).closest('tr');
            const route = $(document.activeElement).closest('form').attr("action");

            ajaxRequest("delete", course_id, target_element, route, course_type);
        });

    });
</script>

<?php include __DIR__ . "/../partial/footer.view.php" ?>