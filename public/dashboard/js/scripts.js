var url = window.location.origin + "/admin-dashboard/";

$(document).ready(function() {

    let tables = {
        services: ["id","name","en_name","image","status","edit"],
        departments: ["id","name","en_name","image","status","edit"],
        images: ["id", "image", "status", "edit", "delete"],
        doctors: ["id","name","en_name","image","status","edit"],
        adds: ["id", "text", "en_text", "edit", "delete"],
        clinics: ["id", "name", "en_name", "edit", "delete"],
        appointments: ["id", "clinic", "doctor_name", "day", "edit", "delete"],
    };

    for (var table in tables) {
        let columns = [];
        tables[table].forEach(col => {
            if (col == "view" || col == "edit")
        columns.push({
            data: col,
            name: col,
            orderable: false,
            searchable: false
        });
    else columns.push({ data: col, name: col });
    });

        let APP_URL = window.location.origin + "/admin-dashboard/";
        $(`#data-table-${table}`).DataTable({
            processing: true,
            paging: true,
            ajax: {
                url: APP_URL + `${table}/index/data`,
                type: "GET",
                data:
                    table == "doctors" ||
                    table == "images" ||
                    table == "clinics" ||
                    table == "programs_data"
                        ? function(d) {
                        let e = document.getElementById("type");
                        if (e) d.type = e.options[e.selectedIndex].value;
                    }
                        : {}
            },
            dom: "Bfrtip",
            buttons: [ "excel", "print"],
            columns,
        });
    }



});
/**
 * Created by Tasneem on 8/31/2020.
 */
