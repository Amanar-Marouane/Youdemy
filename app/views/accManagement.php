<?php include __DIR__ . "/partial/header.view.php" ?>
<?php include __DIR__ . "/partial/nav.view.php" ?>

<div class="min-h-[90vh] flex items-start py-32 sm:py-48 lg:py-20 text-center html">
    <?php include __DIR__ . "/partial/dashboardSideBar.view.php" ?>

    <main class="flex-1 p-6">
        <?php extract($overview) ?>
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-gray-800 p-4 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-indigo-500">Total Courses</h3>
                <p class="text-3xl font-bold text-red-300"><?= $total_courses ?></p>
            </div>

            <div class="bg-gray-800 p-4 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-indigo-500">Total Users</h3>
                <p class="text-3xl font-bold text-green-300"><?= $total_users ?></p>
            </div>

            <div class="bg-gray-800 p-4 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-indigo-500">Pending Accounts</h3>
                <p class="text-3xl font-bold text-yellow-300"><?= $total_pending ?></p>
            </div>

            <div class="bg-gray-800 p-4 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-indigo-500">Total Teachers</h3>
                <p class="text-3xl font-bold text-blue-300"><?= $total_teachers ?></p>
            </div>

            <div class="bg-gray-800 p-4 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-indigo-500">Total Students</h3>
                <p class="text-3xl font-bold text-red-300"><?= $total_students ?></p>
            </div>
        </section>

        <section class="space-y-6 mt-5">
            <div class="bg-gray-800 rounded-lg">
                <div class="p-4 border-b border-gray-700">
                    <h2 class="text-xl font-semibold text-white flex items-center gap-2">
                        <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Pending Teacher Approvals
                    </h2>
                </div>
                <div class="p-4 overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-300">
                        <thead class="text-xs uppercase bg-gray-700">
                            <tr>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Join Date</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="pending-table">
                            <?php foreach ($pending_accounts as $acc):
                                extract($acc) ?>
                                <tr class="border-b border-gray-700">
                                    <td class="px-4 py-3"><?= $full_name ?></td>
                                    <td class="px-4 py-3"><?= $email ?></td>
                                    <td class="px-4 py-3"><?= $created_at ?></td>
                                    <td class="px-4 py-3">
                                        <span class="bg-amber-900 text-amber-300 text-xs font-medium px-2.5 py-0.5 rounded">Pending</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex gap-2">
                                            <form id="validationForm" action="/account/validation">
                                                <input type="hidden" id="user_id" value="<?= $user_id ?>">
                                                <button name="action" value="approve" type="submit" class="px-3 py-1 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Approve</button>
                                                <button name="action" value="reject" type="submit" class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Reject</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-gray-800 rounded-lg">
                <div class="p-4 border-b border-gray-700">
                    <h2 class="text-xl font-semibold text-white flex items-center gap-2">
                        <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                        Suspended Accounts
                    </h2>
                </div>
                <div class="p-4 overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-300">
                        <thead class="text-xs uppercase bg-gray-700">
                            <tr>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Type</th>
                                <th class="px-4 py-3">Suspension Date</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sespended_accounts as $acc):
                                extract($acc) ?>
                                <tr class="border-b border-gray-700">
                                    <td class="px-4 py-3"><?= $full_name ?></td>
                                    <td class="px-4 py-3"><?= $email ?></td>
                                    <td class="px-4 py-3"><?= $acc_type ?></td>
                                    <td class="px-4 py-3"><?= $suspension_date ?></td>
                                    <td class="px-4 py-3">
                                        <span class="bg-red-900 text-red-300 text-xs font-medium px-2.5 py-0.5 rounded">Suspended</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <form action="/account/reactivation">
                                            <input type="hidden" id="user_id" value="<?= $user_id ?>">
                                            <button name="action" value="activate" type="submit" class="px-3 py-1 bg-green-600 text-white rounded-md hover:bg-green-700">Reactivate</button>
                                            <button name="action" value="delete" type="submit" class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-gray-800 rounded-lg">
                <div class="p-4 border-b border-gray-700">
                    <h2 class="text-xl font-semibold text-white flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" x="0px" y="0px" viewBox="0 0 48 48">
                            <linearGradient id="HoiJCu43QtshzIrYCxOfCa_VFaz7MkjAiu0_gr1" x1="21.241" x2="3.541" y1="39.241" y2="21.541" gradientUnits="userSpaceOnUse">
                                <stop offset=".108" stop-color="#0d7044"></stop>
                                <stop offset=".433" stop-color="#11945a"></stop>
                            </linearGradient>
                            <path fill="url(#HoiJCu43QtshzIrYCxOfCa_VFaz7MkjAiu0_gr1)" d="M16.599,41.42L1.58,26.401c-0.774-0.774-0.774-2.028,0-2.802l4.019-4.019	c0.774-0.774,2.028-0.774,2.802,0L23.42,34.599c0.774,0.774,0.774,2.028,0,2.802l-4.019,4.019	C18.627,42.193,17.373,42.193,16.599,41.42z"></path>
                            <linearGradient id="HoiJCu43QtshzIrYCxOfCb_VFaz7MkjAiu0_gr2" x1="-15.77" x2="26.403" y1="43.228" y2="43.228" gradientTransform="rotate(134.999 21.287 38.873)" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="#2ac782"></stop>
                                <stop offset="1" stop-color="#21b876"></stop>
                            </linearGradient>
                            <path fill="url(#HoiJCu43QtshzIrYCxOfCb_VFaz7MkjAiu0_gr2)" d="M12.58,34.599L39.599,7.58c0.774-0.774,2.028-0.774,2.802,0l4.019,4.019	c0.774,0.774,0.774,2.028,0,2.802L19.401,41.42c-0.774,0.774-2.028,0.774-2.802,0l-4.019-4.019	C11.807,36.627,11.807,35.373,12.58,34.599z"></path>
                        </svg>
                        Activated Accounts
                    </h2>
                </div>
                <div class="p-4 overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-300">
                        <thead class="text-xs uppercase bg-gray-700">
                            <tr>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Type</th>
                                <th class="px-4 py-3">Join Date</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($activated_accounts as $acc):
                                extract($acc) ?>
                                <tr class="border-b border-gray-700">
                                    <td class="px-4 py-3"><?= $full_name ?></td>
                                    <td class="px-4 py-3"><?= $email ?></td>
                                    <td class="px-4 py-3"><?= $acc_type ?></td>
                                    <td class="px-4 py-3"><?= $created_at ?></td>
                                    <td class="px-4 py-3">
                                        <span class="bg-green-900 text-green-300 text-xs font-medium px-2.5 py-0.5 rounded">Activated</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <form action="/account/suspension">
                                            <input type="hidden" id="user_id" value="<?= $user_id ?>">
                                            <button name="action" value="suspend" type="submit" class="px-3 py-1 bg-red-900 text-white rounded-md hover:bg-red-700">Suspend</button>
                                            <button name="action" value="delete" type="submit" class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</div>

<?php include __DIR__ . "/partial/footer.view.php" ?>

<script>
    function ajaxRequest(action, user_id, target_element, route) {
        $.ajax({
            url: route,
            type: 'POST',
            contentType: "application/json",
            data: JSON.stringify({
                action: action,
                user_id: user_id,
            }),
            success: function() {
                target_element.remove();
            },
            error: function() {
                $('.error-p').html("Something went wrong, Try again");
            }
        })
    }

    $(document).ready(function() {
        $(document).on('submit', function(e) {
            e.preventDefault();

            const action = $(document.activeElement).val();
            const user_id = $(document.activeElement).closest('form').find('#user_id').val();
            const target_element = $(document.activeElement).closest('tr');
            const route = $(document.activeElement).closest('form').attr("action");

            ajaxRequest(action, user_id, target_element, route);
        })
    });
</script>