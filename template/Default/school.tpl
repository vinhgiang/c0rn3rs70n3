<h1 class="page-header">School list ({paging.totalRecord})</h1>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Chinese name</th>
                <th>English name</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!--BASIC school-->
            <tr>
                <td><a href="{module.school}/detail/{school.id}">{school.index}</a></td>
                <td><a href="{module.school}/detail/{school.id}">{school.school_code}</a></td>
                <td>{school.zh_name}</td>
                <td>{school.en_name}</td>
                <td>{school.datetime}</td>
                <td>
                    <a href="{module.school}/detail/{school.id}" class="btn btn-info">View</a>
                </td>
            </tr>
            <!--BASIC school-->
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Name</th>
                <th>School</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>

    <ul class="pagination">
        {paging.page}
    </ul>
</div>