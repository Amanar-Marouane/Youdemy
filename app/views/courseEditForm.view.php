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
                        <input value="<?= $current_course_title ?>" type="text" id="courseTitle" name="course_title" required
                            class="w-full bg-gray-700 text-white rounded-lg px-4 py-2 border border-gray-600 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Course Description</label>
                        <textarea id="courseDesc" name="course_desc" rows="4" required
                            class="w-full bg-gray-700 text-white rounded-lg px-4 py-2 border border-gray-600 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"><?= $current_course_desc ?></textarea>
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
                        <input value="<?= $current_course_content ?>" type="url" id="courseContent" name="course_content" required
                            class="w-full bg-gray-700 text-white rounded-lg px-4 py-2 border border-gray-600 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Category</label>
                        <select id="categoryId" name="category_id" required
                            class="w-full bg-gray-700 text-white rounded-lg px-4 py-2 border border-gray-600 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option disabled>-- Select Category --</option>
                            <?php foreach ($categories as $category):
                                extract($category) ?>
                                <option value="<?= $category_id ?>" <?php if ($current_category === $category): ?> selected <?php endif; ?>><?= $category ?></option>
                            <?php endforeach; ?>
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
                                        <input type="checkbox" <?php if (in_array($tag_id, array_column($course_tags, "tag_id"))): ?> checked <?php endif; ?> id="<?= $tag_id ?>" name="tags[]" value="<?= $tag_id ?>"
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

        const urlInput = `
            <input value="<?= $current_course_content ?>" type="url" id="courseContent" name="course_content" required
                class="w-full bg-gray-700 text-white rounded-lg px-4 py-2 border border-gray-600 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
        `;

        const fileInput = `
            <input type="file" id="courseContent" name="course_content" accept=".pdf,video/*" required
                class="block w-full text-sm text-gray-300
                       file:mr-4 file:py-2 file:px-4
                       file:rounded-lg file:border-0
                       file:text-sm file:font-medium
                       file:bg-indigo-600 file:text-white
                       file:cursor-pointer
                       hover:file:bg-indigo-700
                       bg-gray-700 rounded-lg
                       border border-gray-600
                       focus:outline-none focus:ring-2 
                       focus:ring-indigo-500 focus:border-indigo-500">
        `;

        $('#courseType').on('change', function() {
            const contentWrapper = $('#courseContent').parent();
            if ($(this).val() === 'Video') {
                $('#courseContent').replaceWith(urlInput);
            } else if ($(this).val() === 'Document') {
                $('#courseContent').replaceWith(fileInput);
            }
        });
        let contentWrapper = $('#courseContent').parent();
        if ($('#courseType').val() === 'Video') {
            $('#courseContent').replaceWith(urlInput);
        } else if ($('#courseType').val() === 'Document') {
            $('#courseContent').replaceWith(fileInput);
        }
    });
</script>