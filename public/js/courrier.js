function TemporaryAlertMessage(type, content) {

    $("#alert_content").remove();
    $("#main-col").prepend("<span id='alert_content'></span>");

    var HTMLRender = null;
    switch (type) {
        case "warning":
            HTMLRender = "<div class='alert alert-warning alert-dismissible fade show ' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong></strong> " + content + " </div>";
            break;
        case "danger":
            HTMLRender = "<div class='alert alert-danger alert-dismissible fade show ' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong></strong> " + content + " </div>";
            break;
        case "info":
            HTMLRender = "<div class='alert alert-info alert-dismissible fade show ' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong></strong> " + content + " </div>";
            break;
        case "success":
            HTMLRender = "<div class='alert alert-success alert-dismissible fade show ' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong></strong> " + content + " </div>";
            break;

        default:
            break;
    }

	$("#alert_content").html(HTMLRender).delay(4000).fadeOut();;
}


$(document).ready(function() {

    $('#nouveau').click(function(e) {
        e.preventDefault();
        $('#create_courrier').modal({backdrop: 'static', keyboard: false} );
    });

    /**
     * Modification de Courrier
     */
    $("a[name='update']").click(function(e) {
        e.preventDefault();
        let el = $(this);
        $('#update_courrier').modal({backdrop: 'static', keyboard: false} );

        // Get Courrier Datas
        var request = $.ajax({'url': "http://" + window.location.host + "/get_courrier/" +  $(el).attr("slug"),
        'type': "GET",
        'slug': $(el).attr("slug")});

        request.done(function( msg ) {
            $('#update_courrier').modal("hide");
            console.log(msg['status']);
            alert(msg);
            /*if (msg['status'] == 'success') {
            TemporaryAlertMessage(msg['status'], msg['object']);
            }
            else {
            TemporaryAlertMessage(msg['status'], "Erreur survenur durant la suppression du courrier");
            }*/
        });

        request.fail(function( jqXHR, textStatus ) {
            alert("NONN");
            //alert( "Request failed: " + textStatus );
        });

        $("form#update").submit(function(e) {
            e.preventDefault();
            // Trigge Update action
        });

    });



    /**
     * Suppression de Courrier
     */
    $("a[name='delete']").click(function(e) {
        e.preventDefault();
        let el = $(this);
        $('#delete_courrier').modal({backdrop: 'static', keyboard: false} );

        $("#delete_courrier button[name='supprimer']").click(function() {
            var request = $.ajax({'url': "http://" + window.location.host + "/delete/" +  $(el).attr("slug"),
                                'type': "GET",
                                'slug': $(el).attr("slug")});

            request.done(function( msg ) {

                $('#delete_courrier').modal("hide");
                console.log(msg['status']);
                if (msg['status'] == 'success') {
                    $("tr[name='" + $(el).attr("slug") + "']").remove();
                    TemporaryAlertMessage(msg['status'], msg['message']);
                }
                else {
                    TemporaryAlertMessage(msg['status'], "Erreur survenur durant la suppression du courrier");
                }
            });

            request.fail(function( jqXHR, textStatus ) {
                //alert( "Request failed: " + textStatus );
            });
        });
    });


    /**
     * Cotation du Courrier
     */
    $("a[name='cote']").click(function(e) {
        e.preventDefault();
        $('#cote_courrier').modal({backdrop: 'static', keyboard: false} );
    });

    $('#rechercher').click(function(e) {
        e.preventDefault();
        $('#search_courrier').modal({backdrop: 'static', keyboard: false} );

        $('#option_de_recherche').change(function() {
            //alert("iiii");
            var message = "";

            var choix = $(this).val();
            //alert(choix);

            switch (choix) {
                case 'reference':
                    message = "<div class='input-group'><div class='input-group-prepend'></div><input type='text' class='form-control' placeholder='Etrer le Numéro de Référence' aria-label='Username' aria-describedby='basic-addon1'></div>";
                    break;
                case 'periode':
                        message = "<div class='input-group'><div class='input-group-prepend'></div> <label>De</label> <input type='datetime' class='form-control' placeholder='Objet' aria-label='Username' aria-describedby='basic-addon1'> &nbsp; &nbsp; <input type='date' class='form-control' placeholder='Objet' aria-label='Username' aria-describedby='basic-addon1'> </div>";
                break;

                default:
                    break;
            }

            $("#champs").html(message);
        });

    });



    /**
     * Enregistrement de Courrier
     */
    $("#create_courrier").click(function (e) {
        e.preventDefault();
        $("form#create").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            //console.log(formData.values);
            for (var pair of formData.entries()) {

                console.log(pair[0]+ ', ' + pair[1]);
            }
            //window.location.host + "/new"
            var request = $.ajax({'url': "http://" + window.location.host + "/new",
                                'type': "GET",
                                'data': []});

            request.done(function( msg ) {

                //alert("success");
                //var rsp = JSON.parse(msg);
                //alert(rsp);
                //console.log(msg);
                //return msg;
            });

            request.fail(function( jqXHR, textStatus ) {
                alert( "Request failed: " + textStatus );
            });

            request.always(function( jqXHR, textStatus) {
                if (console && console.log) {
                    //console.log( "Request Status Result : " + textStatus );
                }
            });

        });
    });
});

