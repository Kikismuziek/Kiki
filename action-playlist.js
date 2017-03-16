$(function () {

    var back = $(".backBtn");
    var home = $(".homeBtn");

    var wrapper = $(".wrapper");
    var wrapper4 = $(".wrapper4");

    back.appendTo(wrapper4);
    home.appendTo(wrapper4);

    console.log(pausecontent);

    // console.log("test");

//    nextPrevSong();


});


// function nextPrevSong(){
//     $.getJSON("Netherlands-Top-50.php", function(data){
//         readData(data);
//     })
// }
//
// function readData(data){
//
//     console.log(data);
//
// }