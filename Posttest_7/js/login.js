document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();
            
            const username = document.getElementById('username');
            const nama = document.getElementById('nama');
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const fileInput = document.getElementById('file'); // Tambahkan input file
            
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

            // Validasi untuk file
            if (!fileInput.value) {
                fileInput.classList.add('error-input');
                fileInput.nextElementSibling.style.display = 'block'; // Pesan error
                isValid = false;
            } else {
                fileInput.classList.remove('error-input');
                fileInput.nextElementSibling.style.display = 'none';
            }
            
            if (isValid) {
                loginForm.submit();
            }
        });
    }
});


document.getElementById('file').addEventListener('change', function() {
    const fileName = document.getElementById('file').files[0]?.name || 'Belum ada file yang dipilih';
    document.getElementById('fileName').textContent = fileName;
});


document.getElementById('file').addEventListener('change', function() {
    const fileInput = document.getElementById('file');
    const file = fileInput.files[0];
    const maxSize = 2 * 1024 * 1024; // Batas ukuran maksimal (2MB)

    if (file) {
        // Cek ukuran file
        if (file.size > maxSize) {
            alert('Ukuran file tidak boleh lebih dari 2MB');
            fileInput.value = ''; // Reset input file
            document.getElementById('fileName').textContent = 'Belum ada file yang dipilih';
            return;
        }

        // Dapatkan nama file asli
        const originalFileName = file.name;
        const fileExtension = originalFileName.split('.').pop();

        // Membuat format waktu untuk penamaan file
        const date = new Date();
        const formattedDate = date.toISOString().slice(0, 10); // yyyy-mm-dd
        const formattedTime = date.toTimeString().split(' ')[0].replace(/:/g, '.'); // hh.mm.ss

        const newFileName = `${formattedDate} ${formattedTime}.${fileExtension}`;

        // Tampilkan nama file yang telah diubah
        document.getElementById('fileName').textContent = newFileName;
    } else {
        document.getElementById('fileName').textContent = 'Belum ada file yang dipilih';
    }
});
