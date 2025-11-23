'use strict'

function moMove(e,t) {
  var offs=t.offset();
  var y=e.pageY;
  var x=e.pageX-offs.left;
  t.find(".horizontal").css("top":y);
  t.find(".vertical").css("top":x);
  //t.querySelector('.horizontal').style.top =y+"px";
  //t.querySelector('.vertical').style.left =x+"px";
  };

function crVisib(t,w) {
  t.querySelector('.horizontal').style.visibility = w;
  t.querySelector('.vertical').style.visibility = w;
  };