<aside class="w-64 bg-gray-800 rounded-lg shadow-lg">
    <nav class="p-4">
        <ul class="space-y-2">
            <li>
                <a href="/teacher/courses" class="<?php if ("teacher/courses" === getURI()): ?>bg-indigo-600 hover:bg-indigo-500 <?php else: ?> hover:bg-gray-700 <?php endif; ?>flex items-center gap-3 px-4 py-3 text-gray-300 rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <span>Course Management</span>
                </a>
            </li>
            <li>
                <a href="#" class="<?php if ("#" === getURI()): ?>bg-indigo-600 hover:bg-indigo-500<?php else: ?> hover:bg-gray-700 <?php endif; ?>flex items-center gap-3 px-4 py-3 text-gray-300 rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    <span>Analytics</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>