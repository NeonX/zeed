<div class="h_line"></div>
<h1>S010 : ANNOUNCEMENT</h1>
<div style="float: right;"> <a class="announce" href="#customForm"><img type="image" src="../page/images/icons/new-form-24x24.png" title="new" alt="new" value="0" /></a></div>

<div class="cleaner"></div>
<script type="text/javascript">
    var self = this;

    self.table = 'announce';
    self.caption = 'Announce List:';
    self.columns = [
        'announce_id', 'announce_no','announce_head', 'announce_detail',
        'start_date', 'end_date', 'deleteflag', 'action'
    ];
    self.colNames = [
        'Announce Id', 'Announce No','Announce Head', 'Announce Detail',
        'Start Date', 'End Date', 'Status', 'Action'
    ];
    self.colModel = [
        {name: 'announce_id', index:'announce_id', hidden: true},
        {name: 'announce_no', index: 'announce_no', width: 80, align: 'center'},
        {name: 'announce_head', index: 'announce_head', width: 130},
        {name: 'announce_detail', index: 'announce_detail', width: 130},
        {name: 'start_date', index: 'start_date', width: 80,  sorttype:"date", align: 'center'},
        {name: 'end_date', index: 'end_date', width: 80,  sorttype:"date", align: 'center'},
        {name: 'deleteflag', index: 'deleteflag', width: 53, align: 'center'},
        {name: 'action',index: 'action', width:80, align: 'center'}
    ];
    
    $(function () {
        $('#start_date').datepicker({dateFormat:'yy-mm-dd'});
        $('#end_date').datepicker({dateFormat:'yy-mm-dd'});
    });
    
</script>
<script type="text/javascript" src="../page/js/com_type1.js?_=<?php echo time(); ?>"></script>

<table id="list-announce"></table>
<div id="pager"></div>

<div id="container" style="display:none">
    <form method="post" id="customForm" action="">
        <fieldset class="modal-header">
            <h3 class="modal-title">S010 : ANNOUNCEMENT</h1>
        </fieldset>
        <fieldset class="modal-body">
            <p>
                <label for="announce_no">Announce No: </label>
                <input id="announce_no" name="announce_no" type="text" />
            </p>
            <p>
                <label for="announce_head">Announce Header: </label>
                <input id="announce_head" name="announce_head" type="text" />
            </p>


            <p>
                <label for="start_date">Start Date: </label>
                <input id="start_date" name="start_date" type="text" />
            </p>
            <p>
                <label for="end_date">End Date: </label>
                <input id="end_date" name="end_date" type="text" />
            </p>
            <p>
                <label for="announce_by">Announce By: </label>
                <input id="announce_by" name="announce_by" type="text" />
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
                <label for="announce_detail">Description: </label>
                <textarea id="announce_detail" name="announce_detail" cols="" rows=""></textarea>
            </p>
        </fieldset>

        <fieldset class="modal-footer">
            <p style="float: right;">
                <input id="date" name="create_date" type="hidden" value="<?php echo date('Y-m-d'); ?>" />
                <input id="by" name="create_by" type="hidden" value="1" />
                <input id="table" name="table" type="hidden" value="announce" />
                <input id="announce_id" name="announce_id" type="hidden" value="0" />
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