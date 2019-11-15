@section('main-footer')
    <div class="page-footer pull-right">
        <div class="page-footer-inner">
            2016 &copy; {{config('myapp.website_name')}}
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    @show
<!--[if lt IE 9]>
    <script src="{{asset('assets/admin/global/plugins/respond.min.js')}}"></script>
    <script src="{{asset('assets/admin/global/plugins/excanvas.min.js')}}'"></script>
    <![endif]-->
    <script src="{{asset('assets/admin/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/global/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/global/plugins/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/global/plugins/bootstrap/js/bootstrap.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/admin/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/admin/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/admin/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/global/plugins/jquery.cokie.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/global/plugins/uniform/jquery.uniform.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/admin/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/admin/global/plugins/bootstrap-toastr/toastr.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/admin/global/plugins/icheck/icheck.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"
            type="text/javascript"></script>

    <script type="text/javascript"
            src="{{asset('assets/admin/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript"
            src="{{asset('assets/admin/global/plugins/jquery-validation/js/additional-methods.min.js')}}"></script>

    <script src="{{asset('assets/admin/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/admin/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}"
            type="text/javascript"></script>

    <script src="{{asset('assets/admin/global/plugins/ckeditor/ckeditor.js')}}" type="text/javascript"></script>


    <script src="{{asset('assets/admin/global/scripts/metronic.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/global/scripts/custom.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/global/layout.js')}}" type="text/javascript"></script>

    <script>

        jQuery(document).ready(function () {
            Metronic.init(); // init metronic core componets
            Layout.init(); // init layout
            //Layout.initUniform();
            $('#form-validate').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                invalidHandler: function (event, validator) { //display error alert on form submit
                    toastr.error('Please fix the highlighted errors before you submit the form');
                },
                highlight: function (element) { // hightlight error inputs
                    $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
                },
                unhighlight: function (element) { // revert the change done by hightlight
                    $(element).closest('.form-group').removeClass('has-error'); // set error class to the control group
                }
            });
            toastr.options = {
                "closeButton": true,
                "positionClass": "toast-bottom-right"
            };

            @if (count($errors) > 0)
                toastr.error('<h4>Please fix the errors below:</h4>{!! \HTML::ul($errors->all()) !!}')
            @endif


            @if (session()->has('success'))
                toastr.success('{!! session('success') !!}');
            @endif

            @if (session()->has('error'))
                toastr.error('{!! session('error') !!}');
            @endif


            $('.date-picker').datepicker({format: 'yyyy-mm-dd', 'autoclose': true});


            $('.wysihtml5').wysihtml5({
                "stylesheets": ["{{asset('assets/admin/global/plugins/bootstrap-wysihtml5/wysiwyg-color.css')}}"]
            });

            function toggleParentId(val) {
                if (val > 0) {
                    $('.toggle-parent-input').slideUp();
                } else {
                    $('.toggle-parent-input').slideDown();
                }
            }
            let parent_id = $('#parent_id');
            toggleParentId(parent_id.value);
            parent_id.on('change',function(){
                toggleParentId(this.value);

            });

            $('.jsSelectAllInGroup').on('click', function (event) {
                event.preventDefault();
                $('.check-list').find('input[type=checkbox]').each(function (index, value) {
                    $(this).checked = true;
                });
            });
            $('.jsDeselectAllInGroup').on('click', function (event) {
                event.preventDefault();
                $(this).closest('.permissionGroup').find('input[type=checkbox]').each(function (index, value) {
                    $(this).prop('checked', false);
                });

            });

        });
    </script>

