[
    <!--BASIC supplier-->
    {"name": "{supplier.name}", "field": "{supplier.db_column}", "cellTemplate": "<div style=\"{{ grid.appScope.rowFormatter(row, '{supplier.db_column}' ) }} \" class='ui-grid-cell-contents'>{{ row.entity.{supplier.db_column} }}</div>"} {supplier.comma}
    <!--BASIC supplier-->
]