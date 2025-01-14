<?php include __DIR__ . "/partial/header.view.php" ?>

<body class="bg-gray-900 text-gray-100 min-h-screen flex flex-col items-center justify-center">
    <div class="container mx-auto px-4 h-full">
        <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-4/12">
                <div class="form-container relative h-[500px]">
                    <div class="login-form bg-gray-800 border border-gray-700 rounded-lg p-8 shadow-xl">
                        <div class="text-center mb-8">
                            <h1 class="text-2xl font-bold bg-gradient-to-r from-indigo-500 to-purple-500 text-transparent bg-clip-text">Welcome Back to Youdemy</h1>
                            <p class="text-gray-400 mt-2">Sign in to continue learning</p>
                        </div>
                        <form>
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                                <input type="email" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            </div>
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                                <div class="relative">
                                    <input type="password" class="password-input w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                    <button type="button" class="toggle-password absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                                Sign In
                            </button>
                        </form>
                        <p class="text-center mt-6 text-gray-400">
                            Don't have an account?
                            <button class="toggle-form text-indigo-500 hover:text-indigo-400 font-medium">Register</button>
                            Or
                            <a href="/home"><button class="toggle-form text-indigo-500 hover:text-indigo-400 font-medium">Get Back Home</button></a>
                        </p>
                    </div>

                    <div class="register-form bg-gray-800 border border-gray-700 rounded-lg p-8 shadow-xl">
                        <div class="text-center mb-8">
                            <h1 class="text-2xl font-bold bg-gradient-to-r from-indigo-500 to-purple-500 text-transparent bg-clip-text">Join Youdemy</h1>
                            <p class="text-gray-400 mt-2">Create your account</p>
                        </div>
                        <form>
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-300 mb-2">Full Name</label>
                                <input type="text" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            </div>
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                                <input type="email" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            </div>
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-300 mb-2">Account Type</label>
                                <select class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                    <option value="student">Student</option>
                                    <option value="teacher">Teacher</option>
                                </select>
                            </div>
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                                <div class="relative">
                                    <input type="password" class="password-input w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                    <button type="button" class="toggle-password absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                                Create Account
                            </button>
                        </form>
                        <p class="text-center mt-6 text-gray-400">
                            Already have an account?
                            <button class="toggle-form text-indigo-500 hover:text-indigo-400 font-medium">Sign In</button>
                            Or
                            <a href="/home"><button class="toggle-form text-indigo-500 hover:text-indigo-400 font-medium">Get Back Home</button></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.toggle-form').click(function() {
                $('.form-container').toggleClass('flip');
            });

            $('.toggle-password').click(function() {
                const passwordInput = $(this).siblings('.password-input');
                const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
                passwordInput.attr('type', type);

                $(this).toggleClass('text-indigo-500');
            });
        });
    </script>
</body>

</html>