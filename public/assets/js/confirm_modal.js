var ConfirmModal = function(title, message, options) {

    if (typeof options != 'undefined') {
        if (options.hasOwnProperty('action')) {
            this.action = options.action;
        }
        else {
            this.action = window.location.href;
        }

        if (options.hasOwnProperty('method')) {
            this.method = options.method;
        }
        else {
            this.method = "POST";
        }
    }
    // Create root div and set it's attributes
    var root = document.createElement('div');
    $(root).addClass('modal fade');
    $(root).attr({
        id: 'confirmation-modal',
        role: 'modal',
        tabindex: '-1'
    });

    var form = document.createElement('form');
    $(form).attr({
        role: 'form',
        method: 'post',
        'accept-charset': 'UTF-8',
        action: this.action
    });

    var token = document.createElement('input');
    $(token).attr({
        type: 'hidden',
        value: '{{ csrf_token() }}',
        name: '_token'
    });

    var method = document.createElement('input');
    $(method).attr({
        type: 'hidden',
        value: this.method,
        name: '_method'
    });

    form.appendChild(token);
    form.appendChild(method);
    root.appendChild(form);

    var secondDiv = document.createElement('div');
    $(secondDiv).addClass('modal-dialog');
    $(secondDiv).attr('role', 'document');

    var thirdDiv = document.createElement('div');
    $(thirdDiv).addClass('modal-content');

    var headerDiv = document.createElement('div');
    $(headerDiv).addClass('modal-header');

    // Link all the elements we've created thus far
    thirdDiv.appendChild(headerDiv);
    secondDiv.appendChild(thirdDiv);
    form.appendChild(secondDiv);

    var closeButton = document.createElement('button');
    $(closeButton).addClass('close');
    $(closeButton).attr({
        type: 'button',
        'data-dismiss': 'modal',
        'aria-label': "Close"
    });
    $(closeButton).html('<span aria-hidden="true">&times;</span>');

    var heading = document.createElement('h4');
    $(heading).addClass('modal-title');
    $(heading).html(title);

    // Link close button and the title heading to the header div
    headerDiv.appendChild(closeButton);
    headerDiv.appendChild(heading);

    // Build modal body
    var bodyDiv = document.createElement('div');
    $(bodyDiv).addClass('modal-body');
    $(bodyDiv).append('<p>' + message + '</p>');

    // Attach body div
    thirdDiv.appendChild(bodyDiv);

    // Build footer div
    var footerDiv = document.createElement('div');
    $(footerDiv).addClass('modal-footer');

    // Build cancel button
    var cancelButton = document.createElement('button');
    $(cancelButton).attr({
        type: 'button',
        'class': 'btn btn-sm btn-warning',
        'data-dismiss': 'modal'
    });
    $(cancelButton).text("Cancel");

    // Build confirm button
    var confirmButton = document.createElement('input');
    $(confirmButton).attr({
        type: 'submit',
        'class': 'btn btn-sm btn-success',
        value: 'OK'
    });

    // Append cancel/confirm buttons
    footerDiv.appendChild(cancelButton);
    footerDiv.appendChild(confirmButton);

    // Attach footer
    thirdDiv.appendChild(footerDiv);

    // Store root element
    this.html = root;
};

ConfirmModal.prototype.show = function() {
    $(this.html).modal('show');
};

ConfirmModal.prototype.hide = function() {
    $(this.html).modal('hide');
};