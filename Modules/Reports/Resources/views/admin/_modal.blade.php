<div class="modal fade" id="report-period" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Change Report Period</h4>
            </div>
            <div class="modal-body">
                {!! form_start($form) !!}
                <div class="form-body">
                    <div class="alert alert-info">
                        use the form below to select the period you want to view stats for
                    </div>
                    {!! form_rest($form) !!}
                </div>
                <div class="form-actions" style="margin-top:30px; margin-bottom:30px;">
                    <button type="submit" class="btn btn-primary">
                        Change <i class="m-icon-swapright m-icon-white"></i>
                    </button>
                    <button type="button" data-dismiss="modal" class="btn btn-default btn-outline">Close
                    </button>
                </div>
                {!! form_end($form,false) !!}
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>