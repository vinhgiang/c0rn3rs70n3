<h1 class="page-header">Create new supplier</h1>
<div class="product-detail">
    <form id="formCreate" action="{form_action}" method="post">
        <div class="form-group row">
            <label for="supplier-name" class="col-2 col-form-label">Supplier Name</label>
            <div class="col-10">
                <input id="supplier-name" name="name" class="form-control" type="text" value="{supplier.name}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="column-name" class="col-2 col-form-label">Import Column Name</label>
            <div class="col-10">
                <input id="column-name" name="column-name" class="form-control" type="text" value="{supplier.column_name}" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 text-right">
                <input type="hidden" name="id" value="{supplier.id}">
                <button type="submit" class="btn btn-primary">{action_name}</button>
            </div>
        </div>
    </form>
</div>