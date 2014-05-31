// Accordian on FAQ's page
function toggleChevron(e) {
    $(e.target)
        .prev('.panel-heading')
        .find("i.indicator")
        .toggleClass('fa-chevron-up fa-chevron-down');
}
$('#accordion').on('hidden.bs.collapse', toggleChevron);
$('#accordion').on('shown.bs.collapse', toggleChevron);

// Remove element with class "alert" after 5 seconds (flash messages)
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 5000);

/*
***********************************
Dashboard
***********************************
*/
$('#reports').animateNumber(
    {
        number: reports,
    },
    2000
)

$('#users').animateNumber(
    {
        number: users,
    },
    2000
)


$(document).ready(function(){
    // Knob - Reports of Current User
    $(".reports").knob({
        'min':0,
        'max':user_reports,
        'readOnly': true,
        "thickness":.1,
        //'format': function(v){ return v + '+';},
        'change' : function (v) { console.log(v); }
    });
    // Animate number inside knob
    $({value: 0}).animate({value: user_reports}, {
        duration: 1000,
        step: function()
        {
            $('.reports').val(Math.ceil(this.value)).trigger('change');
        }
    })
});

$(document).ready(function(){
    // Knob - Reports of Current User
    $("#feedback").knob({
        'min':0,
        'max':feedback,
        'readOnly': true,
        "thickness":.1,
        'change' : function (v) { console.log(v); }
    });
    // Animate number inside knob
    $({value: 0}).animate({value: feedback}, {
        duration: 1000,
        step: function()
        {
            $('#feedback').val(Math.ceil(this.value)).trigger('change');
        }
    })
});

// Trends - Highcharts
$(function () {
    $('#trends').highcharts({
        chart: {
            type: 'column'
        },
        credits: {
            enabled: false
        },
        title: {
            text: 'Users & Reports'
        },
        xAxis: {
            categories: ['Current Count']
        },
        yAxis: {
            title: {
                text: 'Total'
            }
        },
        series: [{
            name: 'Users',
            data: [ users ]
        }, {
            name: 'Reports',
            data: [ reports ]
        }]
    });
});

