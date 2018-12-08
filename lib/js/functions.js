function pobierzZestawienie()
{
    var zakresdat = $('#reservation').val();
    zakresdat = zakresdat.split(' - ');
    zakresdat[0] = zakresdat[0].split('/');
    zakresdat[0] = zakresdat[0][2] + '-' + zakresdat[0][0] + '-' + zakresdat[0][1];
    zakresdat[1] = zakresdat[1].split('/');
    zakresdat[1] = zakresdat[1][2] + '-' + zakresdat[1][0] + '-' + zakresdat[1][1];
    showwait();
    $.ajax({
        url         : "ajax/displayLogs.php", //wymagane, gdzie się łączymy
        method      : "post", //typ połączenia, domyślnie get
        data        : { //dane do wysyłki
            action: 'all',
            startDate : zakresdat[0],
            endDate : zakresdat[1]
        },
        success: function(result){
            hidewait();
            $("#zestawienie").html(result);
        },
        error: function(){
            hidewait();
            addTopLayer('error', 'Wystąpił błąd');
            $("#error").html('spróbuj ponownie');
        }

    });
}

function pobierzDzien(id, date)
{
    zamknij();
    showwait();
    $.ajax({
        url         : "ajax/displayLogs.php", //wymagane, gdzie się łączymy
        method      : "post", //typ połączenia, domyślnie get
        data        : { //dane do wysyłki
            action: 'oneday',
            idprac : id,
            date : date
        },
        success: function(result){
            hidewait();
            addTopLayer('oneDay', 'Wejścia na dzień ' + date);
            $("#oneDay").html(result);
        },
        error: function(){
            hidewait();
            addTopLayer('error', 'Wystąpił błąd');
            $("#error").html('spróbuj ponownie');
        }
    });
}

function addTopLayer(id, name){
    $(document.body).append('<div class="topLayer">' +
        '<img id="close" src="close_blue.png" onclick="zamknij()"/>' +
        '<h3>' + name + '</h3>' +
        '<div id="' + id + '"></div>' +
        '</div>');
}

function zamknij() {
    $('.topLayer').remove();
}

function showwait(){
    $(document.body).append('<div class="wait">' +
        '<h3>Proszę czekać</h3>' +
        '</div>');
}

function hidewait(){
    $('.wait').remove();
}