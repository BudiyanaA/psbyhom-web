!function(t,e){"use strict";var i=864e5,s=t.Zepto||t.jQuery;function n(t,e){var i=e||{};for(var s in t)s in i||(i[s]=t[s]);return i}function a(t,i){if(s)s(t).trigger(i);else{var n=e.createEvent("CustomEvent");n.initCustomEvent(i,!0,!0,{}),t.dispatchEvent(n)}}function h(t,e){return s?s(t).hasClass(e):t.classList.contains(e)}function r(t,e){this.dateDelta=null,this.timeDelta=null,this._defaults={startClass:"start",endClass:"end",timeClass:"time",dateClass:"date",defaultDateDelta:0,defaultTimeDelta:36e5,anchor:"start",parseTime:function(t){return s(t).timepicker("getTime")},updateTime:function(t,e){s(t).timepicker("setTime",e)},setMinTime:function(t,e){s(t).timepicker("option","minTime",e)},parseDate:function(t){return t.value&&s(t).datepicker("getDate")},updateDate:function(t,e){s(t).datepicker("update",e)}},this.container=t,this.settings=n(this._defaults,e),this.startDateInput=this.container.querySelector("."+this.settings.startClass+"."+this.settings.dateClass),this.endDateInput=this.container.querySelector("."+this.settings.endClass+"."+this.settings.dateClass),this.startTimeInput=this.container.querySelector("."+this.settings.startClass+"."+this.settings.timeClass),this.endTimeInput=this.container.querySelector("."+this.settings.endClass+"."+this.settings.timeClass),this.refresh(),this._bindChangeHandler()}r.prototype={constructor:r,option:function(t,e){if("object"==typeof t)this.settings=n(this.settings,t);else if("string"==typeof t&&void 0!==e)this.settings[t]=e;else if("string"==typeof t)return this.settings[t];this._updateEndMintime()},getTimeDiff:function(){var t=this.dateDelta+this.timeDelta;return!(t<0)||this.startDateInput&&this.endDateInput||(t+=i),t},refresh:function(){if(this.startDateInput&&this.startDateInput.value&&this.endDateInput&&this.endDateInput.value){var t=this.settings.parseDate(this.startDateInput),e=this.settings.parseDate(this.endDateInput);t&&e&&(this.dateDelta=e.getTime()-t.getTime())}if(this.startTimeInput&&this.startTimeInput.value&&this.endTimeInput&&this.endTimeInput.value){var i=this.settings.parseTime(this.startTimeInput),s=this.settings.parseTime(this.endTimeInput);i&&s&&(this.timeDelta=s.getTime()-i.getTime(),this._updateEndMintime())}},remove:function(){this._unbindChangeHandler()},_bindChangeHandler:function(){s?s(this.container).on("change.datepair",s.proxy(this.handleEvent,this)):this.container.addEventListener("change",this,!1)},_unbindChangeHandler:function(){s?s(this.container).off("change.datepair"):this.container.removeEventListener("change",this,!1)},handleEvent:function(t){this._unbindChangeHandler(),h(t.target,this.settings.dateClass)?""!=t.target.value?(this._dateChanged(t.target),this._timeChanged(t.target)):this.dateDelta=null:h(t.target,this.settings.timeClass)&&(""!=t.target.value?this._timeChanged(t.target):this.timeDelta=null),this._validateRanges(),this._updateEndMintime(),this._bindChangeHandler()},_dateChanged:function(t){if(this.startDateInput&&this.endDateInput){var e=this.settings.parseDate(this.startDateInput),s=this.settings.parseDate(this.endDateInput);if(e&&s)if("start"==this.settings.anchor&&h(t,this.settings.startClass)){var n=new Date(e.getTime()+this.dateDelta);this.settings.updateDate(this.endDateInput,n)}else if("end"==this.settings.anchor&&h(t,this.settings.endClass)){n=new Date(s.getTime()-this.dateDelta);this.settings.updateDate(this.startDateInput,n)}else if(s<e){var a=h(t,this.settings.startClass)?this.endDateInput:this.startDateInput,r=this.settings.parseDate(t);this.dateDelta=0,this.settings.updateDate(a,r)}else this.dateDelta=s.getTime()-e.getTime();else if(null!==this.settings.defaultDateDelta){if(e){var u=new Date(e.getTime()+this.settings.defaultDateDelta*i);this.settings.updateDate(this.endDateInput,u)}else if(s){var l=new Date(s.getTime()-this.settings.defaultDateDelta*i);this.settings.updateDate(this.startDateInput,l)}this.dateDelta=this.settings.defaultDateDelta*i}else this.dateDelta=null}},_timeChanged:function(t){if(this.startTimeInput&&this.endTimeInput){var e=this.settings.parseTime(this.startTimeInput),i=this.settings.parseTime(this.endTimeInput);if(e&&i)if("start"==this.settings.anchor&&h(t,this.settings.startClass))i=this._setTimeAndReturn(this.endTimeInput,new Date(e.getTime()+this.timeDelta)),this._doMidnightRollover(e,i);else if("end"==this.settings.anchor&&h(t,this.settings.endClass))e=this._setTimeAndReturn(this.startTimeInput,new Date(i.getTime()-this.timeDelta)),this._doMidnightRollover(e,i);else{var s,n;if(this._doMidnightRollover(e,i),this.startDateInput&&this.endDateInput&&(s=this.settings.parseDate(this.startDateInput),n=this.settings.parseDate(this.endDateInput)),+s==+n&&i<e){var a=h(t,this.settings.endClass)?this.endTimeInput:this.startTimeInput,r=h(t,this.settings.startClass)?this.endTimeInput:this.startTimeInput,u=this.settings.parseTime(a);this.timeDelta=0,this.settings.updateTime(r,u)}else this.timeDelta=i.getTime()-e.getTime()}else null!==this.settings.defaultTimeDelta?(this.timeDelta=this.settings.defaultTimeDelta,e?(i=this._setTimeAndReturn(this.endTimeInput,new Date(e.getTime()+this.settings.defaultTimeDelta)),this._doMidnightRollover(e,i)):i&&(e=this._setTimeAndReturn(this.startTimeInput,new Date(i.getTime()-this.settings.defaultTimeDelta)),this._doMidnightRollover(e,i))):this.timeDelta=null}},_setTimeAndReturn:function(t,e){return this.settings.updateTime(t,e),this.settings.parseTime(t)},_doMidnightRollover:function(t,e){if(this.startDateInput&&this.endDateInput){var s=this.settings.parseDate(this.endDateInput),n=this.settings.parseDate(this.startDateInput),a=e.getTime()-t.getTime(),h=e<t?i:-1*i;null!==this.dateDelta&&this.dateDelta+this.timeDelta<=i&&this.dateDelta+a!=0&&(h>0||0!=this.dateDelta)&&(a>=0&&this.timeDelta<0||a<0&&this.timeDelta>=0)&&("start"==this.settings.anchor?(this.settings.updateDate(this.endDateInput,new Date(s.getTime()+h)),this._dateChanged(this.endDateInput)):"end"==this.settings.anchor&&(this.settings.updateDate(this.startDateInput,new Date(n.getTime()-h)),this._dateChanged(this.startDateInput))),this.timeDelta=a}},_updateEndMintime:function(){if("function"==typeof this.settings.setMinTime){var t=null;"start"==this.settings.anchor&&(!this.dateDelta||this.dateDelta<i||this.timeDelta&&this.dateDelta+this.timeDelta<i)&&(t=this.settings.parseTime(this.startTimeInput)),this.settings.setMinTime(this.endTimeInput,t)}},_validateRanges:function(){this.startTimeInput&&this.endTimeInput&&null===this.timeDelta?a(this.container,"rangeIncomplete"):this.startDateInput&&this.endDateInput&&null===this.dateDelta?a(this.container,"rangeIncomplete"):!this.startDateInput||!this.endDateInput||this.dateDelta+this.timeDelta>=0?a(this.container,"rangeSelected"):a(this.container,"rangeError")}},t.Datepair=r}(window,document);