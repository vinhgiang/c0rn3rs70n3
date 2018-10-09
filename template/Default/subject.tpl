<h1 class="page-header">Subject list ({paging.totalRecord})</h1>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Subject code</th>
                <th>Subject english name</th>
                <th>Subject chinese name</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!--BASIC subject-->
            <tr>
                <td><a href="{module.subject}/detail/{subject.id}">{subject.index}</a></td>
                <td>{subject.subject_code}</td>
                <td>{subject.en_name}</td>
                <td>{subject.zh_name}</td>
                <td>
                    <label class="switch">
                        <input type="checkbox" {subject.status} class="toggleStatus" data-type="Subject" data-id="{subject.id}" >
                        <span class="slider round"></span>
                    </label>
                </td>
                <td>{subject.datetime}</td>
                <td>
                    <a href="{module.subject}/detail/{subject.id}" class="btn btn-info">View</a>
                </td>
            </tr>
            <!--BASIC subject-->
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Subject code</th>
                <th>Subject english name</th>
                <th>Subject chinese name</th>
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