$(document).ready(function () {
    var urlParams = new URLSearchParams(window.location.search);
    var filterValue = urlParams.get("filter");

    if (filterValue) {
        console.log("cc");
        var url = `${window.location.origin}/admin/users/datatable/all?filter=subscriptions`;
    } else {
        var url = `${window.location.origin}/admin/users/datatable/all`;
    }

    var csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    $("#users-table thead tr")
        .clone(true)
        .addClass("filters px-0")
        .appendTo("#users-table thead");

    $("#users-table").DataTable({
        bSortCellsTop: true,
        responsive: true,
        processing: true,
        serverSide: true,
        orderCellsTop: true,
        ajax: url,
        dataType: "json",
        columns: [
            {
                data: "id",
                name: "id",
                searchable: true,
            },
            {
                data: "first_name",
                name: "first_name",
                searchable: true,
            },
            {
                data: "last_name",
                name: "last_name",
                searchable: true,
            },
            {
                data: "email",
                name: "email",
                width: "10%",
                searchable: true,
            },
            {
                data: "subscription_start_date",
                name: "subscription_start_date",
                searchable: true,
            },
            {
                data: "subscription_end_date",
                name: "subscription_end_date",
                searchable: true,
            },
            {
                data: "is_paid",
                name: "is_paid",
                searchable: true,
            },
            {
                data: "is_active",
                name: "is_active",
                searchable: true,
            },
            {
                data: null,
                orderable: false,
                searchable: false,
            },
        ],
        columnDefs: [
            {
                targets: 8,
                render: function (data, type, row, meta) {
                    return `
                       <div class="d-flex align-items-start" >
                       ${
                           row?.plan?.category_id != 1
                               ? `<a
                                class="btn btn-sm btn-primary me-1"
                                href="${window.location.origin}/admin/users/${row.id}/meals"
                            >
                                <i class="fa fa-fw fa-edit"></i>Meals
                            </a>
                            `
                               : ""
                       }
                       <a class="btn btn-sm btn-primary me-2" href="${
                           window.location.origin
                       }/admin/users/${
                        row.id
                    }/body/measurements"><i class="fa fa-fw fa-edit"></i> measurements</a>
                     <a class="btn btn-sm btn-primary me-1" href="${
                         window.location.origin
                     }/admin/users/${
                        row.id
                    }"><i class="fa fa-fw fa-eye"></i> Show </a>
                    <a class="btn btn-sm btn-success me-1" href="${
                        window.location.origin
                    }/admin/users/${
                        row.id
                    }/edit"><i class="fa fa-fw fa-edit"></i>Edit</a>
                     <form action="/admin/users/${row.id}" method="POST">
                        <input type="hidden" name="_token" value="${csrfToken}" />
                        <input type="hidden" name="_method" value="DELETE" />
                          <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                      </form>
                      </div>
                     `;
                },
            },
            {
                targets: 4,
                render: function (data, type, row, meta) {
                    if (row.is_paid == 0 && row.is_active == 0) {
                        return "N/A";
                    } else {
                        return row.subscription_start_date ? new Date(row.subscription_start_date).toLocaleDateString() : "N/A";
                    }
                },
            },
            {
                targets: 5,
                render: function (data, type, row, meta) {
                    if (row.is_paid == 0 && row.is_active == 0) {
                        return "N/A";
                    } else {
                        return row.subscription_end_date ? new Date(row.subscription_end_date).toLocaleDateString() : "N/A";
                    }
                },
            },

            {
                targets: 7,
                render: function (data, type, row, meta) {
                    if (row.is_paid)
                        return `<span class="text-success">Paid</span>`;
                    else return `<span class="text-danger">Unpaid</span>`;
                },
            },
            {
                targets: 6,
                render: function (data, type, row, meta) {
                    if (row.is_active)
                        return `<span class="text-success">Active</span>`;
                    else return `<span class="text-danger">Inactive</span>`;
                },
            },
        ],
        initComplete: function () {
            var api = this.api();
            api.columns()
                .eq(0)
                .each(function (colIdx) {
                    if ($.inArray(colIdx, [1, 2, 3, 4]) != -1) {
                        var cell = $(".filters th").eq(
                            $(api.column(colIdx).header()).index()
                        );
                        var title = $(cell).text();
                        $(cell).html(
                            '<input type="text" class="form-control" placeholder="' +
                                title +
                                '" />'
                        );

                        var cursorPosition = "";
                        $(
                            "input",
                            $(".filters th").eq(
                                $(api.column(colIdx).header()).index()
                            )
                        )
                            .off("keyup change")
                            .on("change", function (e) {
                                // Get the search value
                                $(this).attr("title", $(this).val());
                                var regexr = "({search})"; //$(this).parents('th').find('select').val();
                                cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api.column(colIdx)
                                    .search(
                                        this.value != ""
                                            ? regexr.replace(
                                                  "{search}",
                                                  "(((" + this.value + ")))"
                                              )
                                            : "",
                                        this.value != "",
                                        this.value == ""
                                    )
                                    .draw();
                            })
                            .on("keyup", function (e) {
                                e.stopPropagation();

                                $(this).trigger("change");
                                $(this)
                                    .focus()[0]
                                    .setSelectionRange(
                                        cursorPosition,
                                        cursorPosition
                                    );
                            });
                    } else {
                        $(
                            `#users-table .filters th:nth-of-type(${
                                colIdx + 1
                            })`
                        ).text("");
                    }
                });
        },
    });
});
