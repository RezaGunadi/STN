document.addEventListener('DOMContentLoaded', function () {
    const toast = window.toastData;

    if (toast) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: toast.timer || 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        Toast.fire({
            icon: toast.icon || 'success',
            title: toast.title || 'Success!',
            text: toast.message,
            background: toast.background || '#28a745',
            color: toast.color || '#ffffff'
        });
    }
}); 