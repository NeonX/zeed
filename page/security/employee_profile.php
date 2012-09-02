<div class="h_line"></div>
<h1>P031 : USER PROFILE</h1>
<div style="float: right;"> <a class="userprofile" href="#customForm"><img type="image" src="../page/images/icons/new-form-24x24.png" title="new" alt="new" value="0" /></a></div>

<div class="cleaner"></div>
<script type="text/javascript">
    var self = this;

    self.table = 'userprofile';
    self.caption = 'Employee &amp; User List:';
    self.columns = [
        'userprofile_id', 'usergroup_id', 'employeetype_id', 'emp_code', 'empname_eng', 
        'user_name', 'password', 'empname_th', 'phone_no', 'workstatus', 'deleteflag', 'action'
    ];
    self.colNames = [
        'User Profile ID', 'User Group ID', 'Employee Type ID', 'Employee Code', 
        'Employee Name (ENG)', 'User Nmae', 'Password', 'Emp. Name (TH)', 'Phone No', 
        'Work Status', 'Status', 'Action'
    ];
    self.colModel = [
        {name: 'userprofile_id', index:'userprofile_id', hidden: true},
        {name: 'usergroup_id', index: 'usergroup_id', hidden: true},
        {name: 'employeetype_id', index: 'employeetype_id', hidden: true},
        {name: 'emp_code', index: 'emp_code', width: 160, align: 'center'},
        {name: 'empname_eng', index: 'empname_eng', width: 165, align: 'center'},
        {name: 'user_name', index: 'user_name', width: 165, align: 'center'},
        {name: 'password', index: 'password', hidden: true},
        {name: 'empname_th', index: 'empname_th', hidden: true},
        {name: 'phone_no', index: 'phone_no', hidden: true},
        {name: 'workstatus', index: 'workstatus', hidden: true},
        {name: 'deleteflag', index: 'deleteflag', width: 60, align: 'center'},
        {name: 'action',index: 'action', width:80, align: 'center'}
    ];
</script>
<script type="text/javascript" src="../page/js/com_type1.js?_=<?php echo time(); ?>"></script>
<style type="text/css">

select.editable {
    width: 90px;
    margin: 4px;
}
input.editable {
    width: 80px;
}
.col1 {
    width: 400px;
    float: left;
}
.col2 {
    width: 400px;
    float: left;
}

.grid {
    clear: both;
    width: 820px;
    float: left;
    margin-top: -30px;
}
</style>

<table id="list-userprofile"></table>
<div id="pager"></div>

<div id="container" style="display:none">
    <form method="post" id="customForm" action="">
       <fieldset class="modal-header">
            <h3 class="modal-title">P031 : USER PROFILE</h1>
        </fieldset>
        <fieldset class="modal-body col1">
            <p>
                <label for="emp_code">Employee Code: </label>
                <input id="emp_code" name="emp_code" type="text" />
            </p>
            <p>
                <label for="empname_eng">Employee Name (ENG): </label>
                <input id="empname_eng" name="empname_eng" type="text" />
            </p>
            <p>
                <label for="phone_no">Phone No: </label>
                <input id="phone_no" name="phone_no" type="text" />
            </p>
            <p>
                <label for="usergroup_id">User Group: </label>
                <select id="usergroup_id" name="usergroup_id">
                    <option value="-1"> -- Please Select -- </option>
                </select>
            </p>
            <p>
                <label for="password">Password: </label>
                <input id="password" name="password" type="password" />
            </p>
        </fieldset>
        <fieldset class="modal-body col2">
            <p>
                <label for="workstatus">Work Status: </label>
                <input id="workstatus" name="workstatus" type="text" />
            </p>
            <p>
                <label for="empname_th">Employee Name (TH): </label>
                <input id="empname_th" name="empname_th" type="text" />
            </p>
            <p>
                <label for="employeetype_id">Employee Type: </label>
                <select id="employeetype_id" name="employeetype_id">
                    <option value="-1"> -- Please Select -- </option>
                </select>
            </p>
            <p>
                <label for="user_name">User Name: </label>
                <input id="user_name" name="user_name" type="text" />
            </p>
        </fieldset>
        <fieldset class="modal-footer" style="clear:both;">
            <p style="float: right;">
                <input id="date" name="create_date" type="hidden" value="<?php echo date('Y-m-d'); ?>" />
                <input id="by" name="create_by" type="hidden" value="1" />
                <input id="table" name="table" type="hidden" value="userprofile" />
                <input id="userprofile_id" name="userprofile_id" type="hidden" value="0" />
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