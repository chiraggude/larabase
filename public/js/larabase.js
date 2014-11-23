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

// Users DataTable
if(jQuery('table#admin-users-datatable').length > 0) { //checks if div element exists
    $(function(){
        $('table#admin-users-datatable').dataTable( {
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

// Posts DataTable
if(jQuery('table#admin-posts-datatable').length > 0) { //checks if div element exists
    $(function(){
        $('#admin-posts-datatable').dataTable( {
            "autoWidth": false,
            "scrollX": true,
            "dom": 'T<"clear">lfrtip',
            "oLanguage": {
                "sSearch": "", // remove label for search box
                "oPaginate": { "sFirst": "First", "sLast": "Last", "sNext": ">", "sPrevious": "<" }, // pagination
                "sLengthMenu": "_MENU_" // no label
            },
            "stateSave": true, // user preferences are saved even on page reload
            "tableTools": {
                "sSwfPath": "../js/datatables/copy_csv_xls_pdf.swf",
                "aButtons": [ "csv","xls","pdf","print"]
            },
            "lengthMenu": [[10 ,10, 25, 50, -1], ['Show', 10, 25, 50, "All"]],
            "ajax": {
                "url": admin_api_posts,
                "dataSrc": "" // the data source is not an object but an JSON array
            },
            "deferRender": true,
            "columns": [
                { "data": "title" },
                { "data": "category" },
                { "data": "status"},
                { "data": "user.username",
                    "mRender": function (data, type, full)  {
                        return  '<a href="' +users+ '/' +data+ '">' +data+ '</a> '
                    }
                },
                { "data": "id", "class": "text-center",
                    "mRender": function (data, type, full)  {
                        return  '<a href="'+posts+'/'+data+'" class="btn btn-default btn-xs"><i class="fa fa-link"></i></a> ' +
                            '<a href="'+posts+'/'+data+'/edit" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a>';
                    }
                }
            ]
        });
        $('.dataTables_filter input').removeClass('input-sm').addClass('input').attr("placeholder", "Search");
        $('.dataTables_length select').removeClass('input-sm').addClass('input');
    });
}

/*
 ***********************************
 Tags
 ***********************************
 */
if(jQuery('#post-tags').length > 0) { //checks if div element exists
    $(function(){
        $('#post-tags').magicSuggest({
            allowFreeEntries: false,
            expandOnFocus: true,
            style: 'height: 43px; padding: 10px 15px;',
            placeholder: 'Tag your Post',
            useTabKey: true,
            useCommaKey: true,
            required: true,
            value: placeholder_tag,
            method: 'get',
            data: tags,
            valueField: 'id',
            displayField: 'name'
        });
    });
}