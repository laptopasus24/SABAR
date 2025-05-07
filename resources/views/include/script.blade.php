{{-- javascript --}}

<script src="{{asset('template/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('template/assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('template/assets/vendors/apexcharts/apexcharts.js')}}"></script>
<script src="{{asset('template/assets/js/pages/dashboard.js')}}"></script>
<script src="{{asset('template/assets/js/pages/ui-apexchart.js')}}"></script>
<script src="{{asset('template/assets/js/main.js')}}"></script>
{{-- icon mata di password --}}
<script>
    // Fungsi untuk toggle visibilitas password
    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("bi-eye");
            icon.classList.add("bi-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("bi-eye-slash");
            icon.classList.add("bi-eye");
        }
    }

    // Fungsi untuk tampilkan ikon saat fokus
    function setupToggleVisibility(inputId, toggleWrapperId) {
        const input = document.getElementById(inputId);
        const toggleWrapper = document.getElementById(toggleWrapperId);
        const icon = toggleWrapper.querySelector('i');

        input.addEventListener('focus', function () {
            toggleWrapper.style.display = 'inline';
        });

        input.addEventListener('blur', function () {
            if (input.value.length === 0) {
                toggleWrapper.style.display = 'none';
                input.type = 'password';
                icon.classList.remove("bi-eye-slash");
                icon.classList.add("bi-eye");
            }
        });
    }

    // Aktifkan untuk kedua field
    setupToggleVisibility('password', 'toggleWrapper1');
    setupToggleVisibility('password_confirmation', 'toggleWrapper2');
</script>


{{-- icon mata di password --}}

