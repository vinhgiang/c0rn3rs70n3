<h1 class="page-header">{student.student_code} - {student.zh_name} - {student.en_name}</h1>
<div class="product-detail">

    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#chinese">Chinese</a></li>
        <li><a data-toggle="tab" href="#english">English</a></li>
    </ul>

    <div class="tab-content">
        <div id="chinese" class="tab-pane fade in active">
            <form id="formDetail" action="{system.uri}" method="post">
                <div class="form-group row">
                    <label for="student_code" class="col-2 col-form-label">Student Code</label>
                    <div class="col-10">
                        <input id="student_code" name="student_code" class="form-control" type="text" value="{student.student_code}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="student_old_code" class="col-2 col-form-label">Student Old Code</label>
                    <div class="col-10">
                        <input id="student_old_code" name="student_old_code" class="form-control" type="text" value="{student.student_old_code}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="zh_name" class="col-2 col-form-label">Chinese Name</label>
                    <div class="col-10">
                        <input id="zh_name" name="zh_name" class="form-control" type="text" value="{student.zh_name}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="school" class="col-2 col-form-label">School</label>
                    <div class="col-8">
                        <select class="form-control cbSchool" id="school" name="school">
                            <!--BASIC zh_school-->
                            <option value="{zh_school.school_code}" {zh_school.active}>{zh_school.zh_name}</option>
                            <!--BASIC zh_school-->
                        </select>
                    </div>
                    <div class="col-2">
                        <input class="form-control schoolCode" type="text" value="{student.school}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="zh_address_1" class="col-2 col-form-label">Address</label>
                    <div class="col-10">
                        <input id="zh_address_1" name="zh_address_1" class="form-control" type="text" value="{student.zh_address_1}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="zh_address_2" class="col-2 col-form-label"></label>
                    <div class="col-10">
                        <input id="zh_address_2" name="zh_address_2" class="form-control" type="text" value="{student.zh_address_2}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="zh_address_3" class="col-2 col-form-label"></label>
                    <div class="col-10">
                        <input id="zh_address_3" name="zh_address_3" class="form-control" type="text" value="{student.zh_address_3}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mobile" class="col-2 col-form-label">Mobile</label>
                    <div class="col-10">
                        <input id="mobile" name="mobile" class="form-control" type="text" value="{student.mobile}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="home_tel" class="col-2 col-form-label">Home Tel</label>
                    <div class="col-10">
                        <input id="home_tel" name="home_tel" class="form-control" type="text" value="{student.home_tel}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="parent_tel" class="col-2 col-form-label">Parent Tel</label>
                    <div class="col-10">
                        <input id="parent_tel" name="parent_tel" class="form-control" type="text" value="{student.parent_tel}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="reference" class="col-2 col-form-label">Reference</label>
                    <div class="col-9">
                        <input id="reference" name="reference" class="form-control" type="text" value="{student.referrer}">
                    </div>
                    <div class="col-1">
                        - <a target="_blank" href="/student/detail/{student.referrer}" class="btn btn-info">Detail</a>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="remarks" class="col-2 col-form-label">Remarks</label>
                    <div class="col-10">
                        <textarea class="form-control" id="remarks" name="remarks" rows="2">{student.remarks}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="creator" class="col-2 col-form-label">Creator</label>
                    <div class="col-10">
                        <input id="creator" name="creator" class="form-control" type="text" value="{student.creator_name}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="date" class="col-2 col-form-label">Date</label>
                    <div class="col-4">
                        <input id="date" name="date" class="form-control" type="datetime" value="{student.datetime}" readonly>
                    </div>
                    <label for="date" class="col-1 col-lg-offset-1 col-form-label">Last Modify</label>
                    <div class="col-4">
                        <input id="last_modify" name="last_modify" class="form-control" type="datetime" value="{student.last_modify}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn btn-success">Reset</button>
                        <a href="{module.student}/{student_action.create}/{student.student_code}" class="btn btn-info">Become a referrer</a>
                    </div>
                </div>
            </form>
        </div>
        <div id="english" class="tab-pane fade">
            <form id="formDetail" action="{system.uri}" method="post">
                <div class="form-group row">
                    <label for="student_code" class="col-2 col-form-label">Student Code</label>
                    <div class="col-10">
                        <input id="student_code" name="student_code" class="form-control" type="text" value="{student.student_code}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="student_old_code" class="col-2 col-form-label">Student Old Code</label>
                    <div class="col-10">
                        <input id="student_old_code" name="student_old_code" class="form-control" type="text" value="{student.student_old_code}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="en_name" class="col-2 col-form-label">English Name</label>
                    <div class="col-10">
                        <input id="en_name" name="en_name" class="form-control" type="text" value="{student.en_name}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="school" class="col-2 col-form-label">School</label>
                    <div class="col-8">
                        <select class="form-control cbSchool" id="school" name="school">
                            <!--BASIC en_school-->
                            <option value="{en_school.school_code}" {en_school.active} >{en_school.en_name}</option>
                            <!--BASIC en_school-->
                        </select>
                    </div>
                    <div class="col-2">
                        <input class="form-control schoolCode" type="text" value="{student.school}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="en_address_1" class="col-2 col-form-label">Address</label>
                    <div class="col-10">
                        <input id="en_address_1" name="en_address_1" class="form-control" type="text" value="{student.en_address_1}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="en_address_1" class="col-2 col-form-label"></label>
                    <div class="col-10">
                        <input id="en_address_1" name="en_address_2" class="form-control" type="text" value="{student.en_address_2}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="en_address_3" class="col-2 col-form-label"></label>
                    <div class="col-10">
                        <input id="en_address_3" name="en_address_3" class="form-control" type="text" value="{student.en_address_3}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mobile" class="col-2 col-form-label">Mobile</label>
                    <div class="col-10">
                        <input id="mobile" name="mobile" class="form-control" type="text" value="{student.mobile}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="home_tel" class="col-2 col-form-label">Home Tel</label>
                    <div class="col-10">
                        <input id="home_tel" name="home_tel" class="form-control" type="text" value="{student.home_tel}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="parent_tel" class="col-2 col-form-label">Parent Tel</label>
                    <div class="col-10">
                        <input id="parent_tel" name="parent_tel" class="form-control" type="text" value="{student.parent_tel}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="reference" class="col-2 col-form-label">Reference</label>
                    <div class="col-9">
                        <input id="reference" name="reference" class="form-control" type="number" value="{student.referrer}">
                    </div>
                    <div class="col-1">
                        - <a target="_blank" href="/student/detail/{student.referrer}" class="btn btn-info">Detail</a>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="remarks" class="col-2 col-form-label">Remarks</label>
                    <div class="col-10">
                        <textarea class="form-control" id="remarks" name="remarks" rows="2">{student.remarks}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="creator" class="col-2 col-form-label">Creator</label>
                    <div class="col-10">
                        <input id="creator" name="creator" class="form-control" type="text" value="{student.creator_name}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="date" class="col-2 col-form-label">Date</label>
                    <div class="col-4">
                        <input id="date" name="date" class="form-control" type="datetime" value="{student.datetime}" readonly>
                    </div>
                    <label for="date" class="col-1 col-lg-offset-1 col-form-label">Last Modify</label>
                    <div class="col-4">
                        <input id="last_modify" name="last_modify" class="form-control" type="datetime" value="{student.last_modify}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn btn-success">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <h3 class="page-header">Referred to:</h3>

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
            <!--BASIC students-->
            <tr>
                <td><a href="{module.student}/detail/{students.id}">{students.index}</a></td>
                <td><a href="{module.student}/detail/{students.id}">{students.student_code}</a></td>
                <td>{students.student_old_code}</td>
                <td>{students.zh_name} - {students.en_name}</td>
                <td>{students.school} - {students.school_zh_name}</td>
                <td>{students.datetime}</td>
                <td>
                    <a href="{module.student}/detail/{students.id}" class="btn btn-info">View</a>
                </td>
            </tr>
            <!--BASIC students-->
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
</div>