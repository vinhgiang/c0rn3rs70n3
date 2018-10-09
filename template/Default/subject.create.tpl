<h1 class="page-header">New subject</h1>
<div class="product-detail">

    <form id="formDetail" action="{system.uri}" method="post">
        <div class="form-group row">
            <label for="subject_code" class="col-2 col-form-label">Subject code</label>
            <div class="col-10">
                <input id="subject_code" name="subject_code" class="form-control" type="text">
            </div>
        </div>
        <div class="form-group row">
            <label for="en_name" class="col-2 col-form-label">English name</label>
            <div class="col-10">
                <input id="en_name" name="en_name" class="form-control" type="text">
            </div>
        </div>
        <div class="form-group row">
            <label for="zh_name" class="col-2 col-form-label">Chinese name</label>
            <div class="col-10">
                <input id="zh_name" name="zh_name" class="form-control" type="text">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 text-right">
                <button type="submit" class="btn btn-primary">Create</button>
                <button type="reset" class="btn btn-success">Reset</button>
            </div>
        </div>
    </form>
</div>