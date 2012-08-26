/**
 * javacript file com_type2.js
 * Narong Rammanee
 * ranarong@gmail.com
 *
 * Latest Release: Aug 2012
 * 
 */
$(function () {
    self.getAllURL    =  '../page/common/getDataAll.php',
    self.getAllT2URL  =  '../page/common/getDataAllT2.php',
    self.getByIdT2URL =  '../page/common/getDataByIdT2.php',
    self.saveT2URL    =  '../page/common/saveDataT2.php',
    self.mColId       = self.table.main + '_id',
    self.sColId       = self.table.sub + '_id',
    self.mGrid        = $('#list-' + self.table.main),
    self.sGrid        = $('#list-' + self.table.sub),

    self.mode         = $('#mode'),
    self.anchor       = $('a[class^="' + self.table.main + '"]'),
    self.form         = $('#customForm'),
    self.recovery     = $('#recovery'),
    self.del          = $('#delete'),
    self.date         = $('#date'),
    self.by           = $('#by'),
    self.options      = $('<option />'),
    self.addNewRowId  = 0,
    self.lastsel      = 0,
    self.arrSaveId    = new Array(),
    self.recordAdded  = false;

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

                    var newArrId = [];
                    $.each(rec.record, function(index, obj) {
                       newArrId[index] = obj[self.sColId];
                    });

                    if (newArrId.length > 0) {
                        self.addNewRowId = newArrId.max() + 1;
                    } else {
                        self.addNewRowId = 1;
                    }

                    $('#goods_code').val(formData.goodscode).attr('disabled', 'disabled');
                    $('#goods_name_eng').val(formData.goodsname_eng).attr('disabled', 'disabled');
                    $('#goods_type').val(goodsTypeName).attr('disabled', 'disabled');
                    $('#goods_name_th').val(formData.goodsname_th).attr('disabled', 'disabled');
                    $('#goods_name_th').val(formData.goodsname_th).attr('disabled', 'disabled');

                    self.sGrid.jqGrid('setGridParam', {
                        url         : self.getAllT2URL,
                        postData    : { columns : function () { return self.columns.sub }, id: function () { return _id}, table: function () { return self.table.sub } }
                    }).trigger("reloadGrid");

                    self.sGrid.jqGrid({
                        url         : self.getAllT2URL,
                        datatype    : 'json',
                        postData    : { columns : function () { return self.columns.sub }, id: function () { return _id}, table: function () { return self.table.sub } },
                        height      : 250,
                        colNames    : self.colNames.sub,
                        colModel    : self.colModel.sub,
                        gridComplete: function () {
                            var ids = self.sGrid.jqGrid('getDataIDs');
                            for (var i=0;i < ids.length;i++) {

                                if (self.smode != 'insert') {
                                    eachRow = self.sGrid.jqGrid('getRowData', ids[i]);

                                    if (self.table.sub == 'goodsprice') {
                                        self.sGrid.jqGrid('setRowData',ids[i],{currency_id: rec.currency[eachRow.currency_id - 1].currabbveng});
                                    } else if (self.table.sub == 'goodsunit') {
                                        self.sGrid.jqGrid('setRowData',ids[i],{use_instock: eachRow.use_instock == '1' ? 'Not Use' : 'Used' });
                                        self.sGrid.jqGrid('setRowData',ids[i],{use_inorder: eachRow.use_inorder == '1' ? 'Not Use' : 'Used' });
                                    }
                                    self.sGrid.jqGrid('setRowData',ids[i],{unit_id: rec.unit[eachRow.unit_id - 1].unitnameeng});
                                    self.sGrid.jqGrid('setRowData',ids[i],{deleteflag: eachRow.deleteflag == '1' ? 'Not Use' : 'Used' });
                                }
                                self.sGrid.setColProp('unit_id', { editoptions: { value: lookupUnit(data.unit) } });
                                self.sGrid.setColProp('currency_id', { editoptions: { value: lookupCurrency(data.currency) } });
                                self.sGrid.setColProp('deleteflag',  { editoptions: { value: "1:Not Use;0:Used"} });
                                self.sGrid.setColProp('use_instock', { editoptions: { value: "1:Not Use;0:Used"} });
                                self.sGrid.setColProp('use_inorder', { editoptions: { value: "1:Not Use;0:Used"} });
                            }

                            $('.row-edit').bind('click', function () {
                                self.smode = 'update';
                            });

                        },
                        ondblClickRow: function (id) {
                            self.sGrid.jqGrid('editRow', id, true, pickdates);
                            self.arrSaveId[self.lastsel++] = id;
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
            self.smode = 'update';
            self.recordAdded = false;
        }
    });

    $('#record_add').bind('click', function () {
        if (!self.recordAdded) {
            self.smode = 'insert';
            self.sGrid.addRowData(self.addNewRowId, {});
            self.sGrid.editRow(self.addNewRowId, true, pickdates);
            self.arrSaveId[self.addNewRowId] = self.addNewRowId;
            self.recordAdded = true;
        } else {
            alert('เพิ่มเรคคอร์ดแล้ว');
        }
    });

    self.form.bind('submit', function () {
        console.debug('submit');
        return false;
    });

    $('#save').bind('click', function () {
        $.each(self.arrSaveId, function (index, value) {
            self.sGrid.jqGrid('saveRow', value);
        });
        $.fancybox('บันทีกเรียบร้อยแล้ว');
    });
});

var pickdates = function (id) {
    jQuery('#' + id + '_effective_date', '#list-' + self.table.sub).datepicker({dateFormat:'yy-mm-dd'});
}

var lookupUnit = function (data) {
    var tmp = [], str = '';
    $.each(data, function (index, obj) {
        tmp.push(obj.unit_id + ':' + obj.unitnameeng);
    });

    return tmp.join(';').toString();
};

var lookupCurrency = function (data) {
    var tmp = [], str = '';
    $.each(data, function (index, obj) {
        tmp.push(obj.currency_id + ':' + obj.currabbveng);
    });

    return tmp.join(';').toString();
};

Array.prototype.swap = function (x,y) {
    var t = this[x];
    this[x] = this[y];
    this[y] = t;
    return this;
}

Array.prototype.max = function () {
    return Math.max.apply(null, this);
};