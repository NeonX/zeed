<div class="h_line"></div>
<h1>M020 : USER GROUP</h1>
<div style="float: right;"> <a class="usergroup" href="#customForm"><img type="image" src="../page/images/icons/new-form-24x24.png" title="new" alt="new" value="0" /></a></div>

<div class="cleaner"></div>
<link rel="stylesheet" href="../page/css/form.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../page/js/fancyBox/source/jquery.fancybox.css" type="text/css" media="screen" />

<script type="text/javascript" src="../page/js/fancyBox/source/jquery.fancybox.js"></script>
<script type="text/javascript" src="../page/js/user_group.js"></script>

<table id="list-usergroup"></table>
<div id="pager"></div>

<div id="container" style="display:none">
    <form method="post" id="customForm" action="">
        <fieldset>
            <h1>0M40 : CUSTOMER TYPE</h1>
             <p>
                <label for="usergroup_code">User Group Code: </label>
                <input id="usergroup_code" name="usergroup_code" type="text" />
                <span id="usergroup_code_info">User Group Code is require!</span>
            </p>
            <p>
                <label for="usergroup_eng">User Group Name (ENG): </label>
                <input id="usergroup_eng" name="usergroup_eng" type="text" />
                <span id="usergroup_eng_info">User Group Name (ENG) is require!</span>
            </p>
            <p>
                <label for="usergroup_th">User Group Name (ENG): </label>
                <input id="usergroup_th" name="usergroup_th" type="text" />
                <span id="usergroup_th_info">User Group Name (ENG) is require!</span>
            </p>
            <p>
                <label for="deleteflag">Use Status: </label>
                <select id="deleteflag" name="deleteflag">
                    <option value="-1"> -- Please Select -- </option>
                    <option value="0">Used</option>
                    <option value="1">Unuse</option>
                </select>
                <span id="deleteflag_info">Use Status is require!</span>
            </p>
            <p class="btn">
                <input id="date" name="create_date" type="hidden" value="<?php echo date('Y-m-d'); ?>" />
                <input id="by" name="create_by" type="hidden" value="1" />
                <input id="table" name="table" type="hidden" value="usergroup" />
                <input id="usergroup_id" name="usergroup_id" type="hidden" value="0" />
                <input id="mode" name="mode" type="hidden" value="insert" />
                <input id="save" name="save" type="submit" value="Save" />
                <input id="cancle" name="cancle" type="reset" value="Cancle" />
                <input id="delete" name="delete" type="button" value="Delete" />
                <input id="recovery" name="recovery" type="button" value="Recovery" />
            </p>
        </fieldset>
    </form>
</div>