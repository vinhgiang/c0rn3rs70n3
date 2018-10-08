<h1 class="page-header">{level.en_name} - {level.zh_name}</h1>
<div class="product-detail">
    <form id="formDetail" action="{system.uri}" method="post">
        <div class="form-group row">
            <label for="en_name" class="col-2 col-form-label">English name</label>
            <div class="col-10">
                <input id="en_name" name="en_name" class="form-control" type="text" value="{level.en_name}">
            </div>
        </div>
        <div class="form-group row">
            <label for="zh_name" class="col-2 col-form-label">Chinese name</label>
            <div class="col-10">
                <input id="zh_name" name="zh_name" class="form-control" type="text" value="{level.zh_name}">
            </div>
        </div>
        <div class="form-group row">
            <label for="en_name" class="col-2 col-form-label">Status</label>
            <div class="col-10">
                <label class="switch">
                    <input name="status" type="checkbox" {level.status}>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="form-group row">
            <label for="date" class="col-2 col-form-label">Date</label>
            <div class="col-4">
                <input id="date" name="date" class="form-control" type="datetime" value="{level.datetime}" readonly>
            </div>
            <label for="date" class="col-1 col-lg-offset-1 col-form-label">Last Modify</label>
            <div class="col-4">
                <input id="last_modify" name="last_modify" class="form-control" type="datetime" value="{level.last_modify}" readonly>
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