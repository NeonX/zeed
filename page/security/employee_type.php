<div class="h_line"></div>
<h1>P030 : EMPLOYEE TYPE</h1>
<div style="float: right;"> <a class="employeetype" href="#customForm"><img type="image" src="../page/images/icons/new-form-24x24.png" title="new" alt="new" value="0" /></a></div>

<div class="cleaner"></div>
<script type="text/javascript">
    var self = this;

    self.table = 'employeetype';
    self.caption = 'Goods Type List:';
    self.columns = [
        'employeetype_id', 'emptype_code','emptype_th', 'emptype_eng', 'deleteflag', 'action'
    ];
    self.colNames = [
        'employeetype_id', 'emptype_code', 'emptype_th','emptype_eng', 'deleteflag', 'action'
    ];
    self.colModel = [
        {name: 'employeetype_id', index:'employeetype_id', hidden: true},
        {name: 'emptype_code', index: 'emptype_code', width: 115, align: 'center'},
        {name: 'emptype_th', index: 'emptype_th', width: 165, align: 'center'},
        {name: 'emptype_eng', index: 'emptype_eng', width: 165, align: 'center'},
        {name: 'deleteflag', index: 'deleteflag', width: 115, align: 'center'},
        {name: 'action',index: 'action', width:80, align: 'center'}
    ];
</script>
<script type="text/javascript" src="../page/js/com_type1.js?_"<?php echo time(); ?>></script>

<table id="list-employeetype"></table>
<div id="pager"></div>

<div id="container" style="display:none">
    <form method="post" id="customForm" action="">
        <fieldset class="modal-header">
            <h3 class="modal-title">P030 : EMPLOYEE TYPE</h1>
        </fieldset>
        <fieldset class="modal-body">
             <p>
                <label for="emptype_code">Emp. Type Code: </label>
                <input id="emptype_code" name="emptype_code" type="text" />
            </p>
            <p>
                <label for="emptype_eng">Emp. Type Name (ENG): </label>
                <input id="emptype_eng" name="emptype_eng" type="text" />
            </p>
            <p>
                <label for="emptype_th">Emp. Type Name (ENG): </label>
                <input id="emptype_th" name="emptype_th" type="text" />
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
        <fieldset class="modal-footer" style="clear:both;">
           <p style="float: right;">
                <input id="date" name="create_date" type="hidden" value="<?php echo date('Y-m-d'); ?>" />
                <input id="by" name="create_by" type="hidden" value="1" />
                <input id="table" name="table" type="hidden" value="employeetype" />
                <input id="employeetype_id" name="employeetype_id" type="hidden" value="0" />
                <input id="mode" name="mode" type="hidden" value="insert" />

                <button type="submit" id="save" name="save" class="btn btn-success">
                    <i class="icon-plus-sign icon-white"></i>
                    <span>Save</span>
                </button>
                <button type="reset" id="cancel" name="cancel" class="btn btn-warning cancel">
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