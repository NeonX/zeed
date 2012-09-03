<?php 
$ref = $_SERVER['HTTP_REFERER'] == 'http://' . $_SERVER['HTTP_HOST'] . '/zeed/page/master/';
?>

<div class="h_line"></div>
<h1>M020 : CURRENCY &amp; EXCHANGE RATE</h1>
<div style="float: right;"> <a class="currency" href="#customForm"><img type="image" src="../page/images/icons/new-form-24x24.png" title="new" alt="new" value="0" /></a></div>

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
    self.table = { main: 'currency', sub: 'exchange' };
    self.caption = { main: 'Curreny List:', sub: 'Exchange Rate List:' } ;

    self.columns = {
        main: [
            'currency_id', 'currcode', 'currdesceng', 'currdescth', 
            'currabbveng', 'currabbvth', 'deleteflag', 'action'
        ], 
        sub: [
            'exchange_id', 'exyear','currency_id', 'exm01', 'exm02', 'exm03', 'exm04', 'exm05', 'exm06',
            'exm07', 'exm08', 'exm09', 'exm10', 'exm11', 'exm12','deleteflag', 'table'
        ]
    };

    self.colNames = {
        main: [
            'Currency ID', 'Currency Code', 'Currency (ENG)', 'Currency (TH)',
            'Currency Abbv (ENG)', 'Currency Abbv (TH)', 'Status', 'Action'
        ], 
        sub: [
            'Exchange ID', 'Year','Currency ID', 'M1', 'M2', 'M3', 'M4', 'M5', 'M6', 
            'M7', 'M8', 'M9', 'M10', 'M11', 'M12', 'Status', 'Table', 'Mode'
        ]
    };

    self.colModel = {
        main: [
            {name: 'currency_id', index:'currency_id', hidden: true},
            {name: 'currcode', index: 'currcode', width: 100, align: 'center'},
            {name: 'currdesceng', index: 'currdesceng', width: 200, align: 'center'},
            {name: 'currdescth', index: 'currdescth', width:200, align: 'center'},
            {name: 'currabbveng', index:'currabbveng', hidden: true},
            {name: 'currabbvth', index:'currabbvth', hidden: true},
            {name: 'deleteflag', index: 'deleteflag', width: 60, align: 'center'},
            {name: 'action',index: 'action', width:80, align: 'center'}
        ],
        sub: [
            {name: 'exchange_id', index:'exchange_id', hidden: true},
            {name: 'exyear', index: 'exyear', width: 80, align: 'center', editable: true},
            {name: 'currency_id', index:'currency_id', editable: true, hidden: true,
                editoptions: {
                  dataInit: function(element) {
                    if (formData != null) {
                        $(element).val(formData.currency_id);
                    }
                  }
                }
            },
            {name: 'exm01', index: 'exm01', width: 55, align: 'center', editable: true},
            {name: 'exm02', index: 'exm02', width: 55, align: 'center', editable: true},
            {name: 'exm03', index: 'exm03', width: 55, align: 'center', editable: true},
            {name: 'exm04', index: 'exm04', width: 55, align: 'center', editable: true},
            {name: 'exm05', index: 'exm05', width: 55, align: 'center', editable: true},
            {name: 'exm06', index: 'exm06', width: 55, align: 'center', editable: true},
            {name: 'exm07', index: 'exm07', width: 55, align: 'center', editable: true},
            {name: 'exm08', index: 'exm08', width: 55, align: 'center', editable: true},
            {name: 'exm09', index: 'exm09', width: 55, align: 'center', editable: true},
            {name: 'exm10', index: 'exm10', width: 55, align: 'center', editable: true},
            {name: 'exm11', index: 'exm11', width: 55, align: 'center', editable: true},
            {name: 'exm12', index: 'exm12', width: 55, align: 'center', editable: true},
            {name: 'deleteflag', index: 'deleteflag', width: 80, hidden: true, align: 'center', editable: true},
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
<script type="text/javascript" src="../<?php echo !$ref ? 'page/' : ''; ?>js/currency.js?_=<?php echo time(); ?>"></script>
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

<table id="list-currency"></table>
<div id="pager"></div>

<div id="container" style="display:<?php echo $display; ?>">
    <form method="post" id="customForm" action="">
        <fieldset class="modal-header">
            <h3 class="modal-title">M032 : CURRENCY &amp; EXCHANGE RATE (ADD &amp; EDIT)</h1>
        </fieldset>
        <fieldset class="modal-body col1">
            <p>
                <label for="currcode">Currency Code: </label>
                <input id="currcode" name="currcode" type="text" />
            </p>
            <p>
                <label for="currdesceng">Currency Desc (ENG): </label>
                <input id="currdesceng" name="currdesceng" type="text" />
            </p>
            <p>
                <label for="currabbveng">Currency Abbv (ENG): </label>
                <input id="currabbveng" name="currabbveng" type="text" />
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
                <label for="currdescth">Currency Desc (TH): </label>
                <input id="currdescth" name="currdescth" type="text" />
            </p>
            <p>
                <label for="currabbvth">Currency Abbv (TH):: </label>
                <input id="currabbvth" name="currabbvth" type="text" />
            </p>
        </fieldset>
        <fieldset class="modal-body grid">
            <div id="div_record_add" style="float: right;"><input style="height:24px;width:24px;" id="record_add" type="image" src="../page/images/icons/record-add-24x24.png" /></div>
            <div style="clear:both;"></div>
            <table id="list-exchange"></table>
        </fieldset>
        <fieldset class="modal-footer" style="clear:both;">
            <p style="float: right;">
                <input id="date" name="create_date" type="hidden" value="<?php echo date('Y-m-d'); ?>" />
                <input id="by" name="create_by" type="hidden" value="1" />
                <input id="table" name="table" type="hidden" value="currency" />
                <input id="currency_id" name="currency_id" type="hidden" value="0" />
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