<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Test</title>
  <style>
    @import url(http://fonts.googleapis.com/css?family=Lato:700);
    @track-color: #ffffff;
    @thumb-color: #e1e1e1;

    @thumb-radius: 5px;
    @thumb-height: 30px;
    @thumb-width: 20px;

    @thumb-border-width: 1px;
    @thumb-border-color: #d6d6d6;

    @track-width: 100%;
    @track-height: 20px;

    @track-border-width: 1px;
    @track-border-color: #e6e6e6;

    @track-radius: 0px;
    @contrast: 5%;
    html,body{
      height: 100%;
      width: 100%;
    }
    html,
    button,
    input,
    select,
    textarea {
      color: #5e5e5e;
      -webkit-font-smoothing: antialiased;
    }
    body {
      background-color: #f0f1f1;
      font: 14px/24px Lato, Helvetica, Helvetica Neue, Arial;
      line-height: 1.4;
    }
    #page{
    width: 275px;
    margin: 20px auto;
    }
    .progress-bar{
      display: inline-block;
      width: 275px;
      height: 275px;
      margin: 7px;
      padding: 0;
    }
    .progress-bar .progress-active{
      position: relative;
      top: -279px;
    }
    .progress-bar p{
      position: relative;
      margin: 0;
      padding: 0;
      width: 275px;
      top: -460px;
      font-size: 54px;
      font-weight: 900;
      text-align: center;
    }
    #progressControllerContainer{
      position: absolute;
      top: 320px;
      padding: 10px 80px;
    }

    .track() {
      width: @track-width;
      height: @track-height;
      cursor: pointer;
      animate: 0.2s;
    }

    .thumb() {
      border: @thumb-border-width solid @thumb-border-color;
      height: @thumb-height;
      width: @thumb-width;
      border-radius: @thumb-radius;
      background: @thumb-color;
      cursor: pointer;
    }

    input[type=range] {
      -webkit-appearance: none;
      margin: @thumb-height/2 0;
      width: @track-width;

      &:focus {
        outline: none;
      }

      &::-webkit-slider-runnable-track {
        .track();
        background: @track-color;
        border-radius: @track-radius;
        border: @track-border-width solid @track-border-color;
      }

      &::-webkit-slider-thumb {
        .thumb();
        -webkit-appearance: none;
        margin-top: ((-@track-border-width * 2 + @track-height) / 2) - (@thumb-height / 2);
      }

      &:focus::-webkit-slider-runnable-track {
        background: lighten(@track-color, @contrast);
      }

      &::-moz-range-track {
        .track();
        background: @track-color;
        border-radius: @track-radius;
         border: @track-border-width solid @track-border-color;
      }
      &::-moz-range-thumb {
         .thumb();
      }

      &::-ms-track {
        .track();
        background: transparent;
        border-color: transparent;
        border-width: @thumb-width 0;
        color: transparent;
      }

      &::-ms-fill-lower {
        background: darken(@track-color, @contrast);
        border: @track-border-width solid @track-border-color;
        border-radius: @track-radius*2;
      }
      &::-ms-fill-upper {
        background: @track-color;
        border: @track-border-width solid @track-border-color;
        border-radius: @track-radius*2;
      }
      &::-ms-thumb {
        .thumb();
      }
      &:focus::-ms-fill-lower {
        background: @track-color;
      }
      &:focus::-ms-fill-upper {
        background: lighten(@track-color, @contrast);
      }
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      var $pc = $('#progressController');
      var $pCaption = $('.progress-bar p');
      var iProgress = document.getElementById('inactiveProgress');
      var aProgress = document.getElementById('activeProgress');
      var iProgressCTX = iProgress.getContext('2d');
      var i = 1;

      drawInactive(iProgressCTX);

      // $pc.on('change', function(){
      //   var percentage = $(this).val() / 100;
      //   console.log(percentage + '%');
      //   drawProgress(aProgress, percentage, $pCaption);
      // });

      function drawInactive(iProgressCTX){
        iProgressCTX.lineCap = 'square';

        //outer ring
        iProgressCTX.beginPath();
        iProgressCTX.lineWidth = 15;
        iProgressCTX.strokeStyle = '#e1e1e1';
        iProgressCTX.arc(137.5,137.5,129,0,2*Math.PI);
        iProgressCTX.stroke();

        //progress bar
        iProgressCTX.beginPath();
        iProgressCTX.lineWidth = 0;
        iProgressCTX.fillStyle = '#e6e6e6';
        iProgressCTX.arc(137.5,137.5,121,0,2*Math.PI);
        iProgressCTX.fill();

        //progressbar caption
        iProgressCTX.beginPath();
        iProgressCTX.lineWidth = 0;
        iProgressCTX.fillStyle = '#fff';
        iProgressCTX.arc(137.5,137.5,100,0,2*Math.PI);
        iProgressCTX.fill();

      }
      function drawProgress(bar, percentage, $pCaption){
        var barCTX = bar.getContext("2d");
        var quarterTurn = Math.PI / 2;
        var endingAngle = ((2*percentage) * Math.PI) - quarterTurn;
        var startingAngle = 0 - quarterTurn;

        bar.width = bar.width;
        barCTX.lineCap = 'square';

        barCTX.beginPath();
        barCTX.lineWidth = 20;
        barCTX.strokeStyle = '#76e1e5';
        barCTX.arc(137.5,137.5,111,startingAngle, endingAngle);
        barCTX.stroke();

        $pCaption.text( (parseInt(percentage * 100, 10)) + '%');
      }

      // Start Init Function
      var percentage = $pc.val() / 100;
      //drawProgress(aProgress, percentage, $pCaption);

      //clearInterval(intervalo);
      var intervalo = setInterval(function () {

        $.ajax({
          method: "POST",
          url: "ajax.php",
          data: { counter: i }
        })
        .done(function( msg ) {

          if (msg <= 100) {
            drawProgress(aProgress, msg/100, $pCaption);
            console.log('value=> ' + msg/100);
          }

        });

        i++;

      },10);


    });
  </script>
</head>
<body>
  <div id="page">
    <div class="progress-bar">
        <canvas id="inactiveProgress" class="progress-inactive" height="275px" width="275px"></canvas>
      <canvas id="activeProgress" class="progress-active"  height="275px" width="275px"></canvas>
      <p>0%</p>
    </div>
    <!-- <div id="progressControllerContainer">
      <input type="range" id="progressController" min="0" max="100" value="15" />
    </div -->
  </div>
</body>
</html>
