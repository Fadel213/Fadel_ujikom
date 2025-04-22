document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.querySelector('input[name="password"]');
    const showHide = document.getElementById('showHide');

    if (passwordInput && showHide) {
        showHide.style.cursor = 'pointer';
        showHide.innerHTML = '<i class="bi bi-eye"></i>';

        showHide.addEventListener('click', () => {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                showHide.innerHTML = '<i class="bi bi-eye-slash"></i>';
            } else {
                passwordInput.type = 'password';
                showHide.innerHTML = '<i class="bi bi-eye"></i>';
            }
        });
    }
});