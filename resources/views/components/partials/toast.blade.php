<style>
    .toast-close {
        position: relative;
        top: -0.3em;
        right: -0.6em;
        font-size: 0.8em;
    }

    .toast-close:hover {
        cursor: pointer;
        opacity: 1;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @foreach ($errors->all() as $error)
        Toastify({
            text: "{{ $error }}",
            duration: 3000,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            style: {
                background: "#EF4444",
                borderRadius: "0.7rem",
            },
        }).showToast();
        @endforeach

        @if (session()->has('success'))
        Toastify({
            text: "{{ session()->get('success') }}",
            duration: 3000,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            style: {
                background: "#19B9A8",
                borderRadius: "0.7rem",
            },
        }).showToast();
        @endif

        const xButton = document.querySelectorAll('.toast-close');
        xButton.forEach((button) => {
            button.innerText = 'X';
        });
    });
</script>
