<h1 class="page-header">Level list ({paging.totalRecord})</h1>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Level english name</th>
                <th>Level chinese name</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!--BASIC level-->
            <tr>
                <td><a href="{module.level}/detail/{level.id}">{level.index}</a></td>
                <td>{level.en_name}</td>
                <td>{level.zh_name}</td>
                <td>
                    <label class="switch">
                        <input type="checkbox" {level.status} class="toggleStatus" data-type="Level" data-id="{level.id}" >
                        <span class="slider round"></span>
                    </label>
                </td>
                <td>{level.datetime}</td>
                <td>
                    <a href="{module.level}/detail/{level.id}" class="btn btn-info">View</a>
                </td>
            </tr>
            <!--BASIC level-->
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Level english name</th>
                <th>Level chinese name</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>

    <ul class="pagination">
        {paging.page}
    </ul>
</div>