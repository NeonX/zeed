<div class="h_line"></div>
<h1>S042 : PAYMENT TERM</h1>
<div style="float: right;"> <a class="paymentterm" href="#customForm"><img type="image" src="../page/images/icons/new-form-24x24.png" title="new" alt="new" value="0" /></a></div>

<div class="cleaner"></div>
<script type="text/javascript">
    var self = this;

    self.table = 'paymentterm';
    self.caption = 'Payment Term List:';
    self.columns = [
        'paymentterm_id', 'pmterm_code','pmterm_eng', 'pmterm_th',
        'pmterm_day', 'deleteflag', 'action'
    ];
    self.colNames = [
        'Payment Term ID', 'Payment Term Code','Payment Term (ENG)', 'Payment Term (TH)',
        'Payment Term Day', 'Status', 'Action'
    ];
    self.colModel = [
        {name: 'paymentterm_id', index:'paymentterm_id', hidden: true},
        {name: 'pmterm_code', index: 'pmterm_code', width: 100, align: 'center'},
        {name: 'pmterm_eng', index: 'pmterm_eng', width: 200, align: 'center'},
        {name: 'pmterm_th', index: 'pmterm_th', hidden: true},
        {name: 'pmterm_day', index: 'pmterm_day', width: 130, align: 'center'},        
        {name: 'deleteflag', index: 'deleteflag', width: 130, align: 'center'},
        {name: 'action',index: 'action', width:80, align: 'center'}
    ];
</script>
<script type="text/javascript" src="../page/js/com_type1.js?_=<?php echo time(); ?>"></script>

<table id="list-paymentterm"></table>
<div id="pager"></div>

<div id="container" style="display:none">
    <form method="post" id="customForm" action="">
        <fieldset class="modal-header">
            <h3 class="modal-title">S042 : PAYMENT TERM</h1>
        </fieldset>
        <fieldset class="modal-body">
            <p>
                <label for="pmterm_code">Payment Term Code: </label>
                <input id="pmterm_code" name="pmterm_code" type="text" />
            </p>
            <p>
                <label for="pmterm_eng">Payment Term (ENG): </label>
                <input id="pmterm_eng" name="pmterm_eng" type="text" />
            </p>
            <p>
                <label for="pmterm_th">Payment Term (TH): </label>
                <input id="pmterm_th" name="pmterm_th" type="text" />
            </p>
            <p>
                <label for="deleteflag">Use Status: </label>
                <select id="deleteflag" name="deleteflag">
                    <option value="-1"> -- Please Select -- </option>
                    <option value="0">Used</option>
                    <option value="1">Unuse</option>
                </select>
            </p>
            <p>
                <label for="pmterm_day">Payment Term Day: </label>
                <textarea id="pmterm_day" name="pmterm_day" cols="" rows=""></textarea>
            </p>
        </fieldset>
        <fieldset class="modal-footer">
            <p style="float: right;">
                <input id="date" name="create_date" type="hidden" value="<?php echo date('Y-m-d'); ?>" />
                <input id="by" name="create_by" type="hidden" value="1" />
                <input id="table" name="table" type="hidden" value="paymentterm" />
                <input id="paymentterm_id" name="paymentterm_id" type="hidden" value="0" />
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