<div class="modal fade" id="add-supervisor-modal" role="modal" tabindex="-1" aria-labelledby="AddSupervisorModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Add Supervisor</h4>
            </div>
            <div class="modal-body">
                @include('drives.partials.forms.add_supervisor')
                <div class="alert alert-danger modal-errors" id="add-supervisor-modal-errors">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <div></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <input id="addSupervisorButton" type="submit" value="Add Supervisor" class="btn btn-success" />
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function() {
       $('#addSupervisorButton').on("click", function(e) {
           e.preventDefault();

           var form = $('#add-supervisor-form');

           $.ajax({
               url: "{{ route('supervisors.store') }}",
               method: 'post',
               data: $(form).serialize(),
               beforeSend: function() {

                   // Fade the error's alert box out
                   $('#add-supervisor-modal-errors').fadeOut(400, function() {

                       // Remove any error messages
                       $(this).children('div:first').html(null);
                   });
               },
               success: function(data) {
                   // Reset the form
                   $(form)[0].reset();

                   // Close modal
                   $('#add-supervisor-modal').modal('hide');

                   // Flash success message to screen
                   var message = buildFlashMessage('<p>Supervisor successfully added!</p>', 'success');
                   $('main').append(message)
                   $('#flash-message').css({position: 'fixed', bottom: '20px'}).fadeIn(500).delay(5000).fadeOut(500, function() {
                       this.remove();
                   });

                   // Insert newly created supervisor into list
                   var option = '<option value="' + data['id'] + '" selected>' + data['value'] + '</option>';
                   $('#supervisor_list').append(option);

               },
               error: function (jqXHR) {
                   var response = $.parseJSON(jqXHR.responseText);

                   var errorsList = document.createElement('ul');
                   for (var key in response) {
                       var prettyText = $('label[for="' + key + '"]').text().replace('*', '');

                       if (response[key].length > 1) {
                           var li = document.createElement('li');
                           li.innerHTML = '<strong>' + prettyText + '</strong>';

                           var ul = document.createElement('ul');
                           for(var i = 0; i < response[key].length; i++) {
                               ul.append('<li>' + response[key][i] + '</li>');
                           }

                           li.append(ul);

                           $(errorsList).append(li);
                       }
                       else if (response[key].length === 1) {
                           $(errorsList).append('<li><strong>' + prettyText + ": </strong>" + response[key][0]);
                       }
                   }

                   $('#add-supervisor-modal-errors').fadeIn(400, function() {
                       $(this).children('div:first').append(errorsList);
                   });
               }
           });
       });
    });
</script>
<style>
    .modal-errors {
        display: none;
    }
</style>