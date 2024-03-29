let chart;
let token;
let position;

$(document).ready(function () {
    callmoment();
    position = 0;
    token = document.cookie
        .split('; ')
        .find(row => row.startsWith('token='))
        .split('=')[1];

    graphTarget = $("#profileGraph");
    showGraph(1);
    $("#days").click(function() {
        changeDayPosition(0);
        $("#days").prop("disabled",true);
        $("#week").prop("disabled",false);
        $("#month").prop("disabled",false);
        showGraph(1);
    });
    $( "#week" ).click(function() {
        changeDayPosition(0);
        $("#days").prop("disabled",false);
        $("#week").prop("disabled",true);
        $("#month").prop("disabled",false);
        showGraph(7);
    });
    $( "#month" ).click(function() {
        changeDayPosition(0);
        $("#days").prop("disabled",false);
        $("#week").prop("disabled",false);
        $("#month").prop("disabled",true);
        showGraph(31);
    });
});

function showGraph(nb)
{
    {
        $.post("index.php",
        function ()
        {
            if (nb == 1) {
                const today = moment().add(- 1 - position, "days").format('YYYYMMDD');
                console.log("Used day :" + today);
                var settings = {
                    "url": "https://api.sleewell.fr/stats/night/" + today,
                    "method": "GET",
                    "headers" : {
                        "Authorization": token
                    },
                    "timeout": 0,
                };
                $.ajax(settings).done(function (response) {
                    var dbData = [];
                    var timeData = [];
                    if (response.data !== undefined) {
                        for (var i = 0; i < response.data.length; i++) {
                            dbData.push(response.data[i].db);
                            timeData.push(" ");
                        }
                    }
                    else {
                        timeData.push("No data");
                        dbData.push(0);
                    }
                    var chartdata = {
                        labels: timeData,   
                        datasets: [
                            {
                                label: 'Decibels during your night',
                                backgroundColor: '#EF952C',
                                hoverBackgroundColor: '#ff8f00',
                                hoverBorderColor: '#666666',
                                data: dbData,
                            }
                        ]
                    };
                    mychart("line", chartdata);
                });
            }else if (nb == 7) {
                var startOfWeek = moment().clone().startOf('week').subtract(position, 'week').format('YYYYMMDD');
                console.log("Used start of week :" + startOfWeek);
                var settings = {
                    "url": "https://api.sleewell.fr/stats/week/" + startOfWeek,
                    "method": "GET",
                    "headers" : {
                        "Authorization": token
                    },
                    "timeout": 0,
                };
                $.ajax(settings).done(function (response) {
                    fDay = parseInt(startOfWeek);
                    let [dbData, timeLength] = fillDays(7);
                    if (response.data !== null) {
                        for (var i = 0; i < response.data.length; i++) {
                            if (timeLength[response.data[i].id - fDay] === "0" && (response.data[i].end - response.data[i].start) >= 60) {
                                timeLength[response.data[i].id - fDay] = getHour(response.data[i].end - response.data[i].start);
                            }
                        }
                    }
                    dbData = getProperDays(7);
                    var chartdata = {
                        labels: dbData,   
                        datasets: [
                            {
                                label: 'Time of sleep',
                                backgroundColor: '#EF952C',
                                hoverBackgroundColor: '#ff8f00',
                                hoverBorderColor: '#666666',
                                data: timeLength,
                            }
                        ]
                    };
                    mychart("bar", chartdata);
                });
            }else {
                var startOfMonth = moment().clone().startOf('month').subtract(position, 'month').format('YYYYMMDD');
                console.log("Used start of month :" + startOfMonth);
                var settings = {
                    "url": "https://api.sleewell.fr/stats/month/" + startOfMonth + "?format=days",
                    "method": "GET",
                    "headers" : {
                        "Authorization": token
                    },
                    "timeout": 0,
                };
                $.ajax(settings).done(function (response) {
                    fDay = parseInt(startOfMonth);
                    let [dbData, timeLength] = fillDays(moment().daysInMonth());
                    if (response.data !== null) {
                        for (var i = 0; i < response.data.length; i++) {
                            if (timeLength[response.data[i].id - fDay] === "0" && (response.data[i].end - response.data[i].start) >= 60) {
                                timeLength[response.data[i].id - fDay] = getHour(response.data[i].end - response.data[i].start);
                            }
                        }
                    }
                    dbData = getProperDays(moment().daysInMonth());
                    var chartdata = {
                        labels: dbData,   
                        datasets: [
                            {
                                label: 'Time of sleep',
                                backgroundColor: '#EF952C',
                                hoverBackgroundColor: '#ff8f00',
                                hoverBorderColor: '#666666',
                                data: timeLength,
                            }
                        ]
                    };
                    mychart("bar", chartdata);
                });
            }
        });
    }
}

function mychart(type, data) {
    if (chart) {
      chart.destroy();
    }
    if (type == "line") {
        chart = new Chart(graphTarget, {
            type: type,
            data: data,
            options: {
                tooltips: {
                    enabled: false
                },
                elements: {
                    point:{
                        radius: 0
                    }
                }
            }
        });
    }
    else {
        chart = new Chart(graphTarget, {
            type: type,
            data: data,
            options: {
                tooltips: {
                    enabled: false
                },
                scales: {
                    yAxes: [{
                        // type: 'time',
                        // time: {
                        //     unit: 'hour',
                        // },
                        // barPercentage: 0.6,
                        // display: true,
                    }],
                    xAxes: [{ id: 'y-axis-1', }, ]
                }
              },
        });
    }
}


function createEmptyChartData(nb)
{
    var chartdata = {
        labels: timeData,   
        datasets: [
            {
                label: 'Decibels during your night',
                backgroundColor: '#EF952C',
                hoverBackgroundColor: '#ff8f00',
                hoverBorderColor: '#666666',
                data: dbData,
            }
        ]
    };
}

function callmoment()
{
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
}

function getHour(time) {
    var hours   = parseFloat(time / 3600);
    console.log(hours);
    return hours;
}

function getProperDays(duration)
{
    var array = [];
    for (var i = 0; i < duration; i++) {
        if (duration == 7)
            array.push(moment().clone().startOf('week').add(i, 'days').format('DD-MM-YYYY'));
        else
            array.push(moment().clone().startOf('month').add(i, 'days').format('DD-MM-YYYY'));

    }
    return (array);
}

function fillDays(nb){
    var timeLength = ["0", "0", "0", "0", "0", "0", "0"];
    var dbData = [];

    for (var i = 0; i < nb;i ++) {
        if (nb == 7)
            dbData.push(moment().clone().startOf('week').add(i, "days").format('YYYYMMDD'));
        else
            dbData.push(moment().clone().startOf('month').add(i, "days").format('YYYYMMDD'));
    }
    return [dbData , timeLength];
}

function changeDayPosition(nb)
{
    if (nb == 1) {
        position -= 1;
        $("#minusDays").prop("disabled",false);
        if (position == 0)
            $("#plusDays").prop("disabled",true);
        else
        $("#plusDays").prop("disabled",false);     
    }
    else if (nb == -1) {
        position += 1;
        $("#plusDays").prop("disabled",false);
        if (position == 10)
            $("#minusDays").prop("disabled",true);
        else 
            $("#minusDays").prop("disabled",false);    
    }
    else {
        position = 0;
        $("#plusDays").prop("disabled",true);
    }
    if($('#days').is(':disabled') && nb != 0){
        showGraph(1);
    }
    else if($('#week').is(':disabled') && nb != 0){
        showGraph(7);
    }
    else if ($('#month').is(':disabled')&& nb != 0){
        showGraph(31);
    }
}