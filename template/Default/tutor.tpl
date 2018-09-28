<h1 class="page-header">Tutor list ({paging.totalRecord})</h1>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!--BASIC tutor-->
            <tr>
                <td><a href="{module.tutor}/detail/{tutor.id}">{tutor.index}</a></td>
                <td>{tutor.name}</td>
                <td>
                    <label class="switch">
                        <input type="checkbox" {tutor.status} class="toggleTutor" data-id="{tutor.id}" >
                        <span class="slider round"></span>
                    </label>
                </td>
                <td>{tutor.datetime}</td>
                <td>
                    <a href="{module.tutor}/detail/{tutor.id}" class="btn btn-info">View</a>
                </td>
            </tr>
            <!--BASIC tutor-->
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Name</th>
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