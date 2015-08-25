function buildFlashMessage(body, context) {

    var div = document.createElement('div');
    $(div).addClass('alert alert-dismissible fade in col-md-6 col-md-offset-3');
    $(div).attr('role', 'alert');
    $(div).attr('id', 'flash-message');
    $(div).html('<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
        +  '<span aria-hidden="true">&times;</span></button></div>'
    );

    $(div).append(body);

    switch (context) {
        case 'success': $(div).addClass('alert-success');
            break;
        case 'info': $(div).addClass('alert-info');
            break;
        case 'warning': $(div).addClass('alert-warning');
            break;
        case 'danger': $(div).addClass('alert-danger');
            break;
    }

    return div;
}

