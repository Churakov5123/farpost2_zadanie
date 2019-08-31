//отправляет фотогорафии на сервер

(function ($) {

    var files; // переменная. будет содержать данные файлов

// заполняем переменную данными файлов, при изменении значения file поля
    $('input[type=file]').on('change', function () {
        files = this.files;
    });


// обработка и отправка AJAX запроса при клике на кнопку upload_files
    $('.upload_files').on('click', function (event) {

        event.stopPropagation(); // остановка всех текущих JS событий
        event.preventDefault();  // остановка дефолтного события для текущего элемента

        // ничего не делаем если files пустой
        if (typeof files == 'undefined') return;

        // создадим данные файлов в подходящем для отправки формате
        var data = new FormData();
        $.each(files, function (key, value) {
            data.append(key, value);
        });

        // добавим переменную идентификатор запроса
        data.append('my_file_upload', 1);

        // AJAX запрос
        $.ajax({
            url: 'foto',
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            // отключаем обработку передаваемых данных, пусть передаются как есть
            processData: false,
            // отключаем установку заголовка типа запроса. Так jQuery скажет серверу что это строковой запрос
            contentType: false,

            // функция ошибки ответа сервера
            error: function (jqXHR, status, errorThrown) {
                console.log('ОШИБКА AJAX запроса: ' + status, jqXHR);
            }

        });

    });


})(jQuery)