$(document).ready(function () {
    $('#addTreeButton').click(function () {
        if($('#newTreeName').val().trim().length === 0) {
            alert("Please provide a tree name.");
        } else {
            $.ajax({
                url: '/api/tree',
                type: 'post',
                dataType: 'json',
                data: $('#addTreeForm').serialize(),
                success: function (data) {
                    alert(data.name);
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
    if($('#newFactoryName').val().trim().length === 0) {
        alert("Please provide a factory name.");
    } else {
        $.ajax({
            url: '/api/factory',
            type: 'post',
            dataType: 'json',
            data: $('#addFactoryForm').serialize(),
            success: function (data) {
                alert(data.name);
                $('#addFactoryModal').modal('toggle');
            }
        });
    }
});