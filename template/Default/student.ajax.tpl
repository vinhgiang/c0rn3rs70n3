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
                    <a data-student-code="{student.student_code}" class="btn btn-info select-referrer" data-dismiss="modal">Select</a>
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
</div>