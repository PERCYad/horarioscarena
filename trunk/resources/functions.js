
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
        $('#popupbox').load(document.title + '.php', params,function(){
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
        $('#popupbox').load(document.title + '.php', params,function(){
        $('#content').load(document.title + '.php',{action:"refrescarGrilla"});
        })

    })

    $('#new').live('click',function(){
		params={};
        params.action="nuevo";
        $('#popupbox').load(document.title + '.php', params,function(){
            $('#block').show();
            $('#popupbox').show();
        })
    })

    $('#salir').live('click',function(){
        $('#block').hide();
        $('#popupbox').hide();
		history.back();
	})


    $('#asignatura').live('submit',function(){
		var params={};
        params.action='grabar';
        params.Id=$('#Id').val();
        params.IdCarrera=$('#IdCarrera').val();
        params.IdDia=$('#IdDia').val();
        params.IdAsignatura=$('#IdAsignatura').val();
        params.IdModulo=$('#IdModulo').val();
        params.Inicio=$('#Inicio').val();
        params.Fin=$('#Fin').val();

        $.post('asignaturas.php',params,function(){
            $('#block').hide();
            $('#popupbox').hide();
            $('#content').load('asignaturas.php',{action:"refrescarGrilla"});
        })
        return false;
    })

    $('#carrera').live('submit',function(){
		var params={};
        params.action='grabar';
        params.Id=$('#Id').val();
        params.IdCarrera=$('#IdCarrera').val();
        params.IdDia=$('#IdDia').val();
        params.IdAsignatura=$('#IdAsignatura').val();
        params.IdModulo=$('#IdModulo').val();
        params.Inicio=$('#Inicio').val();
        params.Fin=$('#Fin').val();

        $.post('carreras.php',params,function(){
            $('#block').hide();
            $('#popupbox').hide();
            $('#content').load('carreras.php',{action:"refrescarGrilla"});
        })
        return false;
    })


    $('#disponibilidad').live('submit',function(){
		var params={};
        params.action='grabar';
        params.Id=$('#Id').val();
        params.IdCarrera=$('#IdCarrera').val();
        params.IdDia=$('#IdDia').val();
        params.IdAsignatura=$('#IdAsignatura').val();
        params.IdModulo=$('#IdModulo').val();
        params.Inicio=$('#Inicio').val();
        params.Fin=$('#Fin').val();

        $.post('disponibilidades.php',params,function(){
            $('#block').hide();
            $('#popupbox').hide();
            $('#content').load('disponibilidades.php',{action:"refrescarGrilla"});
        })
        return false;
    })


    $('#docente').live('submit',function(){
		var params={};
        params.action='grabar';
        params.Id=$('#Id').val();
        params.IdCarrera=$('#IdCarrera').val();
        params.IdDia=$('#IdDia').val();
        params.IdAsignatura=$('#IdAsignatura').val();
        params.IdModulo=$('#IdModulo').val();
        params.Inicio=$('#Inicio').val();
        params.Fin=$('#Fin').val();

        $.post('docentes.php',params,function(){
            $('#block').hide();
            $('#popupbox').hide();
            $('#content').load('docentes.php',{action:"refrescarGrilla"});
        })
        return false;
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


    $('#modulo').live('submit',function(){
		var params={};
        params.action='grabar';
        params.Id=$('#Id').val();
        params.IdCarrera=$('#IdCarrera').val();
        params.IdDia=$('#IdDia').val();
        params.IdAsignatura=$('#IdAsignatura').val();
        params.IdModulo=$('#IdModulo').val();
        params.Inicio=$('#Inicio').val();
        params.Fin=$('#Fin').val();

        $.post('modulos.php',params,function(){
            $('#block').hide();
            $('#popupbox').hide();
            $('#content').load('modulos.php',{action:"refrescarGrilla"});
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
