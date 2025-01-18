<?php include __DIR__ . "/partial/header.view.php" ?>

<body class="bg-gray-900 text-gray-100 min-h-screen flex flex-col items-center justify-center select-none">
    <p class="bg-red-900 text-red-300 text-xs font-medium  rounded top-0 z-30 absolute w-full text-center error-p">
        <?= $_SESSION['error']; ?>
        <?php unset($_SESSION['error']); ?>
    </p>
    <p class="bg-green-900 text-green-300 text-xs font-medium  rounded top-0 z-30 absolute w-full text-center success-p">
        <?= $_SESSION['success']; ?>
        <?php unset($_SESSION['success']); ?>
    </p>
    <div class="container mx-auto px-4 h-full">
        <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-4/12">
                <div class="form-container relative h-[500px]">
                    <div class="login-form bg-gray-800 border border-gray-700 rounded-lg p-8 shadow-xl">
                        <div class="text-center mb-8">
                            <h1 class="text-2xl font-bold bg-gradient-to-r from-indigo-500 to-purple-500 text-transparent bg-clip-text">Welcome Back to Youdemy</h1>
                            <p class="text-gray-400 mt-2">Sign in to continue learning</p>
                            <p class="error-message0 mt-1 text-sm text-red-500">
                            </p>
                        </div>
                        <form class="signinForm" method="POST" action="/auth/login">
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                                <input type="text" name="email" id="email0" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                <p class="error-email0 mt-1 text-sm text-red-500">
                                </p>
                            </div>
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                                <div class="relative">
                                    <input type="password" name="password" id="password0" class="password-input w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                    <button type="button" class="toggle-password absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                </div>
                                <p class="error-password0 mt-1 text-sm text-red-500">
                                </p>
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
                            <p class="error-message1 mt-1 text-sm text-red-500">
                            </p>
                        </div>
                        <form method="POST" action="/auth/register" class="registerForm">
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-300 mb-2">Full Name</label>
                                <input type="text" name="fullname" id="fullname" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                <p class="error-fullname mt-1 text-sm text-red-500">
                                </p>
                            </div>
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                                <input type="text" name="email" id="email1" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                <p class="error-email1 mt-1 text-sm text-red-500">
                                </p>
                            </div>
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-300 mb-2">Account Type</label>
                                <select name="acc_type" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                    <option value="Student">Student</option>
                                    <option value="Teacher">Teacher</option>
                                </select>
                            </div>
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                                <div class="relative">
                                    <input type="password" name="password" id="password1" class="password-input w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                    <button type="button" class="toggle-password absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                </div>
                                <p class="error-password1 mt-1 text-sm text-red-500">
                                </p>
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

        let registerForm = document.querySelector(".registerForm");
        let signinForm = document.querySelector(".signinForm");
        let error_message0 = document.querySelector(".error-message0");
        let error_message1 = document.querySelector(".error-message1");
        let error_fullname = document.querySelector(".error-fullname");
        const fullNameRegex = /^[A-Za-z]{2,50}(?: [A-Za-z]+)*$/;
        let fullnameInput = document.querySelector("#fullname");
        const emailRegex = /^[a-zA-Z0-9]+([._+-][a-zA-Z0-9]+)*@[a-zA-Z0-9-]+\.[a-zA-Z]{2,6}$/;
        let error_email0 = document.querySelector(".error-email0");
        let error_email1 = document.querySelector(".error-email1");
        let emailInput0 = document.querySelector("#email0");
        let emailInput1 = document.querySelector("#email1");
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}$/;
        let error_password0 = document.querySelector(".error-password0");
        let error_password1 = document.querySelector(".error-password1");
        let passwordInput0 = document.querySelector("#password0");
        let passwordInput1 = document.querySelector("#password1");


        function is_empty(form, error_message) {
            let empty = false;
            error_message.innerHTML = "";

            form.querySelectorAll("input").forEach(e => {
                e.classList.remove("border-red-500", "focus:ring-red-500");
                e.classList.add("focus:ring-indigo-500", "border-gray-600");

                if (e.value.trim() === "") {
                    empty = true;
                    e.classList.add("border-red-500", "focus:ring-red-500", "bg-gray-700");
                    e.classList.remove("focus:ring-indigo-500", "border-gray-600");
                }
            });

            if (empty) {
                error_message.innerHTML = "All the inputs should be filled!";
            }

            return empty;
        }

        function validateFullname(fullnameInput, error_message) {
            const value = fullnameInput.value.trim();
            error_message.innerHTML = "";

            if (!fullNameRegex.test(value)) {
                error_message.innerHTML = "Full name should only include alphabets and spaces and at least 4 chars long!";
                fullnameInput.classList.add("border-red-500", "focus:ring-red-500");
                fullnameInput.classList.remove("focus:ring-indigo-500", "border-gray-600");
                return false;
            } else {
                fullnameInput.classList.remove("border-red-500", "focus:ring-red-500");
                fullnameInput.classList.add("focus:ring-indigo-500", "border-gray-600");
            }

            return true;
        }

        function validateEmail(emailInput, error_message) {
            const value = emailInput.value.trim();
            error_message.innerHTML = "";

            if (!emailRegex.test(value)) {
                error_message.innerHTML = "Please enter a valid email address 'user@domain.com'!";
                emailInput.classList.add("border-red-500", "focus:ring-red-500");
                emailInput.classList.remove("focus:ring-indigo-500", "border-gray-600");
                return false;
            } else {
                emailInput.classList.remove("border-red-500", "focus:ring-red-500");
                emailInput.classList.add("focus:ring-indigo-500", "border-gray-600");
            }

            return true;
        }

        function validatePassword(passwordInput, error_message) {
            const value = passwordInput.value.trim();
            error_message.innerHTML = "";

            if (!passwordRegex.test(value)) {
                error_message.innerHTML = "Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character (!@#$%^&*)!";
                passwordInput.classList.add("border-red-500", "focus:ring-red-500");
                passwordInput.classList.remove("focus:ring-indigo-500", "border-gray-600");
                return false;
            } else {
                passwordInput.classList.remove("border-red-500", "focus:ring-red-500");
                passwordInput.classList.add("focus:ring-indigo-500", "border-gray-600");
            }

            return true;
        }

        registerForm.addEventListener("submit", (event) => {
            let hasEmptyFields = is_empty(registerForm, error_message1);
            let isFullnameValid = validateFullname(fullnameInput, error_fullname);
            let isEmailValid = validateEmail(emailInput1, error_email1);
            let isPasswordValid = validatePassword(passwordInput1, error_password1);

            if (hasEmptyFields || !isFullnameValid || !isEmailValid || !isPasswordValid) {
                event.preventDefault();
            }
        });

        signinForm.addEventListener("submit", (event) => {
            let hasEmptyFields = is_empty(signinForm, error_message0);
            let isEmailValid = validateEmail(emailInput0, error_email0);
            let isPasswordValid = validatePassword(passwordInput0, error_password0);

            if (hasEmptyFields || !isEmailValid || !isPasswordValid) {
                event.preventDefault();
            }
        })
    </script>
</body>

</html>