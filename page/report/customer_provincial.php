<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/zeed/includes/init.inc.php';

$report = new Report();

$customertype = $report->getAll('customertype', array('customertype_id', 'custtype_code', 'custtype_eng'));
$zone = $report->getAll('zone', array('zone_id', 'zone_code', 'zonename_eng'));
$province = $report->getAll('province', array('province_id', 'province_th'));
?>
<div class="h_line"></div>
<h1>M010 : COUNT UNIT</h1>

<div class="cleaner"></div>

<!-- <script type="text/javascript" src="../page/js/com_type1.js?_=<?php /*echo time();*/ ?>"></script> -->

<div id="pager"></div>

<div id="container">
    <form method="post" id="customForm" style="width: 680px;" action="">
       <fieldset class="modal-header">
            <h3 class="modal-title">Input Criteria:</h1>
        </fieldset>
        <fieldset class="modal-body">
            <p>
                <label for="customertype">Customer Type: </label>
                <select id="customertype" name="customertype">
                    <option value="-1"> -- Please Select -- </option>
                    <?php
                        foreach ($customertype as $k => $cust) {
                            echo '<option value="', $cust->customertype_id, '">', $cust->custtype_code . ': ' . $cust->custtype_eng ,'</option>';
                        }
                    ?>
                </select>
            </p>
            <p>
                <label for="customershop">Customer/Shop: </label>
                <input id="customershop" name="customershop" type="text" />
            </p>
            <p>
                <label for="zone">Zone: </label>
                <select id="zone" name="zone">
                    <option value="-1"> -- Please Select -- </option>
                    <?php
                        foreach ($zone as $k => $z) {
                            echo '<option value="', $z->zone_id, '">', $z->zone_code . ': ' . $z->zonename_eng ,'</option>';
                        }
                    ?>
                </select>
            </p>
            <p>
                <label for="province">Province: </label>
                <select id="province" name="province">
                    <option value="-1"> -- Please Select -- </option>
                    <?php
                        foreach ($province as $k => $p) {
                            echo '<option value="', $p->province_id, '">', $p->province_th ,'</option>';
                        }
                    ?>
                </select>
            </p>
        </fieldset>
        <fieldset class="modal-footer">
            <p style="text-align: center;">
                <input id="date" name="create_date" type="hidden" value="<?php echo date('Y-m-d'); ?>" />
                <input id="by" name="create_by" type="hidden" value="1" />
                <input id="table" name="table" type="hidden" value="unit" />
                <input id="unit_id" name="unit_id" type="hidden" value="0" />
                <input id="mode" name="mode" type="hidden" value="insert" />

                <button type="button" id="recovery" name="recovery" class="btn btn-primary save">
                    <i class="icon-search icon-white"></i>
                    <span>Search</span>
                </button>
                <button type="reset" id="cancel" name="cancel" class="btn btn-warning cancel">
                    <i class="icon-ban-circle icon-white"></i>
                    <span>Clear</span>
                </button>
                
            </p>
        </fieldset>
        <div style="float: right;">
            <button type="reset" id="cancel" name="cancel" class="btn btn-success">
                <i class="icon-circle-arrow-up icon-white"></i>
                <span>Export</span>
            </button>
        </div>
        <div style="clear: both; margin-top: 32px;"></div>
        <table id="list-customerprovicial"></table>
    </form>
</div>

<script type="text/javascript">
    var self = this;

    self.caption = 'Result: ' + 'X record(s)';

    self.getAllURL  = '../page/common/getDataAll.php';
//     self.colId      = 'customerprovicial_id';
    self.columns = [
        'number', 'zone', 'province', 'customertype', 'customershop'
    ];
    self.colNames = [
        '#', 'Zone', 'Province', 'Customer Type', 'Customer / Shop'
    ];
    self.colModel = [
        {name: 'number', index:'number', width: 100, align: 'center'},
        {name: 'zone', index: 'zone', width: 100, align: 'center'},
        {name: 'province', index: 'province', width: 150, align: 'center'},
        {name: 'customertype', index: 'customertype', width: 150, align: 'center'},
        {name: 'customershop', index: 'customershop', width: 150, align: 'center'}
    ];

    // Initialize grid.
    $('#list-customerprovicial').jqGrid({
        url         : self.getAllURL,
        datatype    : 'json',
        width       : 600,
        height      : 250,
        colNames    : self.colNames,
        colModel    : self.colModel,
        rowNum      : 15,
        autowidth   : true,
        shrinkToFit : false,
        rowList     : [10, 20, 30],
        pager       : $('#pager'),
//         sortname    : self.colId,
        viewrecords : true,
        sortorder   : 'asc',
        caption     : self.caption
    })
    .navGrid('#pager', { edit: false, add:false, del: false, search: false, refresh: true });
</script>