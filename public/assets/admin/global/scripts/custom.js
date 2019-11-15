/**
 * Load dynamic select field
 *
 * @param existing_field_id
 * @param select_id
 * @param route
 *
 */

var dynamicSelect = function (existing_field_id, select_id, route) {
    $(existing_field_id).change(function () {
        //using plain javascript
        var selectElement = document.querySelector(select_id);
        var optionElement = document.createElement("option");
        $("#localgovernment_id").empty();//jquery
        optionElement.value = "default";
        optionElement.text = "Loading...";
        optionElement.style.color = "red";
        selectElement.add(optionElement, null);
        selectElement.focus();

        $.getJSON(route, {param: $(this).val()}, function (data) {
            //document.write(data);
            var options = '';
            $.each(data, function (key, val) {
                options += '<option value="' + key + '">' + val + '</option>';
            });
            $(selectElement).html(options);
        });

        return false;
    });
};

function getScheduleHTML(index) {
    $('#schedule-holder').append(
        '<div class="panel panel-default">' +
        '<div class="panel-heading">Schedule ' + (index + 1) + '</div>' +
        '<div class="panel-body">' +
        '<div class="row col">' +
            '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<label for="" class="control-label">Name</label>' +
                '<input type="text" class="form-control" name="schedule[' + index + '][name]" required />' +
                '</div>' +
            '</div>' +
            '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<label for="" class="control-label">Location (optional)</label>' +
                '<input type="text" class="form-control" name="schedule[' + index + '][location]" />' +
                '</div>' +
            '</div>' +
            '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<label for="" class="control-label">Others (optional)</label>' +
                '<input type="text" class="form-control" name="schedule[' + index + '][location]" />' +
                '</div>' +
            '</div>' +
            '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<label for="" class="control-label">Start Date (optional)</label>' +
                '<input type="text" class="form-control date-picker" name="schedule[' + index + '][start_date]" />' +
                '</div>' +
            '</div>' +
            '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<label for="" class="control-label">End Date(optional)</label>' +
                '<input type="text" class="form-control date-picker" name="schedule[' + index + '][end_date]" />' +
                '</div>' +
            '</div>' +
        '</div>' +
            // For options of a schedule
        '<div class="row">' +
            '<div class="col-md-6">' +
                '<div class="form-group">' +
                '<label for="" class="control-label">Option</label>' +
                '<input type="text" class="form-control" name="schedule[' + index + '][option][0][name]" required />' +
                '</div>' +
            '</div>' +
            '<div class="col-md-5">' +
                '<div class="form-group">' +
                '<label for="" class="control-label">Price ($)</label>' +
                '<input type="number" class="form-control" name="schedule[' + index + '][option][0][price]" required />' +
                '</div>' +
            '</div>' +
            '<div class="col-md-1">' +
                '<br />' +
                // '<button id="delete" type="button" class="btn btn-danger"><i class="fa fa-remove"></i></button>' +
            '</div>' +
        '</div>' +
        '<div class="more-carier"></div>' +
        '<div class="row">' +
            '<div class="col-md-12 pull-right"><button id="add-option" type="button" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add More Option/Price</button></div>' +
            '</div>' +
        '</div>' +
        '<div class="panel-footer">' +
            '<button id="delete-schedule" type="button" class="btn btn-danger pull-right">Remove schedule</button>' +
            '</div>' +
        '</div>' +

        '</div>'
    )
}
function getOptionHTML(p_parent, preindex, index) {
    p_parent.parent().siblings('.more-carier').append(
        '<div class="option">' +
            '<div class="col-md-6 col-opt">' +
                '<div class="form-group">' +
                    '<label for="" class="control-label">Option</label>' +
                    '<input type="text" class="form-control" name="schedule[' + preindex + '][option][' + index + '][name]" required />' +
                '</div>' +
            '</div>' +
            '<div class="col-md-5">' +
                '<div class="form-group">' +
                    '<label for="" class="control-label">Price ($)</label>' +
                    '<input type="number" class="form-control" name="schedule[' + preindex + '][option][' + index + '][price]" required />' +
                '</div>' +
            '</div>' +
            '<div class="col-md-1">' +
                '<br />' +
                '<button id="delete-option" type="button" class="btn btn-danger"><i class="fa fa-remove"></i></button>' +
            '</div>' +
        '</div>'
    )
}
