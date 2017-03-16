$(function () {

    $(window).load(function(){
        setTimeout(function(){
            $("body").addClass("loaded");
            setTimeout(function(){
                countdown();
            }, 2000);
        }, 3000);
    });

    $(".optionFavorite").click(function(){

        console.log($(this).data('id'));

        function addToPlaylist() {
            var values = {
                id: $(this).data('id')
            };
            $.ajax({
                url: "Voeg-Toe-Favorieten.php",
                type: "POST",
                data: values,
                beforeSend: console.log('wachten....'),
                success: function(){
                    console.log('verstuurd!');
                }
            });

        }

    });

});


function countdown() {
    document.getElementById('option1').style.backgroundColor = '#d1232a';
    document.getElementById('option1').style.color = '#e7ea83';
    document.getElementById('option1').className += " active";
    var speak = document.getElementById('option1').textContent;
    responsiveVoice.speak(speak, "Dutch Female");

    var amountElements = 1;
    var counting = true;
    var nospeak = false;
    var count = 5;
    var timerId = setInterval(function () {
        count--;

        if (count == 0) {
            if (counting == true) {
                amountElements += 1;
                var elements = document.getElementsByClassName("options");
                var names = '';
                for (var i = 0; i < elements.length; i++) {
                    names = elements[i].id;
                    document.getElementById(names).style.backgroundColor = '#e7ea83';
                    document.getElementById(names).style.color = '#d1232a';
                    document.getElementById(names).className = "options"
                }
                document.getElementById('option' + amountElements).style.backgroundColor = '#d1232a';
                document.getElementById('option' + amountElements).style.color = '#e7ea83';
                document.getElementById('option' + amountElements).className += " active";
                var speak = document.getElementById('option' + amountElements).textContent;
                responsiveVoice.speak(speak, "Dutch Female");
                counting = false;
                counting = true;

                if (amountElements == elements.length) {
                    amountElements = 0;
                }
            }
            count = 5;
        }

        var counting2 = true;
        var count2 = 0;
        var timerId2;

        document.body.onkeyup = function (e) {
            if (e.keyCode == 32) {
                var active = document.getElementsByClassName("active")[0].id;

                if (active == "option1") {
                    window.location.href = "http://localhost/Kiki/laatst-afgespeeld.php";
                } else if (active == "option2") {
                    window.location.href = "http://localhost/Kiki/favorieten.php";
                } else if (active == "option3") {
                    window.location.href = "http://localhost/Kiki/artiesten.php";
                } else if (active == "option4") {
                    window.location.href = "http://localhost/Kiki/nieuwe-muziek.php";
                }
                //window.location.href = "http://project.cmi.hr.nl/2016_2017/mlab1_dfo_t2/concept1/max?q=" + active;
            }
        }

    }, 1000);
}