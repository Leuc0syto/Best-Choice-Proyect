import './bootstrap';
let showHide = document.getElementById('show-hide');
let passwordInput = document.getElementById('password-input');

showHide.addEventListener('click', function() {
    showHide.classList.toggle('show');

        if (showHide.classList.contains('show')){
            showHide.classList.remove('fa-eye-slash');
            showHide.classList.add('fa-eye');
            passwordInput.classList.setAttribute('type', 'text')
        }
        else {
            showHide.classList.classList('fa-eye-slash');
            showHide.classList.remove('fa-eye');
            passwordInput.setAttribute('type', 'password');
        }
});
