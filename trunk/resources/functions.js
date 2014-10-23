
 $(document).ready(function(){ //cuando el html fue cargado al iniciar

    //añado la posibilidad de editar al presionar sobre edit
    $('.edit').live('click',function(){
        //this = es el elemento sobre el que se hizo click en este caso el link
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-id');
        //preparo los parametros
        params={};
        params.id=id;
        params.action="editar";
        $('#popupbox').load('horarios.php', params,function(){
            $('#block').show();
            $('#popupbox').show();
        })

    })

    $('.delete').live('click',function(){
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-id');
        //preparo los parametros
        params={};
        params.id=id;
        params.action="borrar";
        $('#popupbox').load('horarios.php', params,function(){
            $('#content').load('horarios.php',{action:"refrescarGrilla"});
        })

    })

    $('#new').live('click',function(){
        alert(document.title);
		params={};
        params.action="nuevo";
        $('#popupbox').load('horarios.php', params,function(){
            $('#block').show();
            $('#popupbox').show();
        })
    })


    $('#horario').live('submit',function(){
		var params={};
        params.action='grabar';
        params.Id=$('#Id').val();
        params.IdCarrera=$('#IdCarrera').val();
        params.IdDia=$('#IdDia').val();
        params.IdAsignatura=$('#IdAsignatura').val();
        params.IdModulo=$('#IdModulo').val();
        params.Inicio=$('#Inicio').val();
        params.Fin=$('#Fin').val();

        $.post('horarios.php',params,function(){
            $('#block').hide();
            $('#popupbox').hide();
            $('#content').load('horarios.php',{action:"refrescarGrilla"});
        })
        return false;
    })


    // boton cancelar, uso live en lugar de bind para que tome cualquier boton
    // nuevo que pueda aparecer
    $('#cancel').live('click',function(){
        $('#block').hide();
        $('#popupbox').hide();
    })


})

NS={};
