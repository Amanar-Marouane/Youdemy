<aside class="w-64 bg-gray-800 rounded-lg shadow-lg">
    <nav class="p-4">
        <ul class="space-y-2">
            <li>
                <a href="/admin/accounts" class="<?php if ("admin/accounts" === getURI()): ?> bg-indigo-600 hover:bg-indigo-500 <?php else: ?> hover:bg-gray-700 <?php endif; ?> flex items-center gap-3 px-4 py-3 text-gray-300 rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span>Account Management</span>
                </a>
            </li>
            <li>
                <a href="/admin/courses" class="<?php if ("admin/courses" === getURI()): ?> bg-indigo-600 hover:bg-indigo-500 <?php else: ?> hover:bg-gray-700 <?php endif; ?>flex items-center gap-3 px-4 py-3 text-gray-300 rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <span>Course Management</span>
                </a>
            </li>
            <li>
                <a href="/admin/analytics" class="<?php if ("admin/analytics" === getURI()): ?> bg-indigo-600 hover:bg-indigo-500 <?php else: ?> hover:bg-gray-700 <?php endif; ?>flex items-center gap-3 px-4 py-3 text-gray-300 rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    <span>Analytics</span>
                </a>
            </li>
            <li>
                <a href="/admin/categories" class="<?php if ("admin/categories" === getURI()): ?> bg-indigo-600 hover:bg-indigo-500 <?php else: ?> hover:bg-gray-700 <?php endif; ?>flex items-center gap-3 px-4 py-3 text-gray-300 rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 10H7C9 10 10 9 10 7V5C10 3 9 2 7 2H5C3 2 2 3 2 5V7C2 9 3 10 5 10Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M17 22H19C21 22 22 21 22 19V17C22 15 21 14 19 14H17C15 14 14 15 14 17V19C14 21 15 22 17 22Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>Categories</span>
                </a>
            </li>
            <li>
                <a href="/admin/tags" class="<?php if ("admin/tags" === getURI()): ?> bg-indigo-600 hover:bg-indigo-500 <?php else: ?> hover:bg-gray-700 <?php endif; ?> flex items-center gap-3 px-4 py-3 text-gray-300 rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.5 3H11.5118C12.2455 3 12.6124 3 12.9577 3.08289C13.2638 3.15638 13.5564 3.27759 13.8249 3.44208C14.1276 3.6276 14.387 3.88703 14.9059 4.40589L20.5 10M7.5498 10.0498H7.5598M9.51178 6H8.3C6.61984 6 5.77976 6 5.13803 6.32698C4.57354 6.6146 4.1146 7.07354 3.82698 7.63803C3.5 8.27976 3.5 9.11984 3.5 10.8V12.0118C3.5 12.7455 3.5 13.1124 3.58289 13.4577C3.65638 13.7638 3.77759 14.0564 3.94208 14.3249C4.1276 14.6276 4.38703 14.887 4.90589 15.4059L8.10589 18.6059C9.29394 19.7939 9.88796 20.388 10.5729 20.6105C11.1755 20.8063 11.8245 20.8063 12.4271 20.6105C13.112 20.388 13.7061 19.7939 14.8941 18.6059L16.1059 17.3941C17.2939 16.2061 17.888 15.612 18.1105 14.9271C18.3063 14.3245 18.3063 13.6755 18.1105 13.0729C17.888 12.388 17.2939 11.7939 16.1059 10.6059L12.9059 7.40589C12.387 6.88703 12.1276 6.6276 11.8249 6.44208C11.5564 6.27759 11.2638 6.15638 10.9577 6.08289C10.6124 6 10.2455 6 9.51178 6ZM8.0498 10.0498C8.0498 10.3259 7.82595 10.5498 7.5498 10.5498C7.27366 10.5498 7.0498 10.3259 7.0498 10.0498C7.0498 9.77366 7.27366 9.5498 7.5498 9.5498C7.82595 9.5498 8.0498 9.77366 8.0498 10.0498Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>Tags</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>