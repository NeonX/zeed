/**
 * javacript file com_type2.js
 * Narong Rammanee
 * ranarong@gmail.com
 *
 * Latest Release: Aug 2012
 * 
 */
$(function () {
    console.debug();
    self.getAllURL  =  '../page/common/getDataAll.php',
    self.getAllT2URL   =  '../page/common/getDataAllT2.php',
    self.getByIdT2URL =  '../page/common/getDataByIdT2.php',
    self.saveT2URL    =  '../page/common/saveDataT2.php',
    self.mColId      = self.table.main + '_id',
    self.sColId      = self.table.sub + '_id',
    self.mGrid       = $('#list-' + self.table.main),
    self.sGrid       = $('#list-' + self.table.sub),

    self.mode       = $('#mode'),
    self.anchor     = $('a[class^="' + self.table.main + '"]'),
    self.form       = $('#customForm'),
    self.recovery   = $('#recovery'),
    self.del        = $('#delete'),
    self.date       = $('#date'),
    self.by         = $('#by'),
    self.options    = $('<option />'),
    self.lastsel2   = null,
    self.rowCounter = 0;

    self.mGrid.jqGrid({
        url         : self.getAllURL,
        datatype    : 'json',
        postData    : { columns : function () { return self.columns.main }, table: function () { return self.table.main } },
        height      : 350,
        colNames    : self.colNames.main,
        colModel    : self.colModel.main,
        gridComplete: function () {
            mData = self.mGrid.getRowData();
            var ids = self.mGrid.jqGrid('getDataIDs');
            for(var i=0;i < ids.length;i++){
                var cl = ids[i];
                be = '<a href="#customForm" class="' + self.table.main +'"><img type="image" class="list-icon-edit" src="../page/images/icons/cfg-edit-16x16.png" title="edit" alt="view" value="' + cl + '"></a>'; 
                self.mGrid.jqGrid('setRowData',ids[i],{action:be});
            }
        },
        rowNum      : 15,
        autowidth   : true,
        shrinkToFit : false,
        rowList     : [10, 20, 30],

        pager       : $('#pager'),
        sortname    : self.mColId,
        viewrecords : true,
        sortorder   : 'asc',
        caption     : self.caption.main
    })
    .navGrid('#pager', { edit: false, add:false, del: false, search: false, refresh: true });

    self.anchor.fancybox({
        title: 'Registration process',
        helpers:  {
            title:  null
        },
        beforeLoad: function () {
            var _self = this,
             _id = $(_self.element.innerHTML).get(0).getAttribute('value');

            $.ajax({
                type        : 'GET',
                cache       : false,
                datatype    : 'json',
                url         : self.getByIdT2URL,
                data        : { table: self.table.sub, id: _id,  columns: self.columns.sub },
                success     : function (data) {
                    rec = data;

                    $.each(mData, function (index, obj) {
                        if (_id == obj.goods_id) {
                            formData = mData[index];
                        }
                    });

                    $.each(rec.goodstype, function (index, obj) {
                        if (formData.goodstype_id == obj.goodstype_id) {
                            goodsTypeName = obj.goodstype_th;
                        }
                    });

                    self.rowCounter = rec.last_row + 1;

                    $('#goods_code').val(formData.goodscode).attr('disabled', 'disabled');
                    $('#goods_name_eng').val(formData.goodsname_eng).attr('disabled', 'disabled');
                    $('#goods_type').val(goodsTypeName).attr('disabled', 'disabled');
                    $('#goods_name_th').val(formData.goodsname_th).attr('disabled', 'disabled');
                    $('#goods_name_th').val(formData.goodsname_th).attr('disabled', 'disabled');

                    self.sGrid.jqGrid('setGridParam',{
                        url         : self.getAllT2URL,
                        postData    : { columns : function () { return self.columns.sub }, id: function () { return _id}, table: function () { return self.table.sub } }
                    }).trigger("reloadGrid");

                    self.sGrid.jqGrid({
                        url         : self.getAllT2URL,
                        datatype    : 'json',
                        postData    : { columns : function () { return self.columns.sub }, id: function () { return _id}, table: function () { return self.table.sub } },
                        height      : 250,
                        colNames    : self.colNames.sub,
                        colModel    : [
                            {name: 'goodsprice_id', index:'goodsprice_id', hidden: true},
                            {name: 'goods_id', index:'goods_id', editable: true, hidden: true,
                                editoptions: {
                                  dataInit: function(element) {
                                    $(element).val(formData.goods_id);
                                  }
                                }
                            },
                            {name: 'unit_id', index:'unit_id', width: 100, editable: true, edittype:"select", editoptions: {},editrules: { required: true }, align: 'center'},
                            {name: 'currency_id', index: 'currency_id', width: 100, editable: true, edittype:"select", editoptions: {}, align: 'center'},
                            {name: 'cost', index: 'cost', width: 100, editable: true, align: 'center' },
                            {name: 'price', index: 'price', width:100, editable: true, align: 'center'},
                            {name: 'discount', index:'discount', width: 100, editable: true, align: 'center'},
                            {name: 'effective_date', index:'effective_date', width: 100, editable: true, align: 'center',
                                editoptions: {
                                  dataInit: function(element) {
                                    $(element).datepicker({dateFormat: 'yy-mm-dd'});
                                  }
                                }
                            },
                            {name: 'deleteflag', index: 'deleteflag', width: 100, align: 'center', editable: true, edittype:"select", editoptions: {value: "0:Use;1:Not use"}},
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
                            },
                            {name: 'action',index: 'action', width:70, align: 'center'}
                        ],
                        gridComplete: function () {
                            var ids = self.sGrid.jqGrid('getDataIDs');
                            for(var i=0;i < ids.length;i++){
                                var cl = ids[i];
                                be = "<input class='row-edit' style='height:16px;width:16px;' type='image' src='../page/images/icons/form-edit-16x16.png' onclick=\"jQuery('#list-" + self.table.sub + "').editRow('"+cl+"');\"  />"; 
                                se = "<input style='margin-left: 5px;height:16px;width:16px;' type='image' src='../page/images/icons/disk-16x16.png' onclick=\"jQuery('#list-" + self.table.sub + "').saveRow('"+cl+"');\"  />"; 
                                ce = "<input style='margin-left: 5px;height:16px;width:16px;' type='image' src='../page/images/icons/cancel-16x16.png' onclick=\"jQuery('#list-" + self.table.sub + "').restoreRow('"+cl+"');\" />";
                                self.sGrid.jqGrid('setRowData',ids[i],{action:be+se+ce});
                            }
                            self.sGrid.setColProp('unit_id', { editoptions: { value: lookupUnit(data.unit).toString() } });
                            self.sGrid.setColProp('currency_id', { editoptions: { value: lookupCurrency(data.currency).toString() } });
                            self.sGrid.setColProp('currency_id', { editoptions: { value: lookupCurrency(data.currency).toString() } });

                            $('.row-edit').bind('click', function () {
                                console.debug('row-edit');
                                self.smode = 'update';
                            });

                        },
                        editurl     : self.saveT2URL,
                        rowNum      : 10,
                        autowidth   : true,
                        shrinkToFit : false,
                        rowList     : [10, 20, 30],
                        pager       : $('#pager'),
                        sortname    : self.sColId,
                        viewrecords : true,
                        sortorder   : 'asc',
                        caption     : self.caption.sub
                    })
                    .navGrid('#pager', { edit: false, add:false, del: false, search: false, refresh: true });
                }
            });
        },
        beforeClose: function () {
            console.debug('beforeClose');
        }
    });

    $('#record_add').bind('click', function () {
        self.smode = 'insert';
        self.sGrid.addRowData(self.rowCounter, {});
        $('#list-goodsprice').editRow(self.rowCounter);
        self.rowCounter++;
    });

    self.form.bind('submit', function () {
        return false;
    });
});

var lookupUnit = function (data) {
    var tmp = [], str = '';
    $.each(data, function (index, obj) {
        tmp.push(obj.unit_id + ':' + obj.unitcode)
    });

    return tmp.join(';');
};

var lookupCurrency = function (data) {
    var tmp = [], str = '';
    $.each(data, function (index, obj) {
        tmp.push(obj.currency_id + ':' + obj.currabbveng)
    });

    return tmp.join(';');
};

Array.prototype.swap = function (x,y) {
    var t = this[x];
    this[x] = this[y];
    this[y] = t;
    return this;
}