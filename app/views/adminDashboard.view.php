<?php include __DIR__ . "/partial/header.view.php" ?>
<?php include __DIR__ . "/partial/nav.view.php" ?>

<div class="min-h-[90vh] flex items-start py-32 sm:py-48 lg:py-20 text-center">
    <aside class="w-64 bg-gray-800 rounded-lg shadow-lg">
        <nav class="p-4">
            <ul class="space-y-2">
                <li>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-300 rounded-lg bg-indigo-600 hover:bg-indigo-500 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span>Account Management</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        <span>Course Management</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        <span>Analytics</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>


    <main class="flex-1 p-6">
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-gray-800 p-4 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-indigo-500">Total Courses</h3>
                <p class="text-3xl font-bold text-red-300">1,250</p>
            </div>

            <div class="bg-gray-800 p-4 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-indigo-500">Total Users</h3>
                <p class="text-3xl font-bold text-green-300">500</p>
            </div>

            <div class="bg-gray-800 p-4 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-indigo-500">Pending Accounts</h3>
                <p class="text-3xl font-bold text-yellow-300">75</p>
            </div>

            <div class="bg-gray-800 p-4 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-indigo-500">Total Teachers</h3>
                <p class="text-3xl font-bold text-blue-300">5,400</p>
            </div>

            <div class="bg-gray-800 p-4 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-indigo-500">Total Students</h3>
                <p class="text-3xl font-bold text-red-300">50,400</p>
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
                        <tbody>
                            <tr class="border-b border-gray-700">
                                <td class="px-4 py-3">John Doe</td>
                                <td class="px-4 py-3">john.doe@example.com</td>
                                <td class="px-4 py-3">Jan 15, 2024</td>
                                <td class="px-4 py-3">
                                    <span class="bg-amber-900 text-amber-300 text-xs font-medium px-2.5 py-0.5 rounded">Pending</span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex gap-2">
                                        <button class="px-3 py-1 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Approve</button>
                                        <button class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Reject</button>
                                    </div>
                                </td>
                            </tr>
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
                            <tr class="border-b border-gray-700">
                                <td class="px-4 py-3">Sarah Smith</td>
                                <td class="px-4 py-3">sarah.smith@example.com</td>
                                <td class="px-4 py-3">Teacher</td>
                                <td class="px-4 py-3">Jan 10, 2024</td>
                                <td class="px-4 py-3">
                                    <span class="bg-red-900 text-red-300 text-xs font-medium px-2.5 py-0.5 rounded">Suspended</span>
                                </td>
                                <td class="px-4 py-3">
                                    <button class="px-3 py-1 bg-green-600 text-white rounded-md hover:bg-green-700">Reactivate</button>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-700">
                                <td class="px-4 py-3">Mike Johnson</td>
                                <td class="px-4 py-3">mike.j@example.com</td>
                                <td class="px-4 py-3">Student</td>
                                <td class="px-4 py-3">Jan 12, 2024</td>
                                <td class="px-4 py-3">
                                    <span class="bg-red-900 text-red-300 text-xs font-medium px-2.5 py-0.5 rounded">Suspended</span>
                                </td>
                                <td class="px-4 py-3">
                                    <button class="px-3 py-1 bg-green-600 text-white rounded-md hover:bg-green-700">Reactivate</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</div>

<?php include __DIR__ . "/partial/footer.view.php" ?>