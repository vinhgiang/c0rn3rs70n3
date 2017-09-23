<h1 class="page-header">{school.zh_name} - {school.en_name}</h1>
<div class="product-detail">
    <form id="formDetail" action="{system.uri}" method="post">
        <div class="form-group row">
            <label for="school_code" class="col-2 col-form-label">School Code</label>
            <div class="col-10">
                <input id="school_code" name="school_code" class="form-control" type="text" value="{school.school_code}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="zh_name" class="col-2 col-form-label">Chinese Name</label>
            <div class="col-10">
                <input id="zh_name" name="zh_name" class="form-control" type="text" value="{school.zh_name}">
            </div>
        </div>
        <div class="form-group row">
            <label for="zh_name" class="col-2 col-form-label">English Name</label>
            <div class="col-10">
                <input id="en_name" name="en_name" class="form-control" type="text" value="{school.en_name}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="date" class="col-2 col-form-label">Date</label>
            <div class="col-10">
                <input id="date" name="date" class="form-control" type="datetime" value="{school.datetime}" readonly>
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