<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="{{ url('assets/less/styles.less') }}" rel="stylesheet/less" media="all"> 
    <script type="text/javascript" src="https://psbyhom.com/assets/js/less.js"></script>
</head>
<body>
@include('layouts.header')
@include('layouts.sidebar')
  
  @yield('content')


@include('layouts.footer')


<script type='text/javascript' src='https://psbyhom.com/assets/js/jquery-1.10.2.min.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/js/jqueryui-1.10.3.min.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/js/bootstrap.min.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/js/enquire.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/js/jquery.cookie.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/js/jquery.nicescroll.min.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/plugins/form-tokenfield/bootstrap-tokenfield.min.js'></script> 

<script type='text/javascript' src='https://psbyhom.com/assets/plugins/codeprettifier/prettify.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/plugins/easypiechart/jquery.easypiechart.min.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/plugins/sparklines/jquery.sparklines.min.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/plugins/form-toggle/toggle.min.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/plugins/form-parsley/parsley.min.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/demo/demo-formvalidation.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/plugins/datatables/jquery.dataTables.min.js'></script> 

<script type='text/javascript' src='https://psbyhom.com/assets/plugins/datatables/dataTables.bootstrap.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/demo/demo-datatables.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/plugins/form-ckeditor/ckeditor.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/plugins/form-jasnyupload/fileinput.min.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/plugins/form-datepicker/js/bootstrap-datepicker.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/plugins/jqueryui-timepicker/jquery.ui.timepicker.min.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/js/placeholdr.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/js/application.js'></script> 

<script type='text/javascript' src='https://psbyhom.com/assets/plugins/form-inputmask/jquery.inputmask.bundle.min.js'></script>
<script type='text/javascript' src='https://psbyhom.com/assets/demo/demo-mask.js'></script>

<script type='text/javascript' src='https://psbyhom.com/assets/plugins/jqueryui-timepicker/jquery.ui.timepicker.min.js'></script>
<!--new javascript src-->
<script type='text/javascript' src='https://psbyhom.com/assets/js/chosen.jquery.js'></script>	

<script type='text/javascript' src='https://psbyhom.com/assets/plugins/jqueryui-timepicker/jquery.ui.timepicker.min.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/plugins/form-daterangepicker/daterangepicker.min.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/plugins/form-datepicker/js/bootstrap-datepicker.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/plugins/form-daterangepicker/moment.min.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/plugins/form-fseditor/jquery.fseditor-min.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/plugins/form-jasnyupload/fileinput.min.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/plugins/form-tokenfield/bootstrap-tokenfield.min.js'></script> 
<script src="https://jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://psbyhom.com/assets/js/timepicker/lib/pikaday.js"></script>
<!-- <script src=">assets/js/timepicker/lib/jquery.ptTimeSelect.js"></script> -->
<script src="https://psbyhom.com/assets/js/timepicker/lib/moment.min.js"></script>
<script src="https://psbyhom.com/assets/js/timepicker/lib/site.js"></script>
<script src="https://psbyhom.com/assets/js/timepicker/dist/datepair.js"></script>
<script src="https://psbyhom.com/assets/js/timepicker/dist/jquery.datepair.js"></script>

<link href="{{ url('assets/plugins/editable/css/bootstrap-editable.css') }}" rel="stylesheet">
<script src="{{ url('assets/plugins/editable/js/bootstrap-editable.js') }}"></script>

<script>
    // initialize input widgets first
    $('#basicExample .time').timepicker({
        'showDuration': true,
        'timeFormat': 'g:ia'
    });

    $('#basicExample .date').datepicker({
        'format': 'm/d/yyyy',
        'autoclose': true
    });

    // initialize datepair
    var basicExampleEl = document.getElementById('basicExample');
    var datepair = new Datepair(basicExampleEl);
</script>

<script src="{{ url('assets/js/accounting.min.js') }}"></script>

@yield('script')

</body>
</html>