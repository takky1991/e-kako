@if (Session::has('success'))
    <script>
    	swal({
    		type: "success",
    		title: "OK",
			text: "{{ Session::get('success') }}",
			timer: 2000
		})
    </script>
@endif
@if (Session::has('error'))
    <script>
    	swal({
    		type: "error",
    		title: "ERROR",
			text: "{{ Session::get('error') }}",
			timer: 5000
		})
    </script>
@endif