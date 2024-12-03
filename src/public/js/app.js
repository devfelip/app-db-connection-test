$(function () {
    function populate_tables() {
        conn = $("#txtConnection").val();
        host = $("#txtHost").val();
        port = $("#txtPort").val();
        database = $("#txtDatabase").val();
        username = $("#txtUsername").val();
        pass = $("#txtPassword").val();
        schema = $("#txtSchemas").val();

        dropdown_tables = $("#txtTables");
        dropdown_tables.empty();
        dropdown_tables.append('<option selected="true">Selecione uma tabela</option>');
        dropdown_tables.prop('selectedIndex', 0);

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '/select_tables/' + conn + '/' + host + '/' + port + '/' + database + '/' + username + '/' + encodeURIComponent(pass) + '/' + schema,
            beforeSend: function () {
                if (!conn || !host || !port || !database || !username || !pass || !schema)
                    return false;
            },
            success: function (data) {
                $.each(data, function (key, entry) {
                    dropdown_tables.append($('<option></option>')
                        .attr('value', entry.table_name)
                        .text(entry.table_name));
                });
            },
            error: function () {
                console.log('Não foi possivel conectar!');
            }
        });
    }

    function populate_schemas() {
        conn = $("#txtConnection").val();
        host = $("#txtHost").val();
        port = $("#txtPort").val();
        database = $("#txtDatabase").val();
        username = $("#txtUsername").val();
        pass = $("#txtPassword").val();

        dropdown_schemas = $("#txtSchemas");
        dropdown_schemas.empty();
        dropdown_schemas.append('<option selected="true">Selecione um schema</option>');
        dropdown_schemas.prop('selectedIndex', 0);

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '/select_schemas/' + conn + '/' + host + '/' + port + '/' + database + '/' + username + '/' + encodeURIComponent(pass) + '/',
            beforeSend: function () {
                if (!conn || !host || !port || !database || !username || !pass)
                    return false;
            },
            success: function (data) {
                $.each(data, function (key, entry) {
                    dropdown_schemas.append($('<option></option>')
                        .attr('value', entry.table_schema)
                        .text(entry.table_schema));
                });
            },
            error: function () {
                console.log('Não foi possivel conectar!');
            }
        });
    }

    $("#txtConnection, #txtHost, #txtPort, #txtDatabase, #txtUsername, #txtPassword").change(function () {
        populate_schemas();

        if ($("#txtSchemas").length > 0)
            populate_tables();
        else
            $("#txtTables").empty;
    });

    $("#txtSchemas").change(function () {
        populate_tables();
    });
});