<div class="h_line"></div>
<h1>S040 : BANK ACCOUNT</h1>
<div style="float: right;"> <a class="bankaccount" href="#customForm"><img type="image" src="../page/images/icons/new-form-24x24.png" title="new" alt="new" value="0" /></a></div>

<div class="cleaner"></div>
<script type="text/javascript">
    var self = this;

    self.table = 'bankaccount';
    self.caption = 'Bank Account List:';
    self.columns = [
        'bankaccount_id', 'account_no', 'account_name', 'bankname_eng', 'bankname_th',
        'accounttype_eng', 'accounttype_th','account_date', 'deleteflag', 'action'
    ];
    self.colNames = [
        'Bank Account ID', 'Bank Account No','Bank Account Name', 'Bank Account (EN)', 'Bank Account (TH)',
        'Account Type (EN)', 'Account Type (TH)','Bank Account Date', 'Status', 'Action'
    ];
    self.colModel = [
        {name: 'bankaccount_id', index:'bankaccount_id', hidden: true},
        {name: 'account_no', index: 'account_no', width: 100, align: 'center'},
        {name: 'account_name', index: 'account_name', width: 200, align: 'center'},
        {name: 'bankname_eng', index: 'bankname_eng', hidden: true},
        {name: 'bankname_th', index: 'bankname_th', width: 130, align: 'center'},
        {name: 'accounttype_eng', index: 'accounttype_eng', hidden: true},
        {name: 'accounttype_th', index: 'accounttype_th', hidden: true},
        {name: 'account_date', index: 'account_date', hidden: true},
        {name: 'deleteflag', index: 'deleteflag', width: 130, align: 'center'},
        {name: 'action',index: 'action', width:80, align: 'center'}
    ];
    $(function () {
        $('#account_date').datepicker({dateFormat:'yy-mm-dd'});
    });
</script>
<script type="text/javascript" src="../page/js/com_type1.js?_=<?php echo time(); ?>"></script>

<table id="list-bankaccount"></table>
<div id="pager"></div>

<div id="container" style="display:none">
    <form method="post" id="customForm" action="">
        <fieldset class="modal-header">
            <h3 class="modal-title">S040 : BANK ACCOUNT</h1>
        </fieldset>
        <fieldset class="modal-body">
            <p>
                <label for="account_no">Bank Account No: </label>
                <input id="account_no" name="account_no" type="text" />
            </p>
            <p>
                <label for="account_name">Bank Account Name: </label>
                <input id="account_name" name="account_name" type="text" />
            </p>
            <p>
                <label for="bankname_eng">Bank Account (EN): </label>
                <input id="bankname_eng" name="bankname_eng" type="text" />
            </p>
            <p>
                <label for="bankname_th">Bank Account (TH): </label>
                <input id="bankname_th" name="bankname_th" type="text" />
            </p>
            <p>
                <label for="accounttype_eng">Account Type (EN): </label>
                <input id="accounttype_eng" name="accounttype_eng" type="text" />
            </p>
            <p>
                <label for="accounttype_th">Account Type (TH): </label>
                <input id="accounttype_th" name="accounttype_th" type="text" />
            </p>
            <p>
                <label for="account_date">Bank Account Date: </label>
                <input id="account_date" name="account_date" type="text" />
            </p>
            <p>
                <label for="deleteflag">Use Status: </label>
                <select id="deleteflag" name="deleteflag">
                    <option value="-1"> -- Please Select -- </option>
                    <option value="0">Used</option>
                    <option value="1">Unuse</option>
                </select>
            </p>
        </fieldset>
        <fieldset class="modal-footer">
            <p style="float: right;">
                <input id="date" name="create_date" type="hidden" value="<?php echo date('Y-m-d'); ?>" />
                <input id="by" name="create_by" type="hidden" value="1" />
                <input id="table" name="table" type="hidden" value="bankaccount" />
                <input id="bankaccount_id" name="bankaccount_id" type="hidden" value="0" />
                <input id="mode" name="mode" type="hidden" value="insert" />

                <button type="submit" id="save" name="save" class="btn btn-success">
                    <i class="icon-plus-sign icon-white"></i>
                    <span>Save</span>
                </button>
                <button type="reset" id="cancle" name="cancle" class="btn btn-warning cancel">
                    <i class="icon-ban-circle icon-white"></i>
                    <span>Cancel</span>
                </button>
                <button type="button" id="delete" name="delete" class="btn btn-danger delete">
                    <i class="icon-minus-sign icon-white"></i>
                    <span>Delete</span>
                </button>
                <button type="button" id="recovery" name="recovery" class="btn btn-primary save">
                    <i class="icon-share-alt icon-white"></i>
                    <span>Recovery</span>
                </button>
            </p>
        </fieldset>
    </form>
</div>