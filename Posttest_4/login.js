document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();
            
            const username = document.getElementById('username');
            const nama = document.getElementById('nama');
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            
            let isValid = true;
            
            if (!username.value) {
                username.classList.add('error-input');
                username.nextElementSibling.style.display = 'block';
                isValid = false;
            } else {
                username.classList.remove('error-input');
                username.nextElementSibling.style.display = 'none';
            }
            
            if (!nama.value) {
                nama.classList.add('error-input');
                nama.nextElementSibling.style.display = 'block';
                isValid = false;
            } else {
                nama.classList.remove('error-input');
                nama.nextElementSibling.style.display = 'none';
            }
            
            if (!email.value) {
                email.classList.add('error-input');
                email.nextElementSibling.style.display = 'block';
                isValid = false;
            } else {
                email.classList.remove('error-input');
                email.nextElementSibling.style.display = 'none';
            }
            
            if (!password.value) {
                password.classList.add('error-input');
                password.nextElementSibling.style.display = 'block';
                isValid = false;
            } else {
                password.classList.remove('error-input');
                password.nextElementSibling.style.display = 'none';
            }
            
            if (isValid) {
                loginForm.submit();
            }
        });
    }
});