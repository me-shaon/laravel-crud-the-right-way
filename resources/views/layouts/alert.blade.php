@if(session('success'))
    <script>
        $(document).ready(function() {
            Toastify({
                text: '{{session('success')}}',
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
                onClick: function(){} // Callback after click
            }).showToast();
        });
    </script>
@endif

@if(session('error'))
    <script>
        $(document).ready(function() {
            Toastify({
                text: '{{session('error')}}',
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                },
                onClick: function(){} // Callback after click
            }).showToast();
        });
    </script>
@endif
