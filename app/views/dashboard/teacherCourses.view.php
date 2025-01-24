<?php include __DIR__ . "/../partial/header.view.php" ?>
<?php include __DIR__ . "/../partial/nav.view.php" ?>

<div class="min-h-[90vh] flex items-start py-32 sm:py-48 lg:py-20 text-center html">
    <?php include __DIR__ . "/../partial/teacherDashboardSideBar.view.php" ?>

    <main class="flex-1 p-6">
        <div class="flex justify-between items-center mb-8 text-left">
            <h1 class="text-3xl font-bold text-gray-50">My Courses</h1>
            <button id="addCourseBtn" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-colors">
                <i data-feather="plus" class="w-5 h-5"></i>
                New Course
            </button>
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
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300 text-left">
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
                                        <button type="submit" name="action" value="edit" class="text-gray-400 hover:text-indigo-400 transition-colors">
                                            <i data-feather="edit-2" class="w-5 h-5"></i>
                                        </button>
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
    $(document).ready(function() {
        $('#searchInput').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('.search-row').each(function() {
                const title = $(this).find('td:first').text().toLowerCase();
                $(this).toggle(title.includes(searchTerm));
            });
        });

        $('#addCourseBtn').click(function() {
            $('#modalBackdrop').removeClass('hidden');
        });

        function closeAndClearModal() {
            $('#modalBackdrop').addClass('hidden');
            $('#courseForm')[0].reset();
        }

        $('#closeModal').click(closeAndClearModal);

        $('#modalBackdrop').click(function(e) {
            if (e.target === this) {
                closeAndClearModal();
            }
        });

        $('#tagSearch').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('#tagsContainer div').each(function() {
                const tagText = $(this).find('label').text().toLowerCase();
                $(this).toggle(tagText.includes(searchTerm));
            });
        })

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

        $(".removeForm").on('submit', function(e) {
            const action = $(document.activeElement).val();
            if (action === "delete") {
                e.preventDefault();
            }
            const course_id = $(document.activeElement).closest('form').find('#course_id').val();
            const course_type = $(document.activeElement).closest('form').find('#course_type').val();
            const target_element = $(document.activeElement).closest('tr');
            const route = $(document.activeElement).closest('form').attr("action");

            ajaxRequest(action, course_id, target_element, route, course_type);
        });

        $('#courseType').on('change', function() {
            if ($('#courseType').val() === 'Document') {
                $('#courseContentFile').show();
                $('#courseContentUrl').hide();
            } else if ($('#courseType').val() === 'Video') {
                $('#courseContentUrl').show();
                $('#courseContentFile').hide();
            }
        });

        if ($('#courseType').val() === 'Document') {
            $('#courseContentFile').show();
            $('#courseContentUrl').hide();
        } else if ($('#courseType').val() === 'Video') {
            $('#courseContentUrl').show();
            $('#courseContentFile').hide();
        }

        $("#courseDesc").on('focus', function() {
            $(".desc-tracker").css("visibility", "visible");
        });

        $("#courseDesc").on('blur', function() {
            $(".desc-tracker").css("visibility", "hidden");
        });

        $("#courseDesc").on('input', function(e) {
            let count = e.target.value.length;
            $("#charCount").text(count);
            $(".desc-tracker-text").text("");
            $(".desc-tracker").css("color", "#9ca3af");

            if (count >= 3000) {
                e.target.value = e.target.value.slice(0, 3000);
                $("#charCount").text(e.target.value.length);
                $(".desc-tracker-text").text("You have reached the maximum length");
                $(".desc-tracker").css("color", "red");
            }
        });

        $("#courseTitle").on('focus', function() {
            $(".title-tracker").css("visibility", "visible");
        });

        $("#courseTitle").on('blur', function() {
            $(".title-tracker").css("visibility", "hidden");
        });

        $("#courseTitle").on('input', function(e) {
            let count = e.target.value.length;
            $("#titleCharCount").text(count);
            $(".title-tracker-text").text("");
            $(".title-tracker").css("color", "#9ca3af");

            if (count >= 255) {
                e.target.value = e.target.value.slice(0, 255);
                $("#titleCharCount").text(e.target.value.length);
                $(".title-tracker-text").text("You have reached the maximum length");
                $(".title-tracker").css("color", "red");
            }
        });

        const regex = /[<>$&'";%(){}[\]\\/|^`]/g;

        $('#courseForm').on("submit", function(e) {
            let error = false;
            $("#description-error-message").text("");
            $("#title-error-message").text("");
            if (regex.test($("#courseDesc").val())) {
                $("#description-error-message").text("Special characters are not allowed.");
                error = true;
            }
            if (regex.test($("#courseTitle").val())) {
                $("#title-error-message").text("Special characters are not allowed.");
                error = true;
            }

            const selectedOption = $('#categories').prop('selectedIndex');
            if (selectedOption === 0) {
                $("#select-error-message").text("Please select an option.");
                error = true;
            }

            if (error) {
                e.preventDefault();
            }
        })
    });
</script>

<?php include __DIR__ . "/../partial/footer.view.php" ?>

<div id="modalBackdrop" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-30">
    <div class="bg-gray-800 rounded-lg w-full max-w-2xl mx-4">
        <div class="flex justify-between items-center p-6 border-b border-gray-700">
            <h2 class="text-xl font-bold text-white">Add New Course</h2>
            <button id="closeModal" class="text-gray-400 hover:text-gray-300">
                <i data-feather="x" class="w-6 h-6"></i>
            </button>
        </div>

        <form id="courseForm" class="p-6" action="/teacher/courses/add" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="author_id" value="14">
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Course Title</label>
                    <input type="text" id="courseTitle" name="course_title" required
                        class="w-full bg-gray-700 text-white rounded-lg px-4 py-2 border border-gray-600 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <div class="text-right text-sm text-gray-400 mt-1 title-tracker flex items-center justify-between" style="visibility: hidden;">
                        <span class="title-tracker-text"></span>
                        <span>
                            <span id="titleCharCount">0</span>/255 characters
                        </span>
                    </div>
                    <div id="title-error-message" class="text-red-500 text-sm"></div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Course Description</label>
                    <textarea id="courseDesc" name="course_desc" rows="4" required
                        class="w-full bg-gray-700 text-white rounded-lg px-4 py-2 border border-gray-600 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                    <div class="text-right text-sm text-gray-400 mt-1 desc-tracker flex items-center justify-between" style="visibility: hidden;">
                        <span class="desc-tracker-text"></span>
                        <span>
                            <span id="charCount">0</span>/3000 characters
                        </span>
                    </div>
                    <div id="description-error-message" class="text-red-500 text-sm"></div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Course Type</label>
                    <select id="courseType" name="course_type" required
                        class="w-full bg-gray-700 text-white rounded-lg px-4 py-2 border border-gray-600 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option disabled>-- Select Type --</option>
                        <option value="Video" selected>Video</option>
                        <option value="Document">Document</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Content URL</label>
                    <input type="url" id="courseContentUrl" name="course_content"
                        class="w-full bg-gray-700 text-white rounded-lg px-4 py-2 border border-gray-600 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <input type="file" id="courseContentFile" name="course_content" accept=".pdf,video/*"
                        class="hidden block w-full text-sm text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-indigo-600 file:text-white file:cursor-pointer hover:file:bg-indigo-700 bg-gray-700 rounded-lg border border-gray-600 focus:outline-none focus:ring-2  focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Category</label>
                    <select id="categories" name="category_id" required
                        class="w-full bg-gray-700 text-white rounded-lg px-4 py-2 border border-gray-600 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option disabled selected>-- Select Category --</option>
                        <?php foreach ($categories as $category):
                            extract($category) ?>
                            <option value="<?= $category_id ?>"><?= $category ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div id="select-error-message" class="text-red-500 text-sm"></div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Tags</label>

                    <div class="mb-2">
                        <input type="text"
                            id="tagSearch"
                            placeholder="Search tags..."
                            class="w-full bg-gray-700 text-white rounded-lg px-3 py-1 text-sm border border-gray-600 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div class="bg-gray-700 rounded-lg border border-gray-600 h-32 overflow-y-auto">
                        <div class="p-3 space-y-2" id="tagsContainer">
                            <?php foreach ($tags as $tag):
                                extract($tag) ?>
                                <div class="flex items-center">
                                    <input type="checkbox" id="<?= $tag_id ?>" name="tags[]" value="<?= $tag_id ?>"
                                        class="h-4 w-4 rounded border-gray-500 text-indigo-600 focus:ring-indigo-500 bg-gray-600">
                                    <label for="<?= $tag_id ?>" class="ml-2 text-sm text-gray-300 cursor-pointer"><?= $tag_content ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition-colors">
                    Add Course
                </button>
            </div>
        </form>
    </div>
</div>