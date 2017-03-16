$(function () {

    var back = $(".backBtn");
    var home = $(".homeBtn");

    var wrapper = $(".wrapper");
    var wrapper4 = $(".wrapper4");

    back.appendTo(wrapper4);
    home.appendTo(wrapper4);

    function countdown() {
        document.getElementById('wrapper1').style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
        document.getElementById('wrapper1').style.color = '#e7ea83';
        document.getElementById('wrapper1').className += " active";
        var speak = document.getElementById('wrapper1').textContent;
        //responsiveVoice.speak(speak, "Dutch Female");

        var amountElements = 1;
        var counting = true;
        var nospeak = false;
        var count = 5;
        var number = 0;
        var timerId = setInterval(function () {
            count--;

            if (count == 0) {
                if (counting == true) {
                    amountElements += 1;
                    var elements = document.getElementsByClassName("wrapper");
                    var names = '';
                    for (var i = 0; i < elements.length; i++) {
                        number++;
                        names = elements[i].id;
                        document.getElementById(names).style.backgroundColor = '#8eb3df';
                        document.getElementById(names).style.color = '#d1232a';
                        document.getElementById(names).className = "wrapper wrapper$number";
                        document.getElementById("wrapper4").style.backgroundColor = 'transparant';
                        document.getElementById("wrapper4").style.color = '#e7ea83';
                    }
                    document.getElementById('wrapper' + amountElements).style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
                    document.getElementById('wrapper' + amountElements).style.color = '#e7ea83';
                    document.getElementById('wrapper' + amountElements).className += " active";
                    //var speak = document.getElementById('option' + amountElements).textContent;
                    //responsiveVoice.speak(speak, "Dutch Female");
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
                    count = 0;

                    if (active == "wrapper1") {
                        var begin = "option1";
                        var wrapper = "wrapper1";
                        var amountElements = 1;
                        var elementMax = 5;
                        var first = document.getElementById("option1");
                        var second = document.getElementById("option2");
                        var third = document.getElementById("option3");
                        var fourth = document.getElementById("option4")
                    } else if (active == "wrapper2") {
                        var begin = "option5";
                        var wrapper = "wrapper2";
                        var amountElements = 5;
                        var elementMax = 9;
                        var first = document.getElementById("option5");
                        var second = document.getElementById("option6");
                        var third = document.getElementById("option7");
                        var fourth = document.getElementById("option8")
                    } else if (active == "wrapper3") {
                        var begin = "option9";
                        var wrapper = "wrapper3";
                        var amountElements = 9;
                        var elementMax = 13;
                        var first = document.getElementById("option9");
                        var second = document.getElementById("option10");
                        var third = document.getElementById("option11");
                        var fourth = document.getElementById("option12")
                    } else if (active == "wrapper4") {
                        var begin = "option13";
                        var wrapper = "wrapper4";
                        var amountElements = 13;
                        var elementMax = 17;
                        var first = document.getElementById("option13");
                        var second = document.getElementById("option14");
                        var third = document.getElementById("option15");
                        var fourth = document.getElementById("option16")
                    }

                    function countdown() {
                        document.getElementById(begin).style.backgroundColor = '#d1232a';
                        document.getElementById(begin).style.color = '#e7ea83';
                        document.getElementById(begin).className += " active";
                        var speak = document.getElementById(begin).getAttribute("data-text").valueOf();
                        responsiveVoice.speak(speak, "Dutch Female");

                        var counting = true;
                        var nospeak = false;
                        var count = 5;
                        var number = 0;
                        var timerId = setInterval(function () {
                            count--;

                            if (count == 0) {
                                if (counting == true) {
                                    amountElements += 1;
                                    var elements = document.getElementsByClassName("options");
                                    var names = '';
                                    for (var i = 0; i < elements.length; i++) {
                                        number++;
                                        names = elements[i].id;
                                        first.style.backgroundColor = '#e7ea83';
                                        first.style.color = '#d1232a';
                                        first.style.height = '100px';
                                        first.className = "options option optionSmall";
                                        second.style.backgroundColor = '#e7ea83';
                                        second.style.color = '#d1232a';
                                        second.style.height = '100px';
                                        second.className = "options option optionSmall";
                                        third.style.backgroundColor = '#e7ea83';
                                        third.style.color = '#d1232a';
                                        third.style.height = '100px';
                                        third.className = "options option optionSmall";
                                        fourth.style.backgroundColor = '#e7ea83';
                                        fourth.style.color = '#d1232a';
                                        fourth.style.height = '100px';
                                        fourth.className = "options option optionSmall";
                                    }
                                    if (amountElements < elementMax) {
                                        document.getElementById('option' + amountElements).style.backgroundColor = '#d1232a';
                                        document.getElementById('option' + amountElements).style.color = '#e7ea83';
                                        document.getElementById('option' + amountElements).className += " active";
                                    } else {
                                        amountElements -= 4 ;
                                    }
                                    var speak = document.getElementById('option' + amountElements).getAttribute("data-text").valueOf();
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
                                    window.location.href = "http://localhost/Kiki/nummer.php?id=7qiZfU4dY1lWllzX7mPBI3";
                                }
                            }

                        }, 1000);
                    }

                    countdown();
                }
            }

        }, 1000);
    }

    countdown();
});