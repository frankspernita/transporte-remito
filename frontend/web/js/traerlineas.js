$(document).ready(function(){
    $('#opt').on('change', function(){
        var por = $('#por').val();
        if(por == 'O'){
        $.ajax({
            type:'get',
            url: 'index.php?r=facturas-v/lineas',
            dataType: 'json',
            data: {a: $('#opt').val()},
            success: function(res){
                $('#fetchButton').val('');
            },
        });
        }
    });
});
