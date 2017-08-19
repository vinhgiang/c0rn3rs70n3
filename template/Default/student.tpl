<h1 class="page-header">Student list ({paging.totalRecord})</h1>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Old code</th>
                <th>Name</th>
                <th>School</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!--BASIC student-->
            <tr>
                <td><a href="{module.student}/detail/{student.id}">{student.index}</a></td>
                <td><a href="{module.student}/detail/{student.id}">{student.student_code}</a></td>
                <td>{student.student_old_code}</td>
                <td>{student.zh_name} - {student.en_name}</td>
                <td>{student.school} - {student.school_zh_name}</td>
                <td>{student.datetime}</td>
                <td>
                    <a href="{module.student}/detail/{student.id}" class="btn btn-info">View</a>
                </td>
            </tr>
            <!--BASIC student-->
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Old code</th>
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