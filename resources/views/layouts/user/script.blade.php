<!-- All JavaScript files
    ================================================== -->
    <script src="{{ asset('user/js/jquery.min.js') }}"></script>
    <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>

    <!-- Plugins for this template -->
    <script src="{{ asset('user/js/jquery-plugin-collection.js') }}"></script>
    <script src="{{ asset('user/js/jquery.mCustomScrollbar.js') }}"></script>

    <!-- Custom script for this template -->
    <script src="{{ asset('user/js/script.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  $('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This Order will be permanently deleted',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
</script>