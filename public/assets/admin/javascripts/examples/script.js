
$.validate({
    lang: 'en'
});

$(document).ready(function(){

    $('body').on('change','#brandstatus', function(){
        var id=$(this).attr('data-id');
            if(this.checked)
            {
                var status=1;
            }
            else
            {
                var status=0;
            }

            $.ajax({
                url:'brandstatus/'+id+'/'+status,
                method:'get',
                success:function(result){
                    console.log(result);
                }
            });

        });



});


$(document).ready(function(){

    $('body').on('change','#categorystatus', function(){
        var id=$(this).attr('data-id');
            if(this.checked)
            {
                var status=1;
            }
            else
            {
                var status=0;
            }

            $.ajax({
                url:'categorystatus/'+id+'/'+status,
                method:'get',
                success:function(result){
                    console.log(result);
                }
            });

        });


});




