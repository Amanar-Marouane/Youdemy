<body class="bg-gray-900 text-gray-100 select-none">
    <header>
        <nav class="fixed w-full z-20 top-0 start-0 bg-gray-900 border-b border-gray-800">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="#" class="flex items-center space-x-3">
                    <span class="self-center text-2xl font-semibold text-indigo-500">Youdemy</span>
                </a>
                <div class="flex md:order-2 space-x-3">
                    <?php if (!isset($_SESSION['user_id'])): ?>
                        <a href="/auth" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get started</a>
                    <?php else: ?>
                        <a href="/logout" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Log Out</a>
                    <?php endif; ?>
                    <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-400 rounded-lg md:hidden hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border rounded-lg md:space-x-8 md:flex-row md:mt-0 md:border-0 bg-gray-800 md:bg-gray-900 border-gray-700">
                        <li>
                            <a href="/home" class="<?php if ("home" === getURI()): ?>text-white<?php else: ?> text-gray-300 <?php endif; ?> block py-2 px-3 rounded hover:bg-gray-700 md:hover:bg-transparent md:hover:text-indigo-500 md:p-0">Home</a>
                        </li>
                        <li>
                            <a href="/courses/1" class="<?php if ("courses" === getURI()): ?>text-white<?php else: ?> text-gray-300 <?php endif; ?> block py-2 px-3 rounded hover:bg-gray-700 md:hover:bg-transparent md:hover:text-indigo-500 md:p-0">Courses</a>
                        </li>
                        <li>
                            <a href="#" class="<?php if ("#" === getURI()): ?>text-white<?php else: ?> text-gray-300 <?php endif; ?> block py-2 px-3 rounded hover:bg-gray-700 md:hover:bg-transparent md:hover:text-indigo-500 md:p-0">Categories</a>
                        </li>
                        <li>
                            <a href="#" class="<?php if ("#" === getURI()): ?>text-white<?php else: ?> text-gray-300 <?php endif; ?> block py-2 px-3 rounded hover:bg-gray-700 md:hover:bg-transparent md:hover:text-indigo-500 md:p-0">Teachers</a>
                        </li>
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <li>
                                <a href="/profile" class="<?php if ("profile" === getURI()): ?>text-white<?php else: ?> text-gray-300 <?php endif; ?> block py-2 px-3 rounded hover:bg-gray-700 md:hover:bg-transparent md:hover:text-indigo-500 md:p-0">Profile</a>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['user_id']) && $_SESSION['acc_type'] === "Admin"): ?>
                            <li>
                                <a href="/admin/accounts" class="<?php if ("dashboard/accounts" === getURI()): ?>text-white<?php else: ?> text-gray-300 <?php endif; ?> block py-2 px-3 rounded hover:bg-gray-700 md:hover:bg-transparent md:hover:text-indigo-500 md:p-0">Dashboard</a>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['user_id']) && $_SESSION['acc_type'] === "Teacher"): ?>
                            <li>
                                <a href="/teacher/courses" class="<?php if ("teacher/courses" === getURI()): ?>text-white<?php else: ?> text-gray-300 <?php endif; ?> block py-2 px-3 rounded hover:bg-gray-700 md:hover:bg-transparent md:hover:text-indigo-500 md:p-0">Dashboard</a>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['user_id']) && $_SESSION['acc_type'] === "Student"): ?>
                            <li>
                                <a href="/MyCourses" class="<?php if ("teacher/courses" === getURI()): ?>text-white<?php else: ?> text-gray-300 <?php endif; ?> block py-2 px-3 rounded hover:bg-gray-700 md:hover:bg-transparent md:hover:text-indigo-500 md:p-0">My Courses</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <p class="bg-red-900 text-red-300 text-xs font-medium  rounded top-0 z-30 absolute w-full text-center error-p">
            <?= $_SESSION['error']; ?>
            <?php unset($_SESSION['error']); ?>
        </p>
        <p class="bg-green-900 text-green-300 text-xs font-medium  rounded top-0 z-30 absolute w-full text-center success-p">
            <?= $_SESSION['success']; ?>
            <?php unset($_SESSION['success']); ?>
        </p>
    </header>