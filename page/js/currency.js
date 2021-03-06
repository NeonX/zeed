/**
 * javacript file currency.js
 * Narong Rammanee
 * ranarong@gmail.com
 *
 * Latest Release: Aug 2012
 * 
 */
$(function () {
    self.getAllURL    =  '../page/common/getDataAll.php',
    self.saveURL      =  '../page/common/saveData.php',
    self.getAllT2URL  =  '../page/common/getDataAllT2.php',
    self.getByIdT2URL =  '../page/common/getDataByIdT2.php',
    self.saveT2URL    =  '../page/common/saveDataT2.php',
    self.mColId      = self.table.main + '_id',
    self.sColId      = self.table.sub + '_id',
    self.mGrid       = $('#list-' + self.table.main),
    self.sGrid       = $('#list-' + self.table.sub),
    self.mData       = null,
    self.formData    = null,

    self.mode       = $('#mode'),
    self.anchor     = $('a[class^="' + self.table.main + '"]'),
    self.form       = $('#customForm'),
    self.recovery   = $('#recovery'),
    self.del        = $('#delete'),
    self.date       = $('#date'),
    self.by         = $('#by'),
    self.options    = $('<option />'),
    self.lastsel2   = null,
    self.rowCounter = 0,
    self.addNewRowId  = 0,
    self.addNewRowIdx = 0,
    self.addNewYear   = 0,
    self.lastsel      = 0,
    self.arrSaveId    = [],
    self.recordAdded  = false;

    // Initialize main grid.
    self.mGrid.jqGrid({
        url         : self.getAllURL,
        datatype    : 'json',
        postData    : {
            columns : function () { return self.columns.main },
            table: function () { return self.table.main }
        },
        height      : 350,
        colNames    : self.colNames.main,
        colModel    : self.colModel.main,
        gridComplete: function () {
            self.mData = self.mGrid.getRowData();
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

    // Show fancybox popup.
    self.anchor.fancybox({
        title: 'Registration process',
        helpers:  {
            title:  null
        },
        beforeLoad: function () {
            var _self = this,
                _id = $(_self.element.innerHTML).get(0).getAttribute('value'),
                mode = $(_self.element.innerHTML).get(0).getAttribute('title');
                buttons = ['save', 'cancel', 'delete', 'recovery'];

            // Show all buttons.
            $.each(buttons, function (index, value) {
                $('#' + value).show();
            });

            // clear arrSaveId
            self.arrSaveId = [];

             if (mode == 'new') {
                self.mode.val('insert');
                self.del.hide();
                self.recovery.hide();
                self.date.attr({ name: 'create_date'});
                self.by.attr({ name: 'create_by'});
            } else {
                self.mode.val('update');
                self.date.attr({ name: 'lastupdate_date'});
                self.by.attr({ name: 'lastupdate_by'});
                self.del.show();
                self.recovery.show();
            }

            $.ajax({
                type        : 'GET',
                cache       : false,
                datatype    : 'json',
                url         : self.getByIdT2URL,
                data        : { table: self.table.sub, id: _id,  columns: self.columns.sub },
                success     : function (data) {
                    $.each(self.mData, function (index, obj) {
                        if (_id == obj.currency_id) {
                            self.formData = self.mData[index];
                        }
                    });

                    // Set sGrid Parameter
                    self.sGrid.jqGrid('setGridParam', {
                        postData : { 
                            columns : function () { return self.columns.sub },
                            id      : function () { return _id },
                            table   : function () { return self.table.sub }
                        }
                    }).trigger("reloadGrid");

                    var newArrYear = [];
                    $.each(data.record, function(index, obj) {
                       newArrYear[index] = obj['exyear'];
                    });

                    if (newArrYear.length > 0) {
                        self.addNewYear  = newArrYear.max() + 1;
                    } else {
                        self.addNewYear  = new Date().getFullYear();
                    }

                    if (mode == 'new') {
                        $('#currcode').val(null);
                        $('#currdesceng').val(null);
                        $('#currabbveng').val(null);
                        $('#deleteflag').val(null);
                        $('#currdescth').val(null);
                        $('#currabbvth').val(null);
                        $('#record_add').show();
                    } else if (mode == 'edit') {
                        $('#currency_id').val(self.formData.currency_id).removeAttr('disabled');
                        $('#currcode').val(self.formData.currcode).removeAttr('disabled');
                        $('#currdesceng').val(self.formData.currdesceng).removeAttr('disabled');
                        $('#currabbveng').val(self.formData.currabbveng).removeAttr('disabled');
                        $('#deleteflag').val(self.formData.deleteflag);
                        $('#currdescth').val(self.formData.currdescth).removeAttr('disabled');
                        $('#currabbvth').val(self.formData.currabbvth).removeAttr('disabled');
                        $('#record_add').show();
                        self.sGrid.jqGrid('setGridParam', {
                            ondblClickRow : function (id) {
                                self.smode = 'update';
                                self.sGrid.setColProp('exyear', { editoptions: {} });
                                self.sGrid.editRow(id);
                                self.arrSaveId.push(parseInt(id));
                            }
                        }).trigger("reloadGrid");

                        $.each(buttons, function (index, value) {
                            $('#' + value).show();
                        });
                    }  else {
                        $('#currency_id').val(self.formData.currency_id).attr('disabled', 'disabled');
                        $('#currcode').val(self.formData.currcode).attr('disabled', 'disabled');
                        $('#currdesceng').val(self.formData.currdesceng).attr('disabled', 'disabled');
                        $('#currabbveng').val(self.formData.currabbveng).attr('disabled', 'disabled');
                        $('#deleteflag').val(self.formData.deleteflag);
                        $('#currdescth').val(self.formData.currdescth).attr('disabled', 'disabled');
                        $('#currabbvth').val(self.formData.currabbvth).attr('disabled', 'disabled');
                        $('#record_add').removeAttr('disabled');
                        $('#record_add').hide();
                        self.sGrid.jqGrid('setGridParam', {
                            ondblClickRow : function (id) {
                            }
                        }).trigger("reloadGrid");

                        $.each(buttons, function (index, value) {
                            $('#' + value).hide();
                        });
                    }

                    // Initialize sub grid.
                    self.sGrid.jqGrid({
                        url         : self.getAllT2URL,
                        datatype    : 'json',
                        postData    : {
                            columns : function () { return self.columns.sub },
                            id      : function () { return _id },
                            table: function () { return self.table.sub }
                        },
                        height      : 250,
                        colNames    : self.colNames.sub,
                        colModel    : self.colModel.sub,
                        gridComplete: function () {
                            $('.row-edit').bind('click', function () {
                                self.smode = 'update';
                            });
                        },
                        ondblClickRow: function (id) {
                            if (mode == 'edit') {
                                self.smode = 'update';
                                self.sGrid.setColProp('exyear', { editoptions: {} });
                                self.sGrid.editRow(id);
                                self.arrSaveId.push(parseInt(id));
                            }
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
            self.addNewYear = 0;
        }
    });

    // Add row sub grid button clicked.
    $('#record_add').bind('click', function () {
        if (!self.recordAdded) {
            self.smode = 'insert';
            self.sGrid.addRowData(0, {});
            self.sGrid.setColProp('exyear', { editoptions: { value: self.addNewYear } });
            self.sGrid.editRow(0);
            self.arrSaveId.push(0);
            self.recordAdded = true;
        } else {
            alert('เพิ่มเรคคอร์ดแล้ว');
        }
    });

    // Stop event Submit.
    self.form.bind('submit', function () {
        return false;
    });

    // Close fancybox when button Cancle clicked.
    self.form.bind('reset', function () {
        $.fancybox.close();
        return false;
    });

    // Save data when button Save clicked.
    $('#save').bind('click', function () {
        $.ajax({
            type        : 'POST',
            cache       : false,
            datatype    : 'json',
            url         : self.saveURL,
            data        : {
                currcode    : $('#currcode').val(),
                currdesceng : $('#currdesceng').val(),
                currabbveng : $('#currabbveng').val(),
                deleteflag  : $('#deleteflag').val(),
                currdescth  : $('#currdescth').val(),
                currabbvth  : $('#currabbvth').val(),
                create_date : $('#date').val(),
                create_by   : $('#by').val(),
                table       : $('#table').val(),
                currency_id : $('#currency_id').val(),
                mode        : $('#mode').val()
            },
            success : function (data) {
                $('#0_currency_id').val(data.lastinsertid);
                if (self.arrSaveId.length > 0) {
                    $.each(self.arrSaveId, function (index, id) {
                        self.sGrid.jqGrid('saveRow', id);
                    });
                }
                self.mGrid.trigger('reloadGrid');
            }
        });

        $.fancybox('บันทีกเรียบร้อยแล้ว');
    });
});

// Find max from array.
Array.prototype.max = function () {
    return Math.max.apply(null, this);
};