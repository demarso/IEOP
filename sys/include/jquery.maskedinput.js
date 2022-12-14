// JavaScript Document
/*
Masked Input plugin for jQuery
Copyright (c) 2007-2009 Josh Bush (digitalbush.com)
Licensed under the MIT license (http://digitalbush.com/projects/masked-input-plugin/#license)
Version: 1.2.2 (03/09/2009 22:39:06)
*/

(function($) {
var pasteEventName = ($.browser.msie ? 'paste' : 'input') + ".mask";
var iPhone = (window.orientation != undefined);

$.mask = {
//Predefined character definitions
definitions: {
'9': "[0-9]",
'a': "[A-Za-z]",
'*': "[A-Za-z0-9]"
}
};

$.fn.extend({
//Helper Function for Caret positioning
caret: function(begin, end) {
if (this.length == 0) return;
if (typeof begin == 'number') {
end = (typeof end == 'number') ? end : begin;
return this.each(function() {
if (this.setSelectionRange) {
this.focus();
this.setSelectionRange(begin, end);
} else if (this.createTextRange) {
var range = this.createTextRange();
range.collapse(true);
range.moveEnd('character', end);
range.moveStart('character', begin);
range.select();
}
});
} else {
if (this[0].setSelectionRange) {
begin = this[0].selectionStart;
end = this[0].selectionEnd;
} else if (document.selection && document.selection.createRange) {
var range = document.selection.createRange();
begin = 0 – range.duplicate().moveStart('character', -100000);
end = begin + range.text.length;
}
return { begin: begin, end: end };
}
},
unmask: function() { return this.trigger("unmask"); },
mask: function(mask, settings) {
if (!mask && this.length > 0) {
var input = $(this[0]);
var tests = input.data("tests");
return $.map(input.data("buffer"), function(c, i) {
return tests[i] ? c : null;
}).join(");
}
settings = $.extend({
watermark:"",
watermarkClass:'ghost',
placeholder: "_",
completed: null
}, settings);
if(settings.watermark==="") settings.watermark=mask;

var defs = $.mask.definitions;
var tests = [];
var partialPosition = mask.length;
var firstNonMaskPos = null;
var len = mask.length;

$.each(mask.split(""), function(i, c) {
if (c == '?') {
len–;
partialPosition = i;
} else if (defs[c]) {
tests.push(new RegExp(defs[c]));
if(firstNonMaskPos==null)
firstNonMaskPos = tests.length – 1;
} else {
tests.push(null);
}
});

return this.each(function() {
var input = $(this);
var buffer = $.map(mask.split(""), function(c, i) { if (c != '?') return defs[c] ? settings.placeholder : c });
var ignore = false; //Variable for ignoring control keys
if(input.val()===settings.watermark) input.val("");
var focusText = input.val();

input.data("buffer", buffer).data("tests", tests);

function seekNext(pos) {
while (++pos = 0);
for (var i = pos; i < len; i++) {
if (tests[i]) {
buffer[i] = settings.placeholder;
var j = seekNext(i);
if (j < len && tests[i].test(buffer[j])) {
buffer[i] = buffer[j];
} else
break;
}
}
writeBuffer();
input.caret(Math.max(firstNonMaskPos, pos));
};

function shiftR(pos) {
for (var i = pos, c = settings.placeholder; i < len; i++) {
if (tests[i]) {
var j = seekNext(i);
var t = buffer[i];
buffer[i] = c;
if (j < len && tests[j].test(t))
c = t;
else
break;
}
}
};

function keydownEvent(e) {
var pos = $(this).caret();
var k = e.keyCode;
ignore = (k 16 && k 32 && k = 32 && k 186) {//typeable characters
var p = seekNext(pos.begin – 1);
if (p < len) {
var c = String.fromCharCode(k);
if (tests[p].test(c)) {
shiftR(p);
buffer[p] = c;
writeBuffer();
var next = seekNext(p);
$(this).caret(next);
if (settings.completed && next == len)
settings.completed.call(input);
}
}
}
return false;
};

function clearBuffer(start, end) {
for (var i = start; i < end && i < len; i++) {
if (tests[i])
buffer[i] = settings.placeholder;
}
};

function writeBuffer() { return input.val(buffer.join('')).val(); };

function checkVal(allow) {
//try to place characters where they belong
if(input.val()===settings.watermark) input.val("");
var test = input.val();
var lastMatch = -1;
for (var i = 0, pos = 0; i < len; i++) {
if (tests[i]) {
buffer[i] = settings.placeholder;
while (pos++ test.length)
break;
} else if (buffer[i] == test[pos] && i!=partialPosition) {
pos++;
lastMatch = i;
}
}
if (!allow && lastMatch + 1 = partialPosition) {
writeBuffer();
if (!allow) input.val(input.val().substring(0, lastMatch + 1));
}
return (partialPosition ? i : firstNonMaskPos);
};

if (!input.attr("readonly"))
input
.one("unmask", function() {
input
.unbind(".mask")
.removeData("buffer")
.removeData("tests");
})
.bind("focus.mask", function() {
input.removeClass(settings.watermarkClass);
if(input.val()==settings.watermark)
input.val("");
focusText = input.val();
var pos = checkVal();
writeBuffer();
setTimeout(function() {
if (pos == mask.length)
input.caret(0, pos);
else
input.caret(pos);
}, 0);
})
.bind("blur.mask", function() {
checkVal();
if (input.val() != focusText){
input.change();
}
if (input.val()===settings.watermark || input.val()==="")
input.addClass(settings.watermarkClass);
})
.bind("keydown.mask", keydownEvent)
.bind("keypress.mask", keypressEvent)
.bind(pasteEventName, function() {
setTimeout(function() { input.caret(checkVal(true)); }, 0);
});

checkVal(); //Perform initial check for existing values
});
}
});
})(jQuery);