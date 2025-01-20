<?php include __DIR__ . "/partial/header.view.php" ?>
<?php include __DIR__ . "/partial/nav.view.php" ?>

<div class="min-h-[90vh] flex items-start py-32 sm:py-48 lg:py-20 text-center html">
    <?php include __DIR__ . "/partial/teacherDashboardSideBar.view.php" ?>
    <?php extract($info) ?>
    <?php extract($course_info, EXTR_PREFIX_ALL, "current") ?>

    <div id="modalBackdrop" class="flex items-center justify-center flex-1 text-left">
        <div class="bg-gray-800 rounded-lg w-full max-w-5xl mx-4">
            <div class="flex justify-between items-center p-6 border-b border-gray-700">
                <h2 class="text-xl font-bold text-white">Modify Your Course</h2>
                <button id="closeModal" class="text-gray-400 hover:text-gray-300">
                    <i data-feather="x" class="w-6 h-6"></i>
                </button>
            </div>

            <form id="courseForm" class="p-6" action="/dashboard/courses/update" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="course_id" value="<?= $current_course_id ?>">
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Course Title</label>
                        <input type="text" value="<?= $current_course_title ?>" id="courseTitle" name="course_title" required
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
                            class="w-full bg-gray-700 text-white rounded-lg px-4 py-2 border border-gray-600 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"><?= $current_course_desc ?></textarea>
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
                            <option value="">Select Type</option>
                            <option <?php if ($current_course_type === "Video"): ?> selected <?php endif; ?> value="Video">Video</option>
                            <option <?php if ($current_course_type === "Document"): ?> selected <?php endif; ?> value="Document">Document</option>
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
                            <option disabled>-- Select Category --</option>
                            <?php foreach ($categories as $category):
                                extract($category) ?>
                                <option value="<?= $category_id ?>" <?php if ($current_category === $category): ?> selected <?php endif; ?>><?= $category ?></option>
                            <?php endforeach; ?>
                            <div id="select-error-message" class="text-red-500 text-sm"></div>
                        </select>
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
                                    extract($tag); ?>
                                    <div class="flex items-center">
                                        <input type="checkbox" <?= in_array($tag_id, array_column($course_tags, "tag_id")) ? "checked" : "" ?>
                                            id="<?= $tag_id ?>" name="tags[]" value="<?= $tag_id ?>"
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
                        Update Course
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . "/partial/footer.view.php" ?>

<script>
    $(document).ready(function() {
        feather.replace();

        $('#tagSearch').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('#tagsContainer div').each(function() {
                const tagText = $(this).find('label').text().toLowerCase();
                $(this).toggle(tagText.includes(searchTerm));
            });
        })

        feather.replace();

        $('#tagSearch').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('#tagsContainer div').each(function() {
                const tagText = $(this).find('label').text().toLowerCase();
                $(this).toggle(tagText.includes(searchTerm));
            });
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
                $(".desc-tracker-text").text("You have reached the maximum length");
                $(".desc-tracker").css("color", "red");
            }
        });
        $("#charCount").text(document.querySelector("#courseDesc").value.length);


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
        $("#titleCharCount").text(document.querySelector("#courseTitle").value.length);


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