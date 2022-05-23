  <!DOCTYPE html>
<html lang='en'>
  <head>
      
    <meta charset='utf-8' />
    <?php
    session_start();
    if(isset($_SESSION['email'])){
    
    include('include/gestionBDD.php');
    include('vues/vCalendrier.php');
    
    ?>

    <br><br>

    <link href='fullcalendar/main.css' rel='stylesheet' />
    <script src='fullcalendar/main.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js"></script>
    <script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js"></script>
    <style>

/*
i wish this required CSS was better documented :(
https://github.com/FezVrasta/popper.js/issues/674
derived from this CSS on this page: https://popper.js.org/tooltip-examples.html
*/

.popper,
.tooltip {
  position: absolute;
  z-index: 9999;
  background: #FFC107;
  background-color: #303c54;
  color: black;
  width: 150px;
  border-radius: 3px;
  box-shadow: 0 0 2px rgba(0,0,0,0.5);
  padding: 10px;
  text-align: center;
  opacity: 1;
}
.tooltip-inner {
  background-color: transparent;
}
.fc-scroller {
  height:100% !important;
}




}</style>
<script src='locales/fr.js'></script>
    <script>
      


      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        
        var calendar = new FullCalendar.Calendar(calendarEl, {
          
          contentHeight: 900,
          height: 650,
          

          headerToolbar: {

    

    right: 'prev,next,today',
    
    center:'dayGridMonth,timeGridWeek,timeGridDay'

  },


  
  eventDidMount: function(info) {
      var tooltip = new Tooltip(info.el, {
        title: info.event.extendedProps.description,
        placement: 'top',
        trigger: 'hover',
        container: 'body'
      });
    },


          events: [

            {
      
      
      title: 'My Event',
      url: 'ModifierRDVform.php?IDIntervention=1',
      start: '2022-02-02',
      description: '14 rue Lalo 75116 Paris, Franck Zahout',
      
    },
    

    <?php 
    
    if($_SESSION["role"]!="admin"){
      ListerInterventionAgendaByClient($_SESSION['email']);
    }else{
    
    
    
    
    
    
    ListerInterventionAgenda(); 

    }
    ?>
  ],
  
  

  



          initialView:'dayGridMonth',
            locale:'fr',
            firstDay: 1,
            aspectRatio:  2,
           
          
        });



        calendar.render();
      });

    </script>
  </head>
  <body>
    <div id='calendar'></div>
  </body>

  <?php } else{

header('Location: Connexion.php');
} ?>
</html>