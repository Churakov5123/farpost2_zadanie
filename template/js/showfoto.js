// показывает  все фотографии  без перезагрузки
// function showfoto() {
//     $.ajax({
//         url: "getfoto",
//         dataType: "json",
//         cache: false,
//         success: function (data) {
//
//             $.each(data, function (i, filename) {
//                 $('#ikra').append('<a href="' + filename + '" target="_blank"> <img  width="50" src="' + filename + ' "></a> ');
//             });
//         }
//     });
// }
//
// //
// $(document).ready(function () {
//     showfoto();
//     //setInterval('showfoto()', 1000);
// });
//
// $('.upload_files').on('click', function () {
//     showfoto();
//     setTimeout(func, 2000);
// });

function show()
{
    $.ajax({
        url: "getfoto",
        type: 'POST',
        cache: false,
        success: function(html){
            $("#ikra").html(html);
        }
    });
}

$(document).ready(function(){
    show();
    setInterval('show()',1000);
});

//функция сброса содержимого формы
function reset_form_element (e) {
    e.wrap('<form>').parent('form').trigger('reset');
    e.unwrap();
}

$('#resetf').on ('click', function (e) {
    reset_form_element( $('#fails') );
    e.preventDefault();
});
