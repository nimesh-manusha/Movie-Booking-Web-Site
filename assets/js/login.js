document.getElementById('password-eye').addEventListener('click', function() {
    const passwordInput = document.getElementById('password');
    const passwordEyeIcon = this.querySelector('i');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordEyeIcon.classList.remove('ri-eye-line');
        passwordEyeIcon.classList.add('ri-eye-off-line');
    } else {
        passwordInput.type = 'password';
        passwordEyeIcon.classList.remove('ri-eye-off-line');
        passwordEyeIcon.classList.add('ri-eye-line');
    }
});


