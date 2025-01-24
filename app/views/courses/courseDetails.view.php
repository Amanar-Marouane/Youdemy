<?php include __DIR__ . "/../partial/header.view.php" ?>
<?php include __DIR__ . "/../partial/nav.view.php" ?>
<?php extract($courseInfo) ?>

<div class="min-h-screen bg-gray-900 py-12 px-4 pb-0 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto bg-gray-800 rounded-lg shadow-xl">
        <div class="p-8">
            <h1 class="text-3xl font-bold text-white mb-2"><?= htmlspecialchars($course_title) ?></h1>

            <div class="flex items-center space-x-4 text-gray-400 mb-6">
                <div class="flex items-center">
                    <i data-feather="user" class="w-4 h-4 mr-2"></i>
                    <span><?= htmlspecialchars($full_name) ?></span>
                </div>
                <div class="flex items-center">
                    <i data-feather="calendar" class="w-4 h-4 mr-2"></i>
                    <span><?= htmlspecialchars($created_at) ?></span>
                </div>
            </div>

            <p class="text-gray-300 leading-relaxed mb-8">
                <?= nl2br(htmlspecialchars($course_desc)) ?>
            </p>
        </div>

        <div class="border-t border-gray-700">
            <?php if ($course_type === 'Document'): ?>
                <div class="w-full h-full aspect-[16/9] bg-gray-900">

                    <object
                        data="/assets/<?= basename($course_content) ?>"
                        type="application/pdf"
                        class="w-full h-full">
                        <embed
                            src="/assets/<?= basename($course_content) ?>"
                            type="application/pdf"
                            class="w-full h-full" />
                        <p class="text-white p-4">It appears you don't have a PDF plugin for this browser. You can <a href="/assets/<?= basename($course_content) ?>" class="text-blue-400 hover:text-blue-300">click here to download the PDF file.</a></p>
                    </object>
                </div>
            <?php endif; ?>

            <?php if ($course_type === 'Video'): ?>
                <div class="w-full aspect-[16/9] bg-gray-900">
                    <iframe
                        src="<?= $course_content ?>"
                        class="w-full h-full"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            <?php endif; ?>
        </div>

        <div class="p-8 border-t border-gray-700">
            <div class="flex flex-wrap gap-2">
                <?php foreach ($tags as $tag):
                    extract($tag) ?>
                    <span class="px-3 py-1 bg-indigo-600 text-white text-sm rounded-full">
                        <?= htmlspecialchars($tag_content) ?>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>

        <?php if ($_SESSION['acc_type'] === "Student"): ?>
            <div class="p-8 border-t border-gray-700">
                <?php if (!$isEnrolled): ?>
                    <form action="/course/enroll" method="POST">
                        <input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION['user_id'] ?>">
                        <input type="hidden" id="course_id" name="course_id" value="<?= $course_id ?>">
                        <button
                            type="submit"
                            class="enrollForm w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-4 rounded-lg transition-colors flex items-center justify-center space-x-2">
                            <i data-feather="book-open" class="w-5 h-5"></i>
                            <span class="courseStatus">Enroll in This Course</span>
                        </button>
                    </form>
                <?php else: ?>
                    <form action="/course/unenroll" method="POST">
                        <input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION['user_id'] ?>">
                        <input type="hidden" id="course_id" name="course_id" value="<?= $course_id ?>">
                        <button
                            type="submit"
                            class="enrollForm w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-4 rounded-lg transition-colors flex items-center justify-center space-x-2">
                            <i data-feather="book-open" class="w-5 h-5"></i>
                            <span class="courseStatus">Cancel your enrollement</span>
                        </button>
                    </form>
                <?php endif; ?>
                <p class="text-gray-400 text-sm text-center mt-4">
                    Join 253 other students learning this course
                </p>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        feather.replace();

        function ajaxRequest(user_id, course_id, route) {
            $.ajax({
                url: route,
                type: 'POST',
                contentType: "application/json",
                data: JSON.stringify({
                    user_id: user_id,
                    course_id: course_id,
                }),
                success: function(Response) {
                    location.reload();
                },
                error: function() {
                    $('.error-p').html("Something went wrong, Try again");
                }
            })
        }

        $(document).on('submit', function(e) {
            e.preventDefault();

            const user_id = $(document.activeElement).closest('form').find('#user_id').val();
            const course_id = $(document.activeElement).closest('form').find('#course_id').val();
            const route = $(document.activeElement).closest('form').attr("action");

            ajaxRequest(user_id, course_id, route);
        })
    });
</script>

<?php include __DIR__ . "/../partial/footer.view.php" ?>