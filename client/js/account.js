/**
 * Initializes date form element combination
 * and stores data into the hidden input element
 * @param string dayid	The id of the DOM SELECT tag 
 * @param string monthid	The id of the DOM SELECT tag 
 * @param string yearid	The id of the DOM SELECT tag 
 * @param string hiddenid	The id of the DOM hidden tag
 * @param int format	The format of the date possible values are:
 * 0 - yyyy mm dd
 * 1 - dd mm yyyy
 * 2 - mm dd yyyy
 * @return
 */
function FormDate(dayid, monthid, yearid, hiddenid) {
	this.dayid = dayid;
	this.monthid = monthid;
	this.yearid = yearid;
	this.hiddenid = hiddenid;
	this.date = null;
	this.delimiter = '-';
	this.format = 1;
	this.hiddenValue = function() {
		switch (this.format) {
			case (0) : {
				this.date = this.year + this.delimiter + this.month + this.delimiter + this.day;
				break;
			}
			case (1) : {
				this.date = this.day + this.delimiter + this.month + this.delimiter + this.year;
				break;
			}
			case (2) :
			default : {
				this.date = this.month + this.delimiter + this.day + this.delimiter + this.year;
			}
		}
		$('#' + this.hiddenid).val(this.date);
	};
	this.setFormat = function(format) {
		if ('012'.search(parseInt(format))) {
			this.format = format;
		}
		return this;
	};
	this.setDelimiter = function(delimiter) {
		this.delimiter = delimiter;
		return this;
	};
	this.createDate = function() {
		this.day = $('#' + this.dayid).val();
		this.month = $('#' + this.monthid).val();
		this.year = $('#' + this.yearid).val();
		this.hiddenValue(); 
	};
}