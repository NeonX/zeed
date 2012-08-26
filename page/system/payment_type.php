<?php 
$ref = $_SERVER['HTTP_REFERER'] == 'http://' . $_SERVER['HTTP_HOST'] . '/zeed/page/master/';
?>

<div class="h_line"></div>
<h1>S041 : PAYMENT TYPE</h1>
<div style="float: right;"> <a class="paymenttype" href="#customForm"><img type="image" src="../page/images/icons/new-form-24x24.png" title="new" alt="new" value="0" /></a></div>

<div class="cleaner"></div>
<?php
$display = 'none';
if ($ref) {
    echo '<script type="text/javascript" src="../../libs/jquery/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../../libs/jquery/jquery-ui-1.8.21.custom.min.js"></script>
    <script type="text/javascript" src="../../libs/jqgrid/i18n/grid.locale-th.js"></script>
    <script type="text/javascript" src="../../libs/jqgrid/jquery.jqGrid.min.js"></script>
    <script type="text/javascript" src="../../libs/fancyBox/source/jquery.fancybox.js"></script>


    <link rel="stylesheet" href="../../libs/fancyBox/source/jquery.fancybox.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../../libs/bootstrap.min.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../../libs/jquery/ui-lightness/jquery-ui-1.8.21.custom.css" type="text/css" />
    <link rel="stylesheet" href="../../libs/jqgrid/jqgrid/ui.jqgrid.css" type="text/css" />

    <link href="../css/default.css" rel="stylesheet" type="text/css" />
    <link href="../css/leftmenu_orange.css" rel="stylesheet" type="text/css" />
    <link href="../css/form.css" rel="stylesheet" type="text/css" media="screen" />';

    $display = 'block';

}
?>
<script type="text/javascript">
var self = this;
$(function () {
    self.table = { main: 'paymenttype', sub: 'paymentstatus' };
    self.caption = { main: 'Payment Type List:', sub: 'Exchange Rate List:' } ;

    self.columns = {
        main: [
            'paymenttype_id', 'pmtype_code', 'pmtype_eng', 'pmtype_th', 
            'deleteflag', 'action'
        ], 
        sub: [
            'paymentstatus_id', 'paymenttype_id', 'pmstatus_seq', 'pmstatus_eng', 'pmstatus_th', 'deleteflag', 'table'
        ]
    };

    self.colNames = {
        main: [
            'Payment Type ID', 'Payment Type Code', 'Payment Type (ENG)', 
            'Payment Type (TH)', 'Status', 'Action'
        ], 
        sub: [
            'Payment Status ID', 'Payment Type ID','Seq', 
            'Payment Type (ENG)', 'Payment Type (TH)',  'Status', 'Table', 'Mode'
        ]
    };

    self.colModel = {
        main: [
            {name: 'paymenttype_id', index:'paymenttype_id', hidden: true},
            {name: 'pmtype_code', index: 'pmtype_code', width: 100, align: 'center'},
            {name: 'pmtype_eng', index: 'pmtype_eng', width: 200, align: 'center'},
            {name: 'pmtype_th', index: 'pmtype_th', width:200, align: 'center'},
            {name: 'deleteflag', index: 'deleteflag', width: 60, align: 'center'},
            {name: 'action',index: 'action', width:80, align: 'center'}
        ],
        sub: [
            {name: 'paymentstatus_id', index:'paymentstatus_id', hidden: true},
            {name: 'paymenttype_id', index:'paymenttype_id', editable: true, hidden: true,
                editoptions: {
                  dataInit: function(element) {
                    $(element).val(formData.paymenttype_id);
                  }
                }
            },
            {name: 'pmstatus_seq', index: 'pmstatus_seq', width: 200, align: 'center', editable: true},
            {name: 'pmstatus_eng', index: 'pmstatus_eng', width: 250, align: 'center', editable: true},
            {name: 'pmstatus_th', index: 'pmstatus_th', width: 250, align: 'center', editable: true},
            {name: 'deleteflag', index: 'deleteflag', width: 110, editable: true, edittype:"select", editoptions: {}, align: 'center'},
            {name: 'table', index:'table', editable: true, hidden: true,
                editoptions: {
                  dataInit: function(element) {
                    $(element).val(self.table.sub);
                  }
                }
            },
            {name: 'mode', index:'mode', editable: true, hidden: true,
                editoptions: {
                  dataInit: function(element) {
                       $(element).val(self.smode);
                  }
                }
            }
        ]
    };
});

</script>
<script type="text/javascript" src="../<?php echo !$ref ? 'page/' : ''; ?>js/payment_type.js?_=<?php echo time(); ?>"></script>
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

<table id="list-paymenttype"></table>
<div id="pager"></div>

<div id="container" style="display:<?php echo $display; ?>">
    <form method="post" id="customForm" action="">
        <fieldset class="modal-header">
            <h3 class="modal-title">S041 : PAYMENT TYPE &amp; STATUS (ADD &amp; EDIT)</h1>
        </fieldset>
        <fieldset class="modal-body col1">
            <p>
                <label for="pmtype_code">Payment Type Code: </label>
                <input id="pmtype_code" name="pmtype_code" type="text" />
            </p>
            <p>
                <label for="pmtype_eng">Payment Type (ENG): </label>
                <input id="pmtype_eng" name="pmtype_eng" type="text" />
            </p>
            </fieldset>
            <fieldset class="modal-body col2">
            <p>
                <label for="deleteflag">Use Status: </label>
                <select id="deleteflag" name="deleteflag">
                    <option value="-1"> -- Please Select -- </option>
                    <option value="0">Used</option>
                    <option value="1">Unuse</option>
                </select>
            </p>
            <p>
                <label for="pmtype_th">Payment Type (TH): </label>
                <input id="pmtype_th" name="pmtype_th" type="text" />
            </p>
        </fieldset>
        <fieldset class="modal-body grid">
            <div id="div_record_add" style="float: right;"><input style="height:24px;width:24px;" id="record_add" type="image" src="../page/images/icons/record-add-24x24.png" /></div>
            <div style="clear:both;"></div>
            <table id="list-paymentstatus"></table>
        </fieldset>
        <fieldset class="modal-footer" style="clear:both;">
            <p style="float: right;">
                <input id="date" name="create_date" type="hidden" value="<?php echo date('Y-m-d'); ?>" />
                <input id="by" name="create_by" type="hidden" value="1" />
                <input id="table" name="table" type="hidden" value="paymenttype" />
                <input id="paymenttype_id" name="paymenttype_id" type="hidden" value="0" />
                <input id="mode" name="mode" type="hidden" value="insert" />

                <button type="button" id="save" name="save" class="btn btn-success">
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