<?php include __DIR__ . "/partial/header.view.php" ?>
<?php include __DIR__ . "/partial/nav.view.php" ?>

<div class="min-h-screen bg-gray-900 py-12 px-4 sm:px-6 lg:px-8 mt-20">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($courses as $course):
                extract($course);
                if ($course_type === 'Video') {
                    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $course_content, $matches);
                    if (isset($matches[1])) {
                        $videoId = $matches[1];
                        $thumbnailUrl = "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg";
                    } else {
                        $thumbnailUrl = 'https://media.tenor.com/7Y9-DR6rYYIAAAAM/calopsita-video-call.gif';
                    }
                } else {
                    $thumbnailUrl = 'https://media.tenor.com/u1RFpg4SLngAAAAM/travolta-pdf.gif';
                }
            ?>
                <div class="bg-gray-800 rounded-lg shadow-xl overflow-hidden">
                    <div class="aspect-video bg-gray-700">
                        <img src="<?= $thumbnailUrl ?>" class="bg-cover w-full h-full">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-white mb-2"><?= $course_title ?></h3>
                        <div class="flex items-center text-gray-400 text-sm mb-4">
                            <i data-feather="user" class="w-4 h-4 mr-2"></i>
                            <span><?= $full_name ?></span>
                        </div>
                        <p class="text-gray-400 mb-4 line-clamp-2"><?= substr($course_desc, 0, 50) ?></p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-indigo-600 text-white text-xs rounded-full"><?= $course_type ?></span>
                        </div>
                        <form action="/course/details" method="POST">
                            <input type="hidden" name="course_id" value="<?= $course_id ?>">
                            <input type="hidden" name="course_type" value="<?= $course_type ?>">
                            <button type="submit" class="block w-full text-center bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition-colors">View Course</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-12 flex justify-center">
            <nav class="flex items-center space-x-2">
                <?php if ($index != 1): ?>
                    <a href="/courses?<?= $index - 1 ?>" class="px-3 py-2 rounded-lg bg-gray-800 text-gray-400 hover:bg-gray-700">
                        <i data-feather="chevron-left" class="w-5 h-5"></i>
                    </a>
                <?php endif; ?>

                <?php for ($i = $index, $max = 0; $i <= $total_pages && $max < 5; $i++, $max++): ?>
                    <a href="/courses?<?= $i ?>" class="px-4 py-2 rounded-lg bg-indigo-600 text-white"><?= $i ?></a>
                <?php endfor; ?>

                <?php if ($index != $total_pages): ?>
                    <a href="/courses?<?= $index + 1 ?>" class="px-3 py-2 rounded-lg bg-gray-800 text-gray-400 hover:bg-gray-700">
                        <i data-feather="chevron-right" class="w-5 h-5"></i>
                    </a>
                <?php endif; ?>
            </nav>
        </div>
    </div>
</div>

<?php include __DIR__ . "/partial/footer.view.php" ?>