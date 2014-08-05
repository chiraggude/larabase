/*
 ***********************************
 Pages
 ***********************************
 */

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

// Remove element with class "alert" after 15 seconds (flash messages)
window.setTimeout(function() {
    $("div#alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 15000);

/*
***********************************
Dashboard
***********************************
*/

if(jQuery('div#dashboard').length > 0) {

    // Trends - Stats
    $('#posts').animateNumber(
        {
            number: posts,
        },
        2000
    )

    $('#users').animateNumber(
        {
            number: users,
        },
        2000
    )

    $('#user_posts').animateNumber(
        {
            number: user_posts,
        },
        1000
    )

    $('#feedback').animateNumber(
        {
            number: feedback,
        },
        1000
    )



    // Site Trends - Highcharts
    $(function () {
        $('#trends').highcharts({
            chart: {
                type: 'column'
            },
            credits: {
                enabled: false
            },
            title: {
                text: 'Users & Posts'
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
                name: 'Posts',
                data: [ posts ]
            }]
        });
    });

}

/*
 ***********************************
 Admin
 ***********************************
 */

// Users DataTables
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