@if (session('success'))
  <script>
    $(document).ready(function() {
              Swal.fire({
                  icon: 'success',
                  title: 'Success!',
                  text: "{{ session('success') }}",
                  showConfirmButton: false,
                  timer: 2000 // Adjust as needed
              });
          });
  </script>
@endif