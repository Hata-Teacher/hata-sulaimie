<style>
   #mydiv {
     position: absolute;
     z-index: 99999;
     /*background-color: #f1f1f1;*/
     border: 1px solid #d3d3d3;
     border-radius: 5px;
     /*text-align: center;*/
     top:5%;
     left:70%;
     width: 300px;
     /*font-size: 1.2em;*/
     padding: 2px 2px 10px 2px;
   }
   #mydivheader {
     padding: 2px;
     cursor: move;
     z-index: 99999;
     color: #fff;
     border-radius: 5px 5px 0px 0px;
     border: 1px solid #d3d3d3;
   }
   .icon{
      border-radius: 5px;
      height: 50px;
      width: 50px;
      margin-top: 5px;
      padding:5px;
      transition: background-color .5s linear;
   }
   .icon:hover{
      background-color: #D9ECFF; 
      transition: background-color .2s linear;
   }
   .icon.active{
      background-color: #00F0F0; 
      transition: background-color .2s linear;
   }
   .icon img{
      width:100%;
   }
   #rnd1,#rnd2{
      border: none;
      font-size: .7em;
      color: teal;
      text-align: center;
      border-radius: 1px;
      background-color: #EFEFEF;
      width:2em;
   }
   #rndj{
      border: none;
      font-size: .7em;
      color: teal;
      text-align: center;
      border-radius: 1px;
      color:white;
      background-color: #B4B4B4;
      width:2em;
   }   
   #mode{
      border: none;
      font-size: .7em;
      color: teal;
      text-align: center;
      border-radius: 3px;
      -moz-appearance: none;
      -webkit-appearance: none;
   }
   #mode::-ms-expand {
     display: none;
   }
   .randomsiswa{
      font-size: 5em;
      font-family: tahoma;
      color: #00B3B3;
      text-shadow: 2px 2px 2px gray, -1px -1px 2px white;
   } 
   .btnnilai{
      font-family: arial;
      font-size: 1.2em;
      color:teal;
      border: 1px solid #E6E6E6;
      border-radius:5px;
      padding:0px 10px;
      text-decoration: none;
      margin-right: 5px;
      background-color: whitesmoke;
   } 
   .btnnilai:hover{
      border: 1px solid whitesmoke;
      box-shadow: 2px 2px 2px gray;
      background-color: white;
   } 
   .bordered{
      box-shadow: none;
      animation:box-shadow 1s linear;
   }
   .bordered:hover{
      box-shadow: 0px 0px 15px blue;
      animation:box-shadow 1s linear;
   }
</style>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Multimeter</title>
  <link rel="shortcut icon" href="#" />
  <link rel="icon" type="image/png" href="images/icon.png"/>
  <link rel="stylesheet" type="text/css" href="style/style.css"/>
  <link href="style/bootstrap.min.css" type="text/css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />-->

</head>

<body>
<div class="container-fluid pt-1 px-1">
  <div class="row g-4">
      <div class="col-sm-12 col-xl-11">
          <div class="rounded h-100 p-0">
            <ul id="body" style="list-style: none;">
              <li id="jarum"></li>
              <li id="jar_cover"></li>
              <li id="axe_knob" class="anatomi"></li>
              <li id="adj_knob" class="anatomi"></li>
              <li id="sel_knob" class="anatomi"></li>
              <li id="axe_jarum"></li>
              <li id="koordinat"></li>
              <li id="skala" class="anatomi"></li>
              <li id="selektor"></li>
              <li id="inputN" class="anatomi"></li>
              <li id="inputP" class="anatomi"></li>
              <li id="inputI" class="anatomi"></li>
              <li id="output" class="anatomi"></li>
              <li class="horizontal"></li><!--garis H cross  wire-->
              <li class="vertical"></li><!--garis V cross  wire-->
              <!--<li id="hlp_button" title="
                  >> JARUM UKUR <<
                  Menggerakkan Jarum Ukur:
                    Right = Bergerak ke kanan
                    Left = Bergerak ke kiri
                    Ctrl+Panah = Bergerak halus (smooth)	
                    Click pada Plat Ukur (jarum menuju langsung) 
                    
                  >> SAKLAR PILIH (SELECTOR) <<
                  Menggerakkan Selektor:
                    Down Arrow = Bergerak ke kanan
                    Up Arrow = Bergerak ke kiri
                    Click Angka Range = Selektor langsung menunjuk lokasi pointer
                    Click Selektor = Selektor berputar ke kanan;
                    Shift+Click selektor = Selektor berputar ke kiri; 
                  
                  >> ALAT UKUR / INSTRUMEN <<
                  Berganti alat ukur (Instrumen):
                    Huruf A atau Spacebar = Instrumen berikutnya 
                    Ctrl+Spacebar = Instrumen sebelumnya
                    "></li>-->
            </ul>              
          </div>
      </div>
      <div id="operational" class="text-center col-sm-12 col-xl-1">
         <img class="icon rnd_m" idx="1" title="Random Meter" src="images/icons/meter.png" />
         <img class="icon rnd_s" idx="2" title="Random Selektor" src="images/icons/selektor.png" />
         <img class="icon rnd_ms" idx="3" title="Random Meter+Selektor" src="images/icons/meter-selector2.png" />
         <img class="icon rnd_mode" idx="4" title="Random Selektor per-Mode&#010;Ctrl+Click=mengubah mode." src="images/icons/selektor-mode.png" />
            <select id="mode">
               <option value="acv">Random ACV</option>
               <option value="dcv">Random DCV</option>
               <option value="dca">Random DCA</option>
               <option value="ohm">Random OHM</option>
            </select>
         <img class="icon " idx="5" id="anatomi" title="Anatomi Instrumen" src="images/icons/combine.png" />
         <img class="icon rnd_std" idx="6" title="Random Siswa" src="images/icons/student-point.png" />
         <div>
            <input type="text" id="rnd1" title="nilai awal" value="1" />
            <input type="text" id="rnd2" title="nilai akhir" value="36" />
            <input type="text" id="rndj" title="jumlah random" value="36" />
         </div>
         <img class="icon" idx="7" id="help" title="Cara Pengoperasian" src="images/icons/arrow.png" />
      </div>
      </div>
  </div>
</div>
<div id="mydiv">
   <div id="mydivheader">Multimeter</div>
   <div id="mydivcontent"></div>
</div>
<div id="cobacoba">sss</div>
</body>
</html>

<script type="text/javascript" src="js/jquery-3.7.1.js"></script>
<script type="text/javascript" src="js/functions.js"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>-->
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
//---- KONSTANTA keyCODES---------
var mouseOper="click";
var infR=61;//Infinity Right        +
var infL=173;//Infinity Left        -
var adjR=219;//Adjust Right         [
var adjL=221;//Adjust Left          ]

var rotR=39;//Rotate Right          -->
var rotL=37;//Rotate Left           <--
var cIN=190;//change Instrumen Next       >
var cIP=188;//change Instrumen Previous   <

//---- KEYBOARD EVENTS -------------------------
$(document)
   .keyup(function(e){//reset keyborad flag
      keyboardFlag=0;
      })
   .keydown(function(e){
      keyPressing(e);
      })

   .on("click",".btnnilai",function(){
      var jawab=$(this).attr("scor");
      if(latihan==""){alert("Jenis latihan belum dipilih.");return false;}
      $.post("includes/write2file.php","noabs="+rndsiswa+"&latihan="+latihan+"&jawaban="+jawab,function(hasil){
         $(".buttons").html(hasil);
         randomSiswa.push(rndsiswa);
         })
      })

//---- MOUSE EVENTS -------------------------     
$("#body")
   .click(function(e){
      //---- CROSS HAIR KOORDINAT
      if(e.ctrlKey && e.shiftKey){
         var offs=$(this).offset();
         $("#koordinat").css("visibilty","visible").html("L:"+(e.pageX-offs.left)+", T:"+e.pageY);
         }
      })
   .mousemove(function(e){
      //---- CROSS HAIR 
      if(e.ctrlKey && e.shiftKey){
         crosshair(e,$("#body"),true);
         var offs=$(this).offset();
         $("#koordinat").css("visibilty","visible").html("L:"+(e.pageX-offs.left)+", T:"+e.pageY);
         }else{
         //crosshair(e,$("#body"),false);
         }
      })
   .mouseover(function(){
      $("window").css("overflow","hidden");
      })
   .mouseout(function(){
      $("window").css("overflow","auto");
      });

//---- CLICK SKALA UKUR --------------
$("#skala").mousedown(function(ev){
   var pi=Math.PI;
   var sudutklik=(Math.atan2(eval(ev.clientY - axeoffset.top),eval(ev.clientX - axeoffset.left)))*(eval(180/pi))+90;
   if(sudutklik<=batasjarumL)sudutklik=batasjarumL;
   if(sudutklik>=batasjarumR)sudutklik=batasjarumR;
   putar("#jarum",sudutklik);
   derajadjarum=sudutklik;
   })

//---- CLICK SELECTOR (MEMUTAR SELEKTOR menggunakan MOUSE)----------------------
$("#selektor").mousedown(function(e){
   var o=$(this);//objek selektor
   var cY=eval(o.offset().top+o.width()/2);  //center Y
   var cL=eval(o.offset().left+o.width()/2); //center X
   var pi=Math.PI;
   var sudutklik=(Math.atan2(eval(e.pageY - cY),eval(e.pageX - cL)))*(eval(180/pi))+90;
   var steps=Math.round(sudutklik / stepSelektor); //jumlah step perpindahan
   var sudut=parseFloat(stepSelektor * steps)+eval(offsetSelektor);
   putar("#sel_knob",sudut);
   derajadSelektor=sudut;
   })

//---- CLICK INFINITY KNOB (MENGATUR BATAS KIRI JARUM menggunakan MOUSE)----------------------   
$("#axe_knob").mouseup(function(e){ 
   mouseOper=(e.shiftKey)?"shiftClick":"click";
   if(derajadjarum>-55 && derajadjarum<-30){
      var geseran=20;
      if(mouseOper=="shiftClick"){geseran=geseran*(1);derajadjarum--;}  //tidak minus karena SHIFT sudah ditekan
      if(mouseOper=="click"){geseran=geseran*(1);derajadjarum++;};
      if(derajadjarum<=-55||derajadjarum>=-30){derajadjarum=batasjarumL;return false;}
      putar_objek("#axe_knob",geseran,e);
      batas_jarum(e,"L");
      putar("#jarum",derajadjarum);
      batasjarumL=derajadjarum;
   }
})

//---- CLICK ADJ KNOB (MENGATUR BATAS KANAN JARUM/KALIBRASI OHM menggunakan MOUSE)----------------------
$("#adj_knob").click(function(e){
   mouseOper=(e.shiftKey)?"shiftClick":"click";
   if(derajadjarum>30 && derajadjarum<55){
      var geseran=20;
      if(mouseOper=="shiftClick"){geseran=geseran*(1);derajadjarum--;}  //tidak minus karena SHIFT sudah ditekan
      if(mouseOper=="click"){geseran=geseran*(1);derajadjarum++;};
      if(derajadjarum>=55||derajadjarum<=30){derajadjarum=batasjarumR;return false;}
      putar_objek("#adj_knob",geseran,e);
      batas_jarum(e,"R");
      putar("#jarum",derajadjarum);
      batasjarumL=derajadjarum;
      }
   })  

var myInterval="";
$(".icon").click(function(e){
   $(".icon").removeClass("active");
   $(".iconcaption").addClass("hidden");
   $(".anatomi").removeClass("bordered");
   switch ($(this).attr("idx")){
      case "1":
         latihan="met";
         random_jarum();
         break;
      case "2":
         latihan="sel";
         random_selector(1,40);
         break;
      case "3":
         latihan="metsel";
         random_jarum();
         random_selector(1,40);
         break;
      case "4":
         if(e.ctrlKey)$(this).toggleClass("meter");
         if($(this).hasClass("meter")){
            $(this)
            .attr("src","images/icons/selektor-mode-meter.png")
            .attr("title","Random Selektor per-Mode dengan Random Meter\n(Ctrl+Click=mengubah mode)");
            random_jarum();
         }else{
            $(this).attr("src","images/icons/selektor-mode.png")
            .attr("title","Random Selektor per-Mode dengan meter konstan\n(Ctrl+Click=mengubah mode)");
         }
         switch($("#mode").val()){
            case "acv":
               latihan="acv";
               var a=instr[instrumindex].acv[0]; 
               var b=instr[instrumindex].acv[1];
               break;
             case "dcv":
               latihan="dcv";
               var a=instr[instrumindex].dcv[0]; 
               var b=instr[instrumindex].dcv[1];
               break;
            case "dca":
               latihan="dca";
               var a=instr[instrumindex].dca[0]; 
               var b=instr[instrumindex].dca[1];
               break;
            case "ohm":
               latihan="ohm";
               var a=instr[instrumindex].ohm[0]; 
               var b=instr[instrumindex].ohm[1];
               break;
        }
         random_selector(a,b);
         break;
      case "5":
         latihan="ana";
         $(".anatomi").addClass("bordered");
         break;
      case "6":
      var jmlrandom=eval($("#rndj").val());
         if(randomSiswa.length>=jmlrandom){   //jumlah random
            var list="";
            $.each(randomSiswa,function(key,value){list+=value+", ";})
            var yn=confirm(jmlrandom+" random ("+list.slice(0,-2)+") telah selesai.\nRandomize diulang?");
            if(yn){randomSiswa=[];}else{return false;}
            $.get("includes/nilai_meter.txt",function(text){
               alert(text);
               })
            }
         myInterval = setInterval(myRndSiswa,20);//kecepatan random
         setTimeout(stopRndsiswa,1000);//durasi random
         $("#mydivcontent").html("\
         <div class='randomsiswa'></div>\
         <div class='buttons'>\
         <a href='javascript:' class='btnnilai btn btn-xs btn-success' scor='benar' title='Jawaban BENAR'><i class='fa fa-check-circle'></i></a>\
         <a href='javascript:' class='btnnilai btn btn-xs btn-warning' scor='kurang' title='Jawaban KURANG TEPAT'><i class='fa fa-check-circle-o'></i></a>\
         <a href='javascript:' class='btnnilai btn btn-xs btn-danger' scor='salah' title='Jawaban SALAH'><i class='fa fa-times-circle'></i></a>\
         </div>");
         $(".buttons").html(scor_button(0,5));  //membuat tombol skor
         break;
      case "7":
         alert("Cara Pengoperasian");
         break;
   }   
})

$(document).on("mouseover",".anatomi.bordered",function(){
   var idanatomi=$(this).attr("id");
   //alert(idanatomi);
   $("#mydivcontent").load("includes/anatomi.php ."+idanatomi);   
})
var pic=[];
pic[0]="<img src='images/icons/animal/badak.png'>";
pic[1]="<img src='images/icons/animal/bear.png'>";
pic[2]="<img src='images/icons/animal/bird.png'>";
pic[3]="<img src='images/icons/animal/bull.png'>";
pic[4]="<img src='images/icons/animal/camel.png'>";
pic[5]="<img src='images/icons/animal/chicken.png'>";
pic[6]="<img src='images/icons/animal/cock.png'>";
pic[7]="<img src='images/icons/animal/cock2.png'>";
pic[8]="<img src='images/icons/animal/cow.png'>";
pic[9]="<img src='images/icons/animal/deer.png'>";
pic[10]="<img src='images/icons/animal/elephant.png'>";
pic[11]="<img src='images/icons/animal/fish.png'>";
pic[12]="<img src='images/icons/animal/girafee.png'>";
pic[13]="<img src='images/icons/animal/goose.png'>";
pic[14]="<img src='images/icons/animal/horse.png'>";
pic[15]="<img src='images/icons/animal/lion.png'>";
pic[16]="<img src='images/icons/animal/rooter.png'>";
pic[17]="<img src='images/icons/animal/sheep.png'>";
pic[18]="<img src='images/icons/animal/squirel.png'>";
pic[19]="<img src='images/icons/animal/tiger.png'>";
pic[20]="<img src='images/icons/animal/turkey.png'>";
pic[21]="<img src='images/icons/animal/turtle.png'>";
pic[22]="<img src='images/icons/animal/zebra.png'>|"

function pictural(){
   $.get("includes/pictural_icon.php",function(html){
      alert(html);
   });
}

function scor_button(n1,n2){
   var btns="";
   var n=n2;
   while(n>=n1&&n<n2+1){
      var jawab=(n/n2)*100;
      var newline=(n%5==0)?"\n":"";
      btns+="<a href='javascript:' class='btnnilai' scor='"+jawab+"' title='Scor: "+jawab+"'>"+n+"</a>"+newline;
      n--;
   }
   return btns;
}
var rndsiswa;
//---- membuat angka random dan menampilkan
function myRndSiswa() {
   var r1=eval($("#rnd1").val());
   var r2=eval($("#rnd2").val());
   rndsiswa=randomizebetween(r1,r2);
   $(".randomsiswa").text(pad(rndsiswa,2));
}
//---- STOP randomize dan mengecek dan menyimpan dalam array
function stopRndsiswa(){
   clearInterval(myInterval);
   if ($.inArray(rndsiswa, randomSiswa) != -1)
   {
     alert("Nomor "+rndsiswa + " sudah ada.");
     $(".icon[idx='6']").click();
   }else{
      //randomSiswa.push(rndsiswa);
   } 
}

//---- HIDE MENU----------------------   
$("#btn_hide").click(function(){
   $("#operational").hide("slow");
   })  

//---- OPERASIONAL KEYBOARD ---------------------- 
function keyPressing(e) {
   keyboardFlag++;
   var keycode;
   if (window.event) keycode = window.event.keyCode;
   else if (e) keycode = e.which;
   var e = e || window.event;
   switch(keycode){
      case rotL:  //memutar jarum dan memutar SELEKTOR
      case rotR:
         if(e.shiftKey){geser_selektor(e);} else {geser_jarum(e);}
         break;                     
      case cIN:   //ganti instrumen
      case cIP: 
        ganti_instrumen(e);
        break;
      case infL:  //memutar INFINITY knob
      case infR:
         geser_infinity(e);
         break;                     
      case adjL:  //memutar ADJUST knob
      case adjR:
         geser_adjust(e);
         break;                     
      default: 
        return; 
  }
}

// Make the DIV element draggable:
dragElement(document.getElementById("mydiv"));

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    // if present, the header is where you move the DIV from:
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    // otherwise, move the DIV from anywhere inside the DIV:
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    // stop moving when mouse button is released:
    document.onmouseup = null;
    document.onmousemove = null;
  }
}

function pad (str, max) {
  str = str.toString();
  return str.length < max ? pad("0" + str, max) : str;
}
</script> 
