//--- VARIABLES----------------------
var instrumindex=1;
var instrumcount=15;
var stepjarum=2;
var batasjarumL=-45;
var batasjarumR=45;
var derajadjarum=batasjarumL; //sudut jarum saat ini
var posjarum="";
var stepSelektor=360/22;//16.36363;
var derajadSelektor=0;
var offsetSelektor=0; //sudut tambahan saat penempatan selector secara click
var axeoffset=$("#axe_jarum").offset();
var putaranObj=0;
var nilput=0;
var mousedown=false;
var keyboardFlag=0;
var instrum=[];
var randomSiswa=[]; //untuk random siswa
var latihan="";   //latihan 


//---- SETTING IMAGE SETIAP INSTRUMEN
//--index-------0--------1---------------------5-----------7----------9-------------11-----------15-------16----------17-----------20---------------24-----26---
instrum[1]="body1.png,axe1.png,50,217,352,adjust1.png,100,378,376,selector1.png,200,118,464,90,22,8,SANWA YX-360TRn,#A0A0A0,40,495,540, 495,632,   ,   ,   ,  "; //1 SANWA YX-360TRn (gray)
instrum[2]="body2.png,axe2.png,50,215,355,adjust9.png,80,0,405,selector2.png,190,140,466,0,22,0,TAEKWANG TM-333TR-A,#DDDBA3,40,390,662, 38,659, 38,587, 390,587";   //2 TAEKWANG TM-333TR-A
instrum[3]="body3.png,axe3.png,40,215,345,adjust3.png,100,372,432,selector3.png,215,128,478,0,24,0,DEREE DE-360-TRF,#383B6B,40,402,687, 28,687,  ,  ,  ,  ";  //3 DEREE DE-360-TRF
instrum[4]="body4.png,axe5.png,50,215,343,adjust4.png,50,67,399,selector4.png,168,152,438,0,24,0,PROSKIT MT-2207,#00CAB5,40,368,542, 368,622,  ,  ,  ,  ";    //4 PROSKIT MT-2207
instrum[5]="body5.png,axe5.png,50,215,330,adjust14.png,65,58,385,selector5.png,158,161,431,0,20,0,KTI KT8260L,#323337,40,370,582, 72,582, 370,502,  , ";   //5 KTI KT8260L
instrum[6]="body6.png,axe6.png,55,213,348,adjust6.png,120,372,372,selector6.png,200,122,468,90,22,8,SANWA YX-360TRn,#57665C,40,543,603, 485,603,  ,  ,  ,  "; //6 SANWA YX-360TRn
instrum[7]="body7.png,axe7.png,50,210,330,adjust7.png,100,355,375,selector7.png,190,122,470,0,22,0,HELES YX-367TR,#F6B71D,40,373,656, 25,656,  ,  , 28,435";  //7 HELES YX-367TR
instrum[8]="body8.png,axe8.png,50,215,330,adjust8.png,100,375,375,selector8.png,194,122,468,-16,20,0,ALCRON AC-360,#E6402C,40,363,653, 35,653, , , 38,454";  //8 ALCRON AC-360
instrum[9]="body9.png,axe9.png,90,188,341,adjust9.png,100,375,375,selector9.png,180,141,489,0,14,0,EXTECH 38070,green,40,58,665, 365,665,  ,  ,  ,  ";  //9 EXTECH 38070
instrum[10]="body10.png,axe7.png,40,218,335,adjust7.png,60,303,412,selector7.png,148,162,459,0,20,0,KAISE 7050,#FEC50E,40,285,635, 215,635, 147,635,  ,  "; //10 7050
instrum[11]="body11.png,axe11.png,50,215,330,adjust11.png,68,309,385,selector11.png,178,144,475,-90,20,0,PHYWE 07021-11,#42587B,40,260,35, 180,35, 341,35, 97,35";  //11 PHYWE 07021-11
instrum[12]="body12.png,axe12.png,50,214,332,adjust12.png,80,364,394,selector12.png,190,140,427,0,24,0,PROSKIT MT-2017,#29B08F,40,390,695, 38,695, 215,695,  ,  ";  //12 PROSKIT MT-2017
instrum[13]="body13.png,axe13.png,38,214,350,adjust9.png,100,375,375,selector13.png,200,133,474,0,13,0,GB-INSTRUMEN GMT-312,#656462,40,380,650, 40,650,  ,  ,  ,  ";  //13 GB-INSTRUMEN GMT-312
instrum[14]="body14.png,axe14.png,25,227,353,adjust14.png,65,52,398,selector14.png,170,155,436,0,20,0,TEKPOWER TP8250,#32353A,40,373,598, 65,598, 373,512,  ,  ";   //14 TEKPOWER TP8250
instrum[15]="body15.png,axe15.png,40,220,330,adjust15.png,40,391,375,selector15.png,169,150,478,0,22,0,NEWRUIKE XCRK500,#B5B39E,40,380,647, 50,647, 51,440,  ,  ";  //15 NEWRUIKE XCRK500
set_instrument();

//---- FUNCTION GROUP --------------------------------
instr=[];
instr[1]={acv:[1.5,4.5],ohm:[6.5,10.5],dca:[11.5,14.5],dcv:[15.5,20.5]};
instr[2]={acv:[1,4],ohm:[6,10],dca:[12,16],dcv:[16,21]};
instr[3]={acv:[1,4],ohm:[5,9],dca:[12,16],dcv:[16,21]};
instr[4]={acv:[22,26],ohm:[17,21],dca:[11,14],dcv:[3,10]};
instr[5]={acv:[1,4],ohm:[6,9],dca:[11,13],dcv:[15,19]};
instr[6]={acv:[1.5,4.5],ohm:[6.5,10.5],dca:[11.5,14.5],dcv:[15.5,20.5]};
instr[7]={acv:[1,4],ohm:[6,10],dca:[12,16],dcv:[16,21]};
instr[8]={acv:[1.1,4.1],ohm:[5.1,9.1],dca:[10.1,13.1],dcv:[13.1,19.1]};
instr[9]={acv:[1,4],ohm:[12,13],dca:[9,11],dcv:[5,8]};
instr[10]={acv:[0,3],ohm:[4,8],dca:[11,15],dcv:[15,19]};
instr[11]={acv:[11,14],ohm:[1,3],dca:[4,10],dcv:[15,19]};
instr[12]={acv:[1,4],ohm:[7,12],dca:[15,18],dcv:[18,23]};
instr[13]={acv:[5,8],ohm:[12,12],dca:[9,11],dcv:[1,4]};
instr[14]={acv:[3,5],ohm:[6,8],dca:[13,15],dcv:[15,20]};
instr[15]={acv:[1,4],ohm:[6,10],dca:[12,16],dcv:[16,21]};

//---- SET INSTRUMEN ---------------------------------    
function set_instrument(){
  $.post("includes/session.php?oper=getindex",function(idx){
    var ob=instrum[idx].split(","); //OB = elemen alat ukur
    $("#body").css("background","url('images/bodies/"+ob[0]+"') no-repeat");
    $("#axe_knob").css("background","url('images/"+ob[1]+"') no-repeat")
      .css({"background-position":"center center","background-size": "contain"})
      .css({"width":ob[2]+"px","height":ob[2]+"px","left":ob[3]+"px","top":ob[4]+"px"});
    $("#adj_knob").css("background","url('images/"+ob[5]+"') no-repeat")
      .css({"background-position":"center center","background-size": "contain"})
      .css({"width":ob[6]+"px","height":ob[6]+"px","left":ob[7]+"px","top":ob[8]+"px"});
    $("#sel_knob").css("background","url('images/"+ob[9]+"') no-repeat")
      .css({"background-position":"center center","background-size": "contain"})
      .css({"width":ob[10]+"px","height":ob[10]+"px","left":ob[11]+"px","top":ob[12]+"px"});
    $("#inputN,#inputP,#inputI,#output").css({"background-color":"","opacity":"1","border-radius":"50%", "width":ob[18]+"px","height":ob[18]+"px"});
    $("#inputP").css({"left":ob[19]+"px","top":ob[20]+"px"});
    $("#inputN").css({"left":ob[21]+"px","top":ob[22]+"px"});
    $("#inputI").css({"left":ob[23]+"px","top":ob[24]+"px"});
    $("#output").css({"left":ob[25]+"px","top":ob[26]+"px"});
    if(posjarum=="")putar("#jarum",derajadjarum);  //mengendalikan posisi jarum
    putar("#sel_knob",ob[13]);            //reset posisi selector
    derajadSelektor=ob[13];               //posisi selektor (setelah reset)
    stepSelektor=eval(360/ob[14]);        //step putaran selektor  
    offsetSelektor=ob[15];
    set_hotarea_selektor(ob[10],ob[11],ob[12]);
    $("#mydivheader").html(ob[16]+"-"+idx).css("background-color",ob[17]);
    instrumindex=idx;
  })
}

//---- mengganti INSTRUMEN ---------------
function ganti_instrumen(e){
  $.post("includes/session.php?oper=getindex",function(idx){
    if(idx>=1 && idx<instrumcount){
      //if(e.shiftKey){idx--;}else{idx++;}
      if(e.keyCode==190)idx++;
      if(e.keyCode==188)idx--;
      if(idx<1)idx=1;
    }else{
      idx=1;
    }
    $.get("includes/session.php?oper=setindex&data="+idx,function(respon){
      set_instrument();
    })
  })
}    

//---- MEMUTAR JARUM UKUR-----------
function geser_jarum(e){
  var obj=$("#jarum");  //objek jarum
  var step=stepjarum;
  if(e.ctrlKey||keyboardFlag>1){step=stepjarum/4;} else {step=stepjarum;}//melambat jika CTRL atau CONTINUOUS
  if(e.which==rotR){derajadjarum+=step;}
  if(e.which==rotL){derajadjarum-=step;}
  if(derajadjarum>batasjarumR)derajadjarum=batasjarumR;
  if(derajadjarum<batasjarumL)derajadjarum=batasjarumL;
  putar(obj,derajadjarum.toFixed(8));
}

//---- MEMUTAR SWITCH SELEKTOR -------------
function geser_selektor(e){
  var obj=$("#sel_knob");  //objek selektor
  var ds=parseFloat(derajadSelektor);
  var ss=parseFloat(stepSelektor);
  if(e.which==rotR){ds+=ss;}else{ds-=ss;}
  putar(obj,ds);
  derajadSelektor=ds;
  //$("#mydivcontent").text("Step"+stepSelektor+"\nsudut:"+derajadSelektor+"\nxxx:"+derajadSelektor/stepSelektor+" idx:"+instrumindex);
}

//---- MEMUTAR KNOB INFINITY -------------
function geser_infinity(e){
   if(derajadjarum>-55 && derajadjarum<-30){
      var geseran=20;
      if(e.keyCode==infL){geseran=geseran*(-1);derajadjarum--;};
      if(e.keyCode==infR){geseran=geseran*(1);derajadjarum++;};
      if(derajadjarum<=-55||derajadjarum>=-30){derajadjarum=batasjarumL;return false;}
      putar_objek("#axe_knob",geseran,e);
      batas_jarum(e,"L");
      putar("#jarum",derajadjarum);
      batasjarumL=derajadjarum;
      $("#axe_knob").css("box-shadow","green 0px 0px 20px");
   }
}

//---- MEMUTAR KNOB ZERO OHM ADJUSTER -------------
function geser_adjust(e){
   if(derajadjarum>=30 && derajadjarum<=55){
      var geseran=20;
      if(e.keyCode==adjR){geseran=geseran*(-1);derajadjarum--;};
      if(e.keyCode==adjL){geseran=geseran*(1);derajadjarum++};
      putar_objek("#adj_knob",geseran,e);
      if(derajadjarum>55||derajadjarum<=30){derajadjarum=batasjarumR;return false;}
      batas_jarum(e,"R");
      putar("#jarum",derajadjarum);
      batasjarumR=derajadjarum;
      $("#adj_knob").css("box-shadow","green 0px 0px 20px");
   } 
}

//---- UNTUK LATIHAN PEMBACAAN --------------------------------------------
//---- randomize PENUNJUKAN JARUM
function random_jarum(){
   var rnd=Math.random()*(-90)+45;
   putar("#jarum",rnd);   
} 

function random_selector(min,max){
   var rndSementara="";
   var rnd=randomizebetween(min,max);
   //var rnd=1 + Math.floor(Math.random());
   if(rndSementara==rnd||rnd==0)rnd=randomizebetween(min,max);
   rndSementara=rnd;
   var obj=$("#sel_knob");  //objek selektor
   var ds=parseFloat(derajadSelektor);
   var ss=parseFloat(stepSelektor);
   ds=ss*rnd;
   putar(obj,ds);
   derajadSelektor=ds; 
   //$("#mydivcontent").text(rnd); 
}

function randomizebetween(min,max){
   var rnd=Math.floor(Math.random() * (max - min + 1)) + min;
   if(rnd<min)rnd=min;
   if(rnd>max)rnd=max;
   return rnd;
}
//---- KELENGKAPAN PROGRAM ------------------------------------------------
//---- HOT AREA 
function set_hotarea_selektor(size,left,top){
  var ofset=50;
  $("#selektor")
  .css({"width" : parseFloat(eval(size)+(2*ofset))+"px", "height" : parseFloat(eval(size)+(2*ofset))+"px" })
  .css({"left" : parseFloat(eval(left)-ofset)+"px", "top" : parseFloat(eval(top)-ofset)+"px" });
}

//---- MEMUTAR objek (apa saja) 
function putar_objek(obj,step,e){
  var objId=$(obj).attr("id");
  var putCSS=$(obj).css("-moz-transform") || $(obj).css("-webkit-transform") || $(obj).css("transform");
  if(putCSS=="none"){
    putaran=step; 
  }else{
    nilput=putCSS.replace("rotate(","").replace("deg)","");
  }
  if(e.shiftKey){putaran=parseFloat(nilput)-step;}
  else{putaran=parseFloat(nilput)+step;}
  putar(obj,putaran);
}

//---- CSS MEMUTAR objek (apa saja)        
function putar(objek,derajad){
   putaran="rotate("+derajad+"deg)";
   $(objek).css({"-moz-transform" : putaran, "-webkit-transform" : putaran,"transform":putaran,transition: '.5s all'});
   //  $("#koordinat").text("L"+batasjarumL+" R"+batasjarumR+" jarum"+derajadjarum);
}

//mengubah batas KIRI atau KANAN jarum
function batas_jarum(e,LR){
  var step=stepjarum/4;
  var batas="";
  if(LR=="L"){
    if(e.shiftKey){batasjarumL-=step;} else {batasjarumL+=step;}
    batas=batasjarumL;
  }else{
    if(e.shiftKey){batasjarumR-=step;} else {batasjarumR+=step;}
    batas=batasjarumR;
  }
  $.get("includes/session_adj.php?oper=set&adj="+LR+"&data="+batas,function(respon){
    //alert("set"+respon);
  });
}

//---- CROSS HAIR (membantu menentukan koordinat image setiap instrumen)-------------------
function crosshair(e,container,visib){
  if(visib){
    var offs=$(container).offset();
    $(container).css("cursor","none");
    $("#koordinat,.horizontal,.vertical").css("visibility","visible");
    $(".horizontal").css({"top":e.pageY});
    $(".vertical").css({"left":(e.pageX-offs.left)});
  }else{
    $(".horizontal,.vertical").css("visibility","hidden");
    $(container).css("cursor","context-menu");
  }
} 
function cek(txt){
  $("#koordinat").text(txt);
} 
     