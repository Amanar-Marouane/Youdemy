<?php include __DIR__ . "/../partial/header.view.php" ?>
<?php include __DIR__ . "/../partial/nav.view.php" ?>

<div class="min-h-[85vh] bg-gray-900 py-12 px-4 sm:px-6 lg:px-8 relative mt-10">
    <div class="max-w-7xl mx-auto">
        <?php if (empty($courses)): ?>
            <div class="min-h-[85vh] flex flex-col items-center justify-center bg-gray-900 px-4">
                <div class="text-center">
                    <i data-feather="book-open" class="w-16 h-16 text-gray-600 mb-4 mx-auto"></i>
                    <h3 class="text-xl font-semibold text-white mb-2">No Courses Found</h3>
                    <p class="text-gray-400 mb-6">You haven't enrolled in any courses yet.</p>
                    <a href="/courses" class="inline-flex items-center space-x-2 bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg transition-colors">
                        <i data-feather="search" class="w-4 h-4"></i>
                        <span>Browse Courses</span>
                    </a>
                </div>
            </div>
        <?php else: ?>
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-white">My Courses</h1>
                <p class="mt-2 text-gray-400">Track your learning progress across all enrolled courses</p>
            </div>
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
                    } ?>
                    <div class="bg-gray-800 rounded-lg shadow-xl overflow-hidden">
                        <div class="aspect-video bg-gray-700">
                            <img src="<?= $thumbnailUrl ?>" class="bg-cover w-full h-full">
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-xl font-semibold text-white"><?= $course_title ?></h3>
                            </div>
                            <div class="flex items-center text-gray-400 text-sm mb-4">
                                <i data-feather="user" class="w-4 h-4 mr-2"></i>
                                <span><?= $full_name ?></span>
                            </div>
                            <form action="/course/details" method="POST">
                                <input type="hidden" name="course_id" value="<?= $course_id ?>">
                                <input type="hidden" name="course_type" value="<?= $course_type ?>">
                                <button type="submit" class="block w-full text-center bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition-colors">Continue Learning</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            </div>
    </div>
</div>

<?php include __DIR__ . "/../partial/footer.view.php" ?>