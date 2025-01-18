<?php include __DIR__ . "/partial/header.view.php" ?>
<?php include __DIR__ . "/partial/nav.view.php" ?>

<div class="min-h-[90vh] flex items-start py-32 sm:py-48 lg:py-20 text-center html">
    <?php include __DIR__ . "/partial/dashboardSideBar.view.php" ?>

    <main class="flex-1 p-6">
        <?php extract($overview) ?>
        <section class="max-w-9xl mx-auto space-y-6 mt-5">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-white flex items-center gap-2">
                    <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    Category Management
                </h1>
            </div>
            <div class="bg-gray-800 p-4 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-indigo-500">Total Categories</h3>
                <p class="text-3xl font-bold text-red-300"><?= $total_categories ?></p>
            </div>
            <div class="bg-gray-800 rounded-lg p-6">
                <h2 class="text-lg font-semibold text-white mb-4">Add New Category</h2>
                <form class="space-y-4 addingForm" action="/dashboard/categories/add" method="POST">
                    <div>
                        <label for="category_name" class="block text-sm font-medium text-gray-300">Category Name</label>
                        <div class="mt-1 flex gap-4">
                            <input
                                type="text"
                                id="category_name"
                                name="category_name"
                                class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                                placeholder="Enter category name">
                            <button
                                type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                                Add Category
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="bg-gray-800 rounded-lg overflow-hidden">
                <div class="p-4 border-b border-gray-700">
                    <h2 class="text-lg font-semibold text-white">Existing Categories</h2>
                </div>
                <div class="p-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <?php foreach ($categories as $category):
                            extract($category) ?>
                            <div class="bg-gray-700 rounded-lg p-4 flex justify-between items-center category">
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                    <span class="text-white"><?= $category ?></span>
                                </div>
                                <form action="/dashboard/categories/delete" class="deleteForm">
                                    <input type="hidden" name="category_id" id="category_id" value="<?= $category_id ?>">
                                    <button type="submit" class="text-red-400 hover:text-red-300 focus:outline-none">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<?php include __DIR__ . "/partial/footer.view.php" ?>

<script>
    function ajaxRequest(content, target_element, route) {
        $.ajax({
            url: route,
            type: 'POST',
            contentType: "application/json",
            data: JSON.stringify({
                content: content,
            }),
            success: function(Response) {
                if (target_element) target_element.remove();
                $(".error-p").html(Response);
            },
            error: function() {
                $('.error-p').html("Something went wrong, Try again");
            }
        })
    }

    $(document).ready(function() {
        $(".deleteForm").on('submit', function(e) {
            e.preventDefault();

            const user_id = $(document.activeElement).closest('form').find('#category_id').val();
            const target_element = $(document.activeElement).closest('.category');
            const route = $(document.activeElement).closest('form').attr("action");

            ajaxRequest(user_id, target_element, route);
        })
    });
</script>