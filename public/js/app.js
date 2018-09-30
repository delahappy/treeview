$(document).ready(function () {
    $('#addTreeModal').on('shown.bs.modal', function () {
        $('#newTreeName').val('');
        $('#newTreeName').trigger('focus');
    });

    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    $('#addTreeButton').click(function () {
        var validationMessages = [];
        if($('#newTreeName').val().trim().length === 0) {
            validationMessages.push("Please provide a tree name.")
        }
        if(validationMessages.length > 0) {
            var message = '';
            for(var i = 0; i < validationMessages.length; i++) {
                message += validationMessages[i] + '\n';
            }
            alert(message);
        } else {
            $.ajax({
                url: '/api/tree',
                type: 'post',
                dataType: 'json',
                data: $('#addTreeForm').serialize(),
                success: function (data) {
                    $('#addTreeModal').modal('toggle');
                }
            });
        }
    });
});

$(document).on('click', '.tree-link', function() {
    var id = $(this).attr('target');
    $.ajax({
        url: '/tree/' + id,
        type: 'get',
        success: function (data) {
            $('#treeViewArea').html(data);
        }
    });
});

$(document).on('click', '#addFactoryButton', function() {
    var validationMessages = [];
    if($('#newFactoryName').val().trim().length === 0) {
        validationMessages.push("Please provide a factory name.")
    }
    if(validationMessages.length > 0) {
        var message = '';
        for(var i = 0; i < validationMessages.length; i++) {
            message += validationMessages[i] + '\n';
        }
        alert(message);
    } else {
        $.ajax({
            url: '/api/factory',
            type: 'post',
            dataType: 'json',
            data: $('#addFactoryForm').serialize(),
            success: function (data) {
                $('#addFactoryModal').modal('toggle');
            }
        });
    }
});

$(document).on('click', '#updateFactoryButton', function() {
    var id = $(this).attr('target');
    var validationMessages = [];
    if($('#updateFactoryName').val().trim().length === 0) {
        validationMessages.push("Please provide a factory name.")
    }
    if(validationMessages.length > 0) {
        var message = '';
        for(var i = 0; i < validationMessages.length; i++) {
            message += validationMessages[i] + '\n';
        }
        alert(message);
    } else {
        $.ajax({
            url: '/api/factory/' + id,
            type: 'put',
            dataType: 'json',
            data: $('#updateFactoryForm').serialize(),
            success: function (data) {
                $('#updateFactoryModal').modal('toggle');
            }
        });
    }
});

$(document).on('click', '.delete-factory-button', function() {
    var id = $(this).attr('target');
    $.ajax({
       url: '/api/factory/' + id,
       type: 'delete'
    });
});

$(document).on('show.bs.modal', '#updateFactoryModal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.attr('target');
    $.ajax({
        url: '/api/factory/' + id,
        type: 'get',
        success: function(data, modal) {
            var modal = $('#updateFactoryModal');
            modal.find('#updateFactoryName').val(data.name);
            modal.find('#updateFactoryFactoryId').val(data.id);
            modal.find('#updateFactoryNumberOfChildren').val(data.number_of_children);
            modal.find('#updateFactoryLowerBounds').val(data.lower_bound);
            modal.find('#updateFactoryUpperBounds').val(data.upper_bound);
            modal.find('#updateFactoryButton').attr('target', data.id);
        }
    });
});

$(document).on('show.bs.modal', '#addFactoryModal', function (event) {
    var modal = $('#addFactoryModal');
    modal.find('#newFactoryName').val('');
    modal.find('#numberofNewFactoryChildren').val('');
    modal.find('#newFactoryLowerBounds').val('');
    modal.find('#newFactoryUpperBounds').val('');
});