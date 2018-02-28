var ControleurAjax = {

    phpcontroller: "./ajax.php?request=",

    init: function () {
        this.addImagesToLibrary();
    },
    // Add next 12 images to library from database
    addImagesToLibrary: function (e) {
        $("#bouton").on("click", function (e) {

            var numFotos = $('#portfolio > div.image').length;
            console.log(numFotos);
//            alert("Dernière image : " + numFotos);
            $.ajax({
                url: ControleurAjax.phpcontroller + "loadImages",
                method: 'GET',
                data: {
                    "last": numFotos
                },
                success: function (data) {
                    console.log(data);
                    if (data == "Error") {
                        alert("Requête corrompue");
                    } else {
                        $("#portfolio").append(data);
                        var numFotos = $('#portfolio > div.image').length;
                        $.ajax({
                            url: ControleurAjax.phpcontroller + "getMaxImages",
                            method: 'GET',
                            success: function (data) {
                                console.log(data);
                                if (data == "Error") {
                                    alert("Requête corrompue");
                                } else { 
                                    if(parseInt(data) == numFotos){
                                        $('#bouton').hide();
                                    }
                        
                                }
                            }
                        });
                    }
                }
            });
        });

    }
};

var controleur = Object.create(ControleurAjax);
controleur.init();
