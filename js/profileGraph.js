$(document).ready(function () {
    moment.locale('fr', {
        months : 'janvier_février_mars_avril_mai_juin_juillet_août_septembre_octobre_novembre_décembre'.split('_'),
        monthsShort : 'janv._févr._mars_avr._mai_juin_juil._août_sept._oct._nov._déc.'.split('_'),
        monthsParseExact : true,
        weekdays : 'dimanche_lundi_mardi_mercredi_jeudi_vendredi_samedi'.split('_'),
        weekdaysShort : 'dim._lun._mar._mer._jeu._ven._sam.'.split('_'),
        weekdaysMin : 'Di_Lu_Ma_Me_Je_Ve_Sa'.split('_'),
        weekdaysParseExact : true,
        longDateFormat : {
            LT : 'HH:mm',
            LTS : 'HH:mm:ss',
            L : 'DD/MM/YYYY',
            LL : 'D MMMM YYYY',
            LLL : 'D MMMM YYYY HH:mm',
            LLLL : 'dddd D MMMM YYYY HH:mm'
        },
        calendar : {
            sameDay : '[Aujourd’hui à] LT',
            nextDay : '[Demain à] LT',
            nextWeek : 'dddd [à] LT',
            lastDay : '[Hier à] LT',
            lastWeek : 'dddd [dernier à] LT',
            sameElse : 'L'
        },
        relativeTime : {
            future : 'dans %s',
            past : 'il y a %s',
            s : 'quelques secondes',
            m : 'une minute',
            mm : '%d minutes',
            h : 'une heure',
            hh : '%d heures',
            d : 'un jour',
            dd : '%d jours',
            M : 'un mois',
            MM : '%d mois',
            y : 'un an',
            yy : '%d ans'
        },
        dayOfMonthOrdinalParse : /\d{1,2}(er|e)/,
        ordinal : function (number) {
            return number + (number === 1 ? 'er' : 'e');
        },
        meridiemParse : /PD|MD/,
        isPM : function (input) {
            return input.charAt(0) === 'M';
        },
        // In case the meridiem units are not separated around 12, then implement
        // this function (look at locale/id.js for an example).
        // meridiemHour : function (hour, meridiem) {
        //     return /* 0-23 hour, given meridiem token and hour 1-12 */ ;
        // },
        meridiem : function (hours, minutes, isLower) {
            return hours < 12 ? 'PD' : 'MD';
        },
        week : {
            dow : 1, // Monday is the first day of the week.
            doy : 4  // Used to determine first week of the year.
        }
    });
    var days = [];
    var values = [];
    var chartdata = {
        labels: days,   
        datasets: [
            {
                label: 'Durée de votre sommeil',
                backgroundColor: '#EF952C',
                borderColor: '#46d5f1',
                hoverBackgroundColor: '#ff8f00',
                hoverBorderColor: '#666666',
                data: values
            }
        ]
    };
    var graphTarget = $("#profileGraph");
    var barGraph = new Chart(graphTarget, {
        type: 'bar',
        data: chartdata,
        options: {
            scales: {
                xAxes: [{
                    barPercentage: 0.6,
                    display: true,
                }],
                yAxes: [{ id: 'y-axis-1', ticks: { min: 0, max: 20 , } }, ]
            }
          },
    });
    showGraph(1, barGraph);
    $("#days").click(function() {
        showGraph(1, barGraph);
        $("#days").prop("disabled",true);
        $("#week").prop("disabled",false);
        $("#month").prop("disabled",false);
    });
    $( "#week" ).click(function() {
        $("#days").prop("disabled",false);
        $("#week").prop("disabled",true);
        $("#month").prop("disabled",false);
        showGraph(7, barGraph);
    });
    $( "#month" ).click(function() {
        $("#days").prop("disabled",false);
        $("#week").prop("disabled",false);
        $("#month").prop("disabled",true);
        showGraph(31, barGraph);
    });
});

function showGraph(nb, barGraph)
{
    {
        $.post("index.php",
        function ()
        {
            if (nb == 1) {
                const today = moment();
                const from_date = today.isoWeekday(1);
                const to_date = today.isoWeekday(7);
                console.log({
                    from_date: from_date.toString(),
                    today: moment().toString(),
                    to_date: to_date.toString(),
                });
                barGraph.data.labels = [moment().subtract(2, 'days').format('DD MMMM'), moment().subtract(1, 'days').format('DD MMMM'), moment().format('DD MMMM')];
                var settings = {
                    "url": "https://api.sleewell.fr/stats/night/20210325",
                    "method": "GET",
                    "headers" : {
                        "Authorization": "4e97ae31b5cebecf45ba0ce8c7f7984311540efd"
                    },
                    "timeout": 0,
                  };
                  
                  $.ajax(settings).done(function (response) {
                    console.log(response);
                });
                barGraph.data.datasets[0].data = ["7", "8", "6"];
                barGraph.update();
            }else if (nb == 7) {
                barGraph.data.labels = [moment().subtract(6, 'days').format('DD MMMM'), moment().subtract(5, 'days').format('DD MMMM'),moment().subtract(4, 'days').format('DD MMMM'), moment().subtract(3, 'days').format('DD MMMM'),moment().subtract(2, 'days').format('DD MMMM'), moment().subtract(1, 'days').format('DD MMMM'), moment().format('DD MMMM')];
                barGraph.data.datasets[0].data = ["4", "6", "7", "8", "7", "8", "6"];
                barGraph.update();
            }else {
                barGraph.data.labels = [moment().subtract(29, 'days').format('DD MMMM'), moment().subtract(28, 'days').format('DD MMMM'), moment().subtract(27, 'days').format('DD MMMM'), moment().subtract(26, 'days').format('DD MMMM'), moment().subtract(25, 'days').format('DD MMMM'), moment().subtract(24, 'days').format('DD MMMM'), moment().subtract(23, 'days').format('DD MMMM'), moment().subtract(22, 'days').format('DD MMMM'), moment().subtract(20, 'days').format('DD MMMM'), moment().subtract(19, 'days').format('DD MMMM'), moment().subtract(18, 'days').format('DD MMMM'), moment().subtract(17, 'days').format('DD MMMM'), moment().subtract(16, 'days').format('DD MMMM'), moment().subtract(15, 'days').format('DD MMMM'), moment().subtract(14, 'days').format('DD MMMM'), moment().subtract(13, 'days').format('DD MMMM'), moment().subtract(12, 'days').format('DD MMMM'), moment().subtract(11, 'days').format('DD MMMM'), moment().subtract(10, 'days').format('DD MMMM'), moment().subtract(9, 'days').format('DD MMMM'), moment().subtract(9, 'days').format('DD MMMM'), moment().subtract(8, 'days').format('DD MMMM'), moment().subtract(7, 'days').format('DD MMMM'), moment().subtract(6, 'days').format('DD MMMM'), moment().subtract(5, 'days').format('DD MMMM'),moment().subtract(4, 'days').format('DD MMMM'), moment().subtract(3, 'days').format('DD MMMM'),moment().subtract(2, 'days').format('DD MMMM'), moment().subtract(1, 'days').format('DD MMMM'), moment().format('DD MMMM')];
                barGraph.data.datasets[0].data = ["6", "7", "6", "9", "7", "6.5", "8", "10", "8.4", "6", "7", "3", "10", "8", "5", "7", "9", "9", "8", "6", "5", "8", "8", "4", "6", "7", "8", "7", "8", "6"];
                barGraph.update();
            }
        });
    }
}
