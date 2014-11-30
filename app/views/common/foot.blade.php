
    <!-- Vendors -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>

    <!-- Plugins -->
    <script src="{{ URL::asset('js/plugins/jquery.uniform.min.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/jquery.responsivetables.min.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/jquery.stepy.min.js') }}"></script>

    <!-- Site -->
    <script src="{{ URL::asset('js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/jquery.placeholder.min.js') }}"></script>
    <script src="{{ URL::asset('js/application.js') }}"></script>
	@yield('extra_js')
    <script>
    $(function() {
        /* Twitter Bootstrap Tooltip
        *
        * Link Tooltips
        /*====================================================================*/
        $('[rel="tooltip"]').tooltip({
            placement : 'top'
        });

  
    });
    </script>
</body>
</html>
