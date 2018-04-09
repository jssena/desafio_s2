 $(function() {
    $('.iframe').fancybox({
            padding:0,
            margin:10,
            autoSize   : true,
            autoHeight : true,
            autoWidht:true,
            width  : '100%',
            fitToView  :false,
            aspectRatio :true,
            'type'              : 'iframe',
            helpers : {
            title   : {
                type: 'over'
            }}

        });
    $("#meuprojeto_uploadbundle_files_url" ).change(function( event ) {
        console.log('teste');
        alert( "Handler for .change() called." );
        $(this).parent().parent().addClass("active");
        
    });
}); 
 