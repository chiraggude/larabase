// Accordian on FAQ's page
function toggleChevron(e) {
    $(e.target)
        .prev('.panel-heading')
        .find("i.indicator")
        .toggleClass('fa-chevron-up fa-chevron-down');
}
$('#accordion').on('hidden.bs.collapse', toggleChevron);
$('#accordion').on('shown.bs.collapse', toggleChevron);

/*
 ***********************************
 Global
 ***********************************
 */

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
if(typeof reports != 'undefined'){
$('#reports').animateNumber(
    {
        number: reports,
    },
    2000
)
}

    if(typeof users != 'undefined'){
$('#users').animateNumber(
    {
        number: users,
    },
    2000
)
}


if(typeof user_reports != 'undefined'){
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
}

if(typeof feedback != 'undefined'){
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
}

if(typeof users != 'undefined' && typeof reports != 'undefined'){
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
}

// DataTables

if(jQuery('table#users-datatable').length > 0) { //checks if div element exists
    $(document).ready(function() {
        // Initialize Datatables in <table> with class "datatable"
        $('table#users-datatable').dataTable( {
            "autoWidth": false,
            "scrollX": true,
            "dom": 'T<"clear">lfrtip',
            "oLanguage": {
                "sSearch": "", //remove label for search box
                "oPaginate": { "sFirst": "First", "sLast": "Last", "sNext": ">", "sPrevious": "<" }, // pagination
                "sLengthMenu": "_MENU_" // no label
            },
            "stateSave": true, // user preferences are saved even on page reload
            "tableTools": {
                "sSwfPath": "../js/datatables/copy_csv_xls_pdf.swf",
                "sRowSelect": "multi",
                "aButtons": [ "csv","xls","pdf","print"]
            },
            "lengthMenu": [[10 ,10, 25, 50, -1], ['Show', 10, 25, 50, "All"]],
            "data": dataset,
            "columns": columns,
        });
        $('.dataTables_filter input').removeClass('input-sm').addClass('input').attr("placeholder", "Search");
        $('.dataTables_length select').removeClass('input-sm').addClass('input');
    });
}

