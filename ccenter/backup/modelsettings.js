divstring = '<div></div>';
var progressBar = new PygerJS.UIWizardProgressBar($('#wrapperr'), 4);
var vform = document.getElementById('modelsettings');
var dbIndex = null;
var tableIndex = null;
var fieldIndex = null;
var Validations = function() {
	var _array_ = {};
	this.get_field_by = function(index1, index2, index3) {
		let props = Object.getOwnPropertyNames(_array_);
		if (_array_.hasOwnProperty(index1)) {
			if (_array_[index1].hasOwnProperty(index2)) {
				if (_array_[index1][index2].hasOwnProperty(index3)) {
					return _array_[index1][index2][index2];
				}
			}
		}
		return false;
	};
	this.get_array_ = function() {
		return _array_;
	};
	this.get_json_ = function() {
		return _json_;
	};
	/**
		* @param array index Where fields
		* ex. {db: 'some db name', td: 'some tb name', fd: 'some field name'}
		*/
	this.newRecord = function(index, data) {
		if (typeof(index) != 'array') return false;
		let index1 = Array.shift(index);
		let index2 = Array.shift(index);
		let index3 = Array.shift(index);
		_array_[index1] = {
			index2: {
				index3: {
					'array': Object.values(data),
					'json': JSON.stringify(data)
				}
			}
		};
	};
	/**
		* @param array index Three elements in the array
		* @param string wrapperSelector The string selector for
		* jQuery search
		*/
	this.renderBy = function(index, wrapperSelector) {
		let vArray = this.get_field_data(index)['array'];
		$(wrapperSelector).html('');
		while (i = Array.shift(vArray)) {
			if (!i) break;
			let _ = $('<pre></pre>');
			let __ = $('<strong></strong>').text($('form [name='+i.name+']').attr('alt')+": ");
			_.append(__).append("<span>"+i.value+"</span>");
			$(wrapperSelector).append(_);
		}
		delete vArray;
	};
};
var vLidations = new Validations();
/**
	* Resets ddowns for databases, tables, table fields
	* @param {boolean} db Reset the ddown of the database (by default - false)
	* @param {boolean} table Reset the ddown of the table (by default - false)
	* @param {boolean} field Reset the ddown of the fields (by default - false)
	* @return {void}
	*/
var resetOnChange = function(db = false, table = false, field = false) {
	if (db) table = true;
	if (table) {
		field = true;
		$('#table').html('');
	}
	if (field) $('#tablefields').html('');
	$('#tablename').text('');
	$('#tablefield').text('');
	$('#fieldetails').html('');
	vform.reset();
};
// posting the index of the database
$('#dbselect').change(function() {
	resetOnChange(true);
	dbIndex = $(this).val();
	if (!dbIndex) {
		progressBar.trigger(0);
		return false;
	}
	// AJAX
	$.post("<?= CurrentURL.ListOfTables?>", {
		'<?= Async?>': true,
		'database': dbIndex
	}, function(data, textStatus, jqXHR) {
		$('#tableselect').html(data);
		progressBar.trigger(1);
	});
});
// posting the index of the table
$('#tableselect').change(function() {
	// the index of the table
	tableIndex = $(this).val();
	if (!tableIndex) {
		resetOnChange(false, false, true);
		progressBar.trigger(1);
		return false;
	}
	// AJAX
	$.post("<?= CurrentURL.TableFields?>", {
		'<?= Async?>': true,
		'table': tableIndex
	}, function(data, textStatus, jqXHR) {
		$('#tablefields').html(data);
		progressBar.trigger(2);
	});
});
// posting the index of the field
$('#tablefields').change(function() {
	fieldIndex = $(this).val();
	vform.reset();
	if (!fieldIndex) {
		progressBar.trigger(2);
		resetOnChange();
		return false;
	}
	else if (!vLidations.get_field_by(dbIndex, tableIndex, fieldIndex)) {
		vLidations.newRecord([dbIndex, tableIndex, fieldIndex], Object.values(vData));
	}
	$('#tablefield').text($(this).text());
	// AJAX
	$.post("<?= CurrentURL.FieldDetails ?>", {
		'<?= Async?>': true,
		'field': fieldIndex
	}, function(data, textStatus, jqXHR) {
		if (typeof(data) == 'string') {
			$('#fieldetails').html('');
			let fd_json = JSON.parse(data);
			let keys = Object.getOwnPropertyNames(fd_json);
			while (item = Array.shift(keys)) {
				let details = $(divstring).attr('class', 'h5').text(item+": ").appendTo('#fieldetails');
				let detail = $(divstring).attr('class', 'badge badge-info').text(fd_json[item]).appendTo(details);
			}
			progressBar.trigger(3);
		}
	});
});
$('#save_btn').click(function() {
	let vData = $('form#modelsettings').serializeArray();
	vLidations.newRecord([dbIndex, tableIndex, fieldIndex], Object.values(vData));
	vLidations.renderBy([dbIndex, tableIndex, fieldIndex], '#fieldvalidos');
});
// submitting model validation settings
$('#generate_btn').click(function() {
	return false;
	var vjson = '';
	$.post("<?= CurrentURL.GenerateModels ?>", {
		'<?= Async ?>': true
	}, function (data, textStatus, jqXHR) {
		$('#generatedtext').html(data);
	});
});